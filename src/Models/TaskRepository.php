<?

namespace MVC\Models;

use MVC\Models\TaskResourceModel;

class TaskRepository
{
    private TaskResourceModel $taskResource;

    public function __construct()
    {
        $this->taskResource = new TaskResourceModel();
    }

    public function getAll()
    {
        return $this->taskResource->getAll();
    }
}
