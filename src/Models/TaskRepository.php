<?

namespace MVC\Models;

use MVC\Models\TaskResourceModel;
use MVC\Models\TaskModel;

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


    public function add(TaskModel $task)
    {
        return $this->taskResource->save($task);
    }

    public function update(TaskModel $task)
    {
        return $this->taskResource->save($task);
    }

    public function get($id)
    {
        return $this->taskResource->get($id);
    }
}
