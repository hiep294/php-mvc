<?

namespace MVC\Core;

use MVC\Config\Database;
use MVC\Core\Model;
use MVC\Core\ResourceModelInterface;
use PDO;

// use PDO;

class ResourceModel implements ResourceModelInterface
{
    private string $table;
    private ?int $id;
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
        $sql = "SELECT * FROM {$this->table}";
        $req = Database::getBdd()->prepare($sql);

        return $req->fetchAll(PDO::FETCH_CLASS, $this->model->getMyClass());
    }

    public function save(Model $model)
    {
    }

    public function delete(Model $model)
    {
    }
}
