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

    // function create()
    // {
    //     if (isset($_POST["title"])) {
    //         require(ROOT . 'Models/Task.php');

    //         $task = new Task();

    //         if ($task->create($_POST["title"], $_POST["description"])) {
    //             header("Location: " . WEBROOT . "tasks/index");
    //         }
    //     }

    //     $this->render("create");
    // }

    // function edit($id)
    // {
    //     require(ROOT . 'Models/Task.php');
    //     $task = new Task();

    //     $d["task"] = $task->showTask($id);

    //     if (isset($_POST["title"])) {
    //         if ($task->edit($id, $_POST["title"], $_POST["description"])) {
    //             header("Location: " . WEBROOT . "tasks/index");
    //         }
    //     }
    //     $this->set($d);
    //     $this->render("edit");
    // }

    // function delete($id)
    // {
    //     require(ROOT . 'Models/Task.php');

    //     $task = new Task();
    //     if ($task->delete($id)) {
    //         header("Location: " . WEBROOT . "tasks/index");
    //     }
    // }
}
