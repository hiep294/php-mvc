<?

namespace MVC\Models;

use MVC\Core\ResourceModel;
use MVC\Models\TaskModel;

/**
 * TaskResourceModel to declare table name, id, and Model
 */
class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        parent::_init("tasks", "id", new TaskModel());
    }
}
