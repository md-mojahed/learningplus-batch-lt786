<?php

class Math
{
    public $a = 0;
    public $b = 0;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function sum()
    {
        return $this->a + $this->b;
    }

    public function sub()
    {
        return $this->a - $this->b;
    }

    public function multiply()
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

$math = new Math(10, 20);

echo $math->sum().'<br>';
echo $math->sub().'<br>';
echo $math->multiply().'<br>';
echo $math->division().'<br>';
echo $math->rem().'<br>';

$math2 = new Math(1000000, 2000);

echo $math2->sum().'<br>';
echo $math2->sub().'<br>';
echo $math2->multiply().'<br>';
echo $math2->division().'<br>';
echo $math2->rem().'<br>';
