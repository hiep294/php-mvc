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
        $this->_init("tasks", "taskId", new TaskModel());
    }
}
