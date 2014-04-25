<?php namespace Eve;

class ClassRegistry {

    /**
     * Determine whether a class exists.
     *
     * @param string $class
     * @return boolean
     */
    public function has($class)
    {
        return \class_exists($class, true);
    }

    /**
     * Generate an unique (non-existent) class name.
     *
     * @return string
     */
    public function generateName()
    {
        do
        {
            $class = 'class_'.\uniqid();
        }
        while ($this->has($class));

        return $class;
    }

}

