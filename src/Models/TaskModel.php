<?php

namespace MVC\Models;

use MVC\Core\Model;

class TaskModel extends Model
{
    /**
     * @var null|int
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $created_at;

    /**
     * @var string
     */
    public $updated_at;


    public static function createInstance(string $title = "", string $description = "", string $id = null)
    {
        $task = new TaskModel();
        $task->title = $title;
        $task->description = $description;
        $task->id = $id;
        return $task;
    }

    public function __construct()
    {
    }

    public function set(string $name, $value)
    {
        $this->{$name} = $value;
    }

    public function get(string $name)
    {
        return $this->{$name};
    }
}
