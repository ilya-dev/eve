<?php namespace Eve\Creators;

class InterfaceCreator extends Creator {

    /**
     * Implement an interface.
     *
     * @param string $for
     * @param string $class
     * @return void
     */
    protected function doCreate($for, $class)
    {
        $class = $this->builder->aClass($class)->implement($for);

        $reflector = new \Eve\Reflector($for);

        if ( ! $reflector->isInterface())
        {
            throw new \LogicException("{$for} is not an interface");
        }

        foreach ($reflector->getMethods() as $method)
        {
            $class->method($this->transformer->method($method));
        }

        $this->evalWorker->evaluate($class->pretty());
    }

}

