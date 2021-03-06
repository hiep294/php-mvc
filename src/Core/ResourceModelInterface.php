<?

namespace MVC\Core;

use MVC\Core\Model;

interface ResourceModelInterface
{
    public function _init(string $table, ?string $id, Model $model);

    public function save(Model $model);

    public function delete(int $id);
}
