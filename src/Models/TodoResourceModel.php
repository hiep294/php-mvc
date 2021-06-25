<?

namespace MVC\Models;

use MVC\Core\ResourceModel;
use MVC\Models\TodoModel;

/**
 * TodoResourceModel to declare table name, id, and Model
 */
class TodoResourceModel extends ResourceModel
{
    public function __construct()
    {
        parent::_init("todos", "id", new TodoModel());
    }
}
