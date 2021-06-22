<?

namespace MVC\Core;

use MVC\Core\Model;

interface ResourceModelInterface
{
    public function _init(string $table, ?int $id, Model $model);

    public function save(Model $model);

    public function delete(Model $model);
}
