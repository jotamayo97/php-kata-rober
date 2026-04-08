<?php

declare(strict_types=1);

namespace PHPKata;

final class Rober
{
    private string $direction = 'N';
    public function execute(string $rotations): string
    {
        foreach (str_split($rotations) as $rotation) {
            if($rotation == 'R'){
                if($this->direction == 'N'){
                    $this->direction = 'E';
                }
                else if($this->direction == 'E') {
                    $this->direction = 'S';
                }else if($this->direction == 'S'){
                    $this->direction = 'W';
                }else if($this->direction == 'W'){
                    $this->direction = 'N';
                }
            }
            else if($rotations == 'L'){
                return '0:0:W';
            }
        }

        return '0:0:' . $this->direction;
    }
}
