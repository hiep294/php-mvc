<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskModel;
use MVC\Models\TaskRepository;
use MVC\Config\Database;
use PDO;

class TasksController extends Controller
{
    /**
     * @var TaskRepository
     */
    private $taskRepo;

    public function __construct()
    {
        $this->taskRepo = new TaskRepository();
    }

    function index()
    {
        $tasks = $this->taskRepo->getAll();
        $d['tasks'] = $tasks;
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        // if submit
        if (isset($_POST["title"])) {
            $task = new TaskModel();
            $task->setData($_POST);
            if ($this->taskRepo->add($task)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {

        $d["task"] = $this->taskRepo->get($id);

        // if submit
        if (isset($_POST["title"])) {
            $task = new TaskModel();
            $task->setData(array_merge($_POST, ["id" => $id]));
            if ($this->taskRepo->update($task)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        if ($this->taskRepo->delete($id)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
