<?

namespace MVC\Models;

use MVC\Core\ResourceModelInterface;
// use PDO;

class ResourceModel implements ResourceModelInterface
{
    private string $table;
    private ?int $id;
    private object $model;


    public function _init(string $table, ?int $id, object $model)
    {
    }

    public function save($model)
    {
    }

    public function delete($model)
    {
    }
}
