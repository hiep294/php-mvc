<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TodoModel;
use MVC\Models\TodoRepository;

class TodosController extends Controller
{
    /**
     * @var todoRepository
     */
    private $todoRepo;

    public function __construct()
    {
        $this->todoRepo = new TodoRepository();
    }

    function index()
    {
        $todos = $this->todoRepo->getAll();
        $d['todos'] = $todos;
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        // if submit
        if (isset($_POST["title"])) {
            $todo = new TodoModel();
            $todo->setData($_POST);
            if ($this->todoRepo->add($todo)) {
                header("Location: " . WEBROOT . "todos/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {

        $d["todo"] = $this->todoRepo->get($id);

        // if submit
        if (isset($_POST["title"])) {
            $todo = new TodoModel();
            $todo->setData(array_merge($_POST, ["id" => $id]));
            if ($this->todoRepo->update($todo)) {
                header("Location: " . WEBROOT . "todos/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        if ($this->todoRepo->delete($id)) {
            header("Location: " . WEBROOT . "todos/index");
        }
    }
}
