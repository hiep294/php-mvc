<?

namespace MVC\Core;

interface ResourceModelInterface
{
    public function _init(string $table, ?int $id, object $model);

    public function save($model);

    public function delete($model);
}
