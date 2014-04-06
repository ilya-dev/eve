<?php namespace Eve;

class Implement {

    /**
     * Extend given abstract class and override necessary methods
     *
     * @param  string $class
     * @return string
     */
    public function anAbstract($class)
    {
        return (new Creators\AbstractCreator)->create($class);
    }

    /**
     * Implement given interface
     *
     * @param  string $interface
     * @return string
     */
    public function anInterface($interface)
    {
        return (new Creators\InterfaceCreator)->create($interface);
    }

}

