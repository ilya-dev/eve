<?php namespace Eve;

class Implementation {

    /**
     * Extend the given abstract class and override all abstract methods.
     *
     * @param string $class
     * @return string
     */
    public function forAbstract($class)
    {
        return (new Creators\AbstractCreator)->create($class);
    }

    /**
     * Implement the given interface.
     *
     * @param string $interface
     * @return string
     */
    public function forInterface($interface)
    {
        return (new Creators\InterfaceCreator)->create($interface);
    }

}

