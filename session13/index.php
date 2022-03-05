<?php

foreach (glob('./Lib/*.php') as $file) {
    require $file;
}

use Lib\Math;

/**
 *
 */
class Formula extends Math
{
    use Tp10;
    use Tp100;

    public $arg1;
    public $arg2;

    public function __construct($arg1, $arg2)
    {
        $this->arg1 = $arg1;
        $this->arg2 = $arg2;

        parent::__construct($arg1, $arg2);
    }

    public function apb2()
    {
        return $this->arg1 * $this->arg1 + 2 * $this->multiply() + ($this->arg2 * $this->arg2);
    }
}

$formula = new Formula(2, 2);
echo $formula->apb2();
