<?php

declare(strict_types=1);

namespace PHPKata;

final class Rober
{
    private const MAX_MOVEMENT = 10;
    private string $direction = 'N';
    private int $x = 0;
    private int $y = 0;

    public function execute(string $commands): string
    {
        foreach (str_split($commands) as $command) {
            if ($command == 'M') {
                if ($this->direction == 'N') {
                    $this->y = ($this->y + 1) % self::MAX_MOVEMENT;
                }else if ($this->direction == 'E') {
                    $this->x = ($this->x + 1) % self::MAX_MOVEMENT;
                }else if ($this->direction == 'S') {
                    $this->y = ($this->y > 0) ? $this->y - 1 : self::MAX_MOVEMENT - 1;
                }else if ($this->direction == 'W') {
                    $this->x = ($this->x > 0) ? $this->x - 1 : self::MAX_MOVEMENT - 1;
                }
            }
            if ($command == 'R') {
                $this->rotateRight();
            } else if ($command == 'L') {
                $this->rotateLeft();
            }
        }

        return $this->x . ':' . $this->y . ':' . $this->direction;
    }

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

    public function rotateLeft(): void
    {
        if ($this->direction == 'N') {
            $this->direction = 'W';
        } else if ($this->direction == 'W') {
            $this->direction = 'S';
        } else if ($this->direction == 'S') {
            $this->direction = 'E';
        } else if ($this->direction == 'E') {
            $this->direction = 'N';
        }
    }
}
