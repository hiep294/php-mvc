<?php

namespace MVC\Core;

class Model
{
    public function getProperties()
    {
        return get_object_vars($this);
    }

    public function getPropertiesNoTimeStamp()
    {
        $rs = $this->getProperties();
        unset($rs['created_at']);
        unset($rs['updated_at']);
        return $rs;
    }

    public function getPropertiesString()
    {
        return implode(',', array_keys($this->getProperties()));
    }

    public function getMyClass()
    {
        return get_class($this);
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
