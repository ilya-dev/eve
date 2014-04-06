<?php namespace Eve\Creators;

use Eve\Reflector as EveReflector;

class AbstractCreator extends Creator {

    /**
     * Extend an abstract class and override necessary methods
     *
     * @param  string $class
     * @param  string $class
     * @return void
     */
    protected function doCreate($for, $class)
    {
        $class     = $this->builder->aClass($class)->extend($for);
        $reflector = new EveReflector($for);

        foreach ($reflector->getAbstract() as $method)
        {
            $class->method($this->transformer->method($method));
        }

        $this->evalWorker->evaluate($class->pretty());
    }

}

