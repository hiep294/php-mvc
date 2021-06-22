<?php

namespace MVC\Models;

use MVC\Core\Model;

class TaskModel extends Model
{
    protected ?int $id;
    protected string $title;
    protected string $description;


    public function set(string $name, $value)
    {
        $this->{$name} = $value;
    }

    public function get(string $name)
    {
        return $this->{$name};
    }
}
