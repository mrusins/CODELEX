<?php

namespace App\view;

class ViewFunctions
{

    public function avaibilityColour(string $status): string
    {
        $statusColour = 'red';
        if ($status == 'yes') {
            $statusColour = 'green';
        }elseif ($status == 'in service') {
            $statusColour = 'red';
        }
        return $statusColour;
    }

    public function disabledButton(string $status): string
    {
        $buttonDisable = ' ';
        if ($status == 'in service') {
            $buttonDisable = 'disabled';

        }
        return $buttonDisable;
    }

}

