<?php

declare(strict_types=1);

namespace PHPKata;

final class Rober
{
    private const NORTH = 'N';
    private const SOUTH = 'S';
    private const EAST = 'E';
    private const WEST = 'W';
    private string $direction = self::NORTH;
    private int $x = 0;
    private int $y = 0;
    private bool $foundObstacle = false;
    private Grid $grid;

    public function __construct(?Grid $grid = null)
    {
        $this->grid = $grid ?? new Grid(10, 10);
    }

    public function execute(string $command): string
    {
        foreach (str_split($command) as $singleCommand) {
            if ($singleCommand == 'M') {
                $this->move();
                if ($this->foundObstacle) {
                    break;
                }
            }
            if ($singleCommand == 'R') {
                $this->rotateRight();
            } else if ($singleCommand == 'L') {
                $this->rotateLeft();
            }
        }

        $prefix = $this->foundObstacle ? 'O:' : '';
        return $prefix . $this->x . ':' . $this->y . ':' . $this->direction;
    }

    private function rotateRight(): void
    {
        if ($this->direction == self::NORTH) {
            $this->direction = self::EAST;
        } else if ($this->direction == self::EAST) {
            $this->direction = self::SOUTH;
        } else if ($this->direction == self::SOUTH) {
            $this->direction = self::WEST;
        } else if ($this->direction == self::WEST) {
            $this->direction = self::NORTH;
        }
    }

    private function rotateLeft(): void
    {
        if ($this->direction == self::NORTH) {
            $this->direction = self::WEST;
        } else if ($this->direction == self::WEST) {
            $this->direction = self::SOUTH;
        } else if ($this->direction == self::SOUTH) {
            $this->direction = self::EAST;
        } else if ($this->direction == self::EAST) {
            $this->direction = self::NORTH;
        }
    }

    /**
     * @return void
     */
    private function move(): void
    {
        $nextX = $this->x;
        $nextY = $this->y;

        if ($this->direction == self::NORTH) {
            $nextY = ($this->y + 1) % $this->grid->height();
        } else if ($this->direction == self::EAST) {
            $nextX = ($this->x + 1) % $this->grid->width();
        } else if ($this->direction == self::SOUTH) {
            $nextY = ($this->y > 0) ? $this->y - 1 : $this->grid->height() - 1;
        } else if ($this->direction == self::WEST) {
            $nextX = ($this->x > 0) ? $this->x - 1 : $this->grid->width() - 1;
        }

        if ($this->grid->hasObstacle($nextX, $nextY)) {
            $this->foundObstacle = true;
            return;
        }

        $this->x = $nextX;
        $this->y = $nextY;
    }
}
