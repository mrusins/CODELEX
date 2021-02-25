<?php

class Point
{
    private $x;
    private $y;

    function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    function swapPoints(object $point1, object $point2): string
    {

        return "(" . $point2->x . ", " . $point2->y . ")" . PHP_EOL . "(" . $point1->x . ", " . $point1->y . ")" . PHP_EOL;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p3 = new Point(-1, 3);


echo $p2->swapPoints($p1, $p3);
