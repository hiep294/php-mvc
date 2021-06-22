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


    public function __construct(string $title = "", string $description = "", string $id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->id = $id;
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
