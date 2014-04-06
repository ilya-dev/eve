<?php namespace Eve\Creators;

use Eve\ClassRegistry;
use Eve\EvalWorker;
use Eve\Transform;
use Eve\Builders\Build;

abstract class Creator {

    /**
     * ClassRegistry instance
     *
     * @var Eve\ClassRegistry
     */
    protected $registry;

    /**
     * EvalWorker instance
     *
     * @var Eve\EvalWorker
     */
    protected $evalWorker;

    /**
     * Builder instance
     *
     * @var Eve\Builders\Build
     */
    protected $builder;

    /**
     * Transformer instance
     *
     * @var Eve\Transform
     */
    protected $transformer;

    /**
     * The constructor
     *
     * @param  Eve\ClassRegistry|null  $registry
     * @param  Eve\EvalWorker|null     $evalWorker
     * @param  Eve\Builders\Build|null $builder
     * @param  Eve\Transform|null      $transformer
     * @return void
     */
    public function __construct
        (
            ClassRegistry $registry    = null,
            EvalWorker    $evalWorker  = null,
            Build         $builder     = null,
            Transform     $transformer = null
        )
    {
        $this->registry    = $registry    ?: new ClassRegistry;
        $this->evalWorker  = $evalWorker  ?: new EvalWorker;
        $this->builder     = $builder     ?: new Build;
        $this->transformer = $transformer ?: new Transform;
    }

    /**
     * Actually create an implementation
     *
     * @param  string $for
     * @param  string $class
     * @return void
     */
    abstract protected function doCreate($for, $class);

    /**
     * Create an implementation
     *
     * @param  string $for
     * @return string
     */
    public function create($for)
    {
        $class = $this->registry->generateName();

        $this->doCreate($for, $class);

        return $class;
    }

}

