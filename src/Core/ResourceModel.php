<?

namespace MVC\Core;

use MVC\Config\Database;
use MVC\Core\Model;
use MVC\Core\ResourceModelInterface;
use PDO;

// use PDO;

class ResourceModel implements ResourceModelInterface
{
    /**
     * @var string
     */
    protected $table;

    /**
     * $id: is primary key in database
     * @var null|string
     */
    protected $id;

    /**
     * @var Model
     */
    protected Model $model;


    public function _init(string $table, ?string $id, Model $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function get(int $id)
    {
        // this solution require Model has no __constructor
        $sql = "SELECT * FROM {$this->table} where {$this->id} = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        $rs = $req->fetchObject($this->model->getMyClass());
        return $rs;
    }

    public function getAll()
    {
        // this solution require Model has no __constructor
        $myClass = $this->model->getMyClass();
        $sql = "SELECT * FROM {$this->table}";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        $rs = $req->fetchAll(PDO::FETCH_CLASS, $myClass);
        return $rs;
    }

    public function save(Model $model)
    {
        $properties = $model->getPropertiesNoTimeStamp();

        if ($model->get($this->id) === null) {
            /**
             * CREATE
             */
            unset($properties[$this->id]);

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
            if ($v !== $this->id) {
                array_push($columns, $v . ' = :' . $v);
            }
        }

        $columnsQuery = implode(',', $columns);

        $sql = "UPDATE {$this->table} SET " . $columnsQuery . ", updated_at = :updated_at WHERE {$this->id} = :id";
        $req = Database::getBdd()->prepare($sql);
        $date = array("id" => $model->get($this->id), 'updated_at' => date('Y-m-d H:i:s'));

        return $req->execute(array_merge($properties, $date));
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->id} = :id";
        $req = Database::getBdd()->prepare($sql);

        return $req->execute(array(':id' => $id));
    }
}
