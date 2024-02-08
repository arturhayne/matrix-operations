<?php

class Matrix
{
    private $matrix;

    public function __construct(array $matrix)
    {
        $this->matrix = $matrix;
    }

    public static function create($matrix)
    {
        return new static($matrix);
    }

    public function echo()
    {
        return $this->matrix;
    }

    public function invert()
    {
        [$rows, $cols] = [count($this->matrix), count($this->matrix[0])];
        $inverted = array_fill(0, $cols, array_fill(0, $rows, null));
        for ($i = 0; $i < $rows; ++$i) {
            for ($j = 0; $j < $cols; ++$j) {
                $inverted[$j][$i] = $this->matrix[$i][$j];
            }
        }

        return $inverted;
    }

    public function flatten()
    {
        return call_user_func_array('array_merge', $this->matrix);
    }

    public function sum()
    {
        return array_sum($this->flatten());
    }

    public function multiply()
    {
        return $this->flatten() ? array_product($this->flatten()) : 0;
    }
}
