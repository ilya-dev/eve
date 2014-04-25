<?php namespace Eve;

class Random {

    /**
     * Get a random value.
     *
     * @return mixed
     */
    public static function value()
    {
        $values = [
            // null
            new \PhpParser\Node\Expr\ConstFetch(
                new \PhpParser\Node\Name(["null"])
            ),
            // false
            new \PhpParser\Node\Expr\ConstFetch(
                new \PhpParser\Node\Name(["false"])
            ),
            // 42.7
            new \PhpParser\Node\Scalar\DNumber(42.7),
            // 19
            new \PhpParser\Node\Scalar\LNumber(19),
            // new \stdClass
            new \PhpParser\Node\Expr\New_(
                new \PhpParser\Node\Name(["\stdClass"])
            ),
            // []
            new \PhpParser\Node\Expr\Array_([]),
            // "foobar"
            new \PhpParser\Node\Scalar\String("foobar"),
            // function() {}
            new \PhpParser\Node\Expr\Closure(),
            // eehh...resource?
        ];

        return $values[\array_rand($values)];
    }

}

