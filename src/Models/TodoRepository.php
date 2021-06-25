<?

namespace MVC\Models;

use MVC\Models\TodoResourceModel;
use MVC\Models\TodoModel;

class TodoRepository
{
    private TodoResourceModel $todoResource;

    public function __construct()
    {
        $this->todoResource = new TodoResourceModel();
    }

    public function getAll()
    {
        return $this->todoResource->getAll();
    }


    public function add(TodoModel $todo)
    {
        return $this->todoResource->save($todo);
    }

    public function update(TodoModel $todo)
    {
        return $this->todoResource->save($todo);
    }

    public function get($id)
    {
        return $this->todoResource->get($id);
    }

    public function delete($id)
    {
        return $this->todoResource->delete($id);
    }
}
