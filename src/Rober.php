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
                $this->rotateRight();
            }
            else if($rotation == 'L'){
                if($this->direction == 'N'){
                    $this->direction = 'W';
                }else if($this->direction == 'W'){
                    $this->direction = 'S';
                }
            }
        }

        return '0:0:' . $this->direction;
    }

    /**
     * @return void
     */
    public function rotateRight(): void
    {
        if ($this->direction == 'N') {
            $this->direction = 'E';
        } else if ($this->direction == 'E') {
            $this->direction = 'S';
        } else if ($this->direction == 'S') {
            $this->direction = 'W';
        } else if ($this->direction == 'W') {
            $this->direction = 'N';
        }
    }
}
