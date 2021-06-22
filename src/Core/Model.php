<?php

namespace MVC\Core;

class Model
{
    public function getProperties()
    {
        return get_object_vars($this);
    }
    public function getMyClass()
    {
        return get_class($this);
    }
}
