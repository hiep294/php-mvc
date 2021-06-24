<?php

namespace MVC\Models;

use MVC\Core\Model;

class TaskModel extends Model
{
    /**
     * @var null|int
     * this must be public, if use PDO::FETCH_CLASS
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
}
