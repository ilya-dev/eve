<?php namespace Eve;

class Implementation {

    /**
     * Extend given abstract class and override necessary methods
     *
     * @param  string $class
     * @return string
     */
    public function forAbstract($class)
    {
        return (new Creators\AbstractCreator)->create($class);
    }

    /**
     * Implement given interface
     *
     * @param  string $interface
     * @return string
     */
    public function forInterface($interface)
    {
        return (new Creators\InterfaceCreator)->create($interface);
    }

}

