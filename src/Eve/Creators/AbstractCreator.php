<?php namespace Eve\Creators;

class AbstractCreator extends Creator {

    /**
     * Extend an abstract class and override all abstract methods.
     *
     * @param string $for
     * @param string $class
     * @return void
     */
    protected function doCreate($for, $class)
    {
        $class = $this->builder->aClass($class)->extend($for);

        $reflector = new \Eve\Reflector($for);

        foreach ($reflector->getAbstract() as $method)
        {
            $class->method($this->transformer->method($method));
        }

        $this->evalWorker->evaluate($class->pretty());
    }

}

