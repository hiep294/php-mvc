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
    }

    public function getAll()
    {
        $properties = implode(',', array_keys($this->model->getProperties()));
        $sql = "SELECT {$properties} FROM {$this->table}";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        $rs = $req->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

    public function save(Model $model)
    {
    }

    public function delete(Model $model)
    {
    }
}
