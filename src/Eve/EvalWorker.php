<?php namespace Eve;

class EvalWorker {

    /**
     * Evaluate given code
     *
     * @param  string $code
     * @return void
     */
    public function evaluate($code)
    {
        eval($code);
    }

}

