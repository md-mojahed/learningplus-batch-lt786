<?php

/**
 * Character Remover class
 */
class CharacterRemover
{
    private $str = '';

    public function __construct($str)
    {
        $this->str = $str;
    }

    public function removeFirst()
    {
        $this->str = substr($this->str, 1, strlen($this->str));
        return new CharacterRemover($this->str);
    }

    public function removeLast()
    {
        $this->str = substr($this->str, 0, strlen($this->str)-1);
        return new CharacterRemover($this->str);
    }

    public function get()
    {
        return $this->str;
    }
}

/**
 *
 */
class CharacterManager
{
    public static function make($str)
    {
        return new CharacterRemover($str);
    }
}
