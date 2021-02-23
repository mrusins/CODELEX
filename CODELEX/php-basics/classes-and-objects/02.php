<?php

class Point
{
    public $x;
    public $y;

    function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    function swapPoints($point1, $point2): string
    {

        return "(" . $point2->x . ", " . $point2->y . ")" . PHP_EOL . "(" . $point1->x . ", " . $point1->y . ")" . PHP_EOL;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p3 = new Point(-1, 3);


echo $p3->swapPoints($p1, $p2);
