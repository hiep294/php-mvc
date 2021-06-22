<?

namespace MVC\Core;

use MVC\Config\Database;
use MVC\Core\Model;
use MVC\Core\ResourceModelInterface;
use MVC\Models\TaskModel;
use PDO;

// use PDO;

class ResourceModel implements ResourceModelInterface
{
    /**
     * @var string
     */
    private $table;

    /**
     * @var null|int
     */
    private $id;

    /**
     * @var Model
     */
    private Model $model;


    public function _init(string $table, ?int $id, Model $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function get(int $id)
    {
        $sql = "SELECT * FROM {$this->table} where id = :id LIMIT 1";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        $rs = $req->fetchAll(PDO::FETCH_OBJ);
        return $rs[0];
    }

    public function getAll()
    {
        $properties = $this->model->getPropertiesString();
        $sql = "SELECT {$properties} FROM {$this->table}";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        $rs = $req->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

    public function save(Model $model)
    {
        $properties = $model->getProperties();

        if ($model->id === null) {
            /**
             * CREATE
             */
            unset($properties['id']);

            $placeNames = [];
            foreach ($properties as $key => $value) {
                array_push($placeNames, ':' . $key);
            }

            $columnsString = implode(',', array_keys($properties));
            $placeNamesString = implode(',', $placeNames);

            $sql = "INSERT INTO {$this->table} ({$columnsString}, created_at, updated_at) VALUES ({$placeNamesString}, :created_at, :updated_at)";
            $req = Database::getBdd()->prepare($sql);
            $date = array("created_at" => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'));

            return $req->execute(array_merge($properties, $date));
        }

        /**
         * UPDATE
         */
        $columns = [];

        foreach (array_keys($properties) as $k => $v) {
            if ($v !== 'id') {
                array_push($columns, $v . ' = :' . $v);
            }
        }

        $columns = implode(',', $columns);

        $sql = "UPDATE {$this->table} SET " . $columns . ', updated_at = :updated_at WHERE id = :id';
        $req = Database::getBdd()->prepare($sql);
        $date = array("id" => $model->id, 'updated_at' => date('Y-m-d H:i:s'));

        return $req->execute(array_merge($properties, $date));
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);

        return $req->execute(array(':id' => $id));
    }
}
