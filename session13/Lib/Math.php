<?php
namespace Lib;

class Math
{
    public $a = 0;
    public $b = 0;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    private function sum()
    {
        return $this->a + $this->b;
    }

    public function sub()
    {
        return $this->a - $this->b;
    }

    protected function multiply()
    {
        return $this->a * $this->b;
    }

    public function division()
    {
        return $this->a / $this->b;
    }

    public function rem()
    {
        return $this->a % $this->b;
    }
}
