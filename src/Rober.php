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
    private Grid $grid;

    public function __construct(?Grid $grid = null)
    {
        $this->grid = $grid ?? new Grid(10, 10);
    }

    public function execute(string $command): string
    {
        foreach (str_split($command) as $singleCommand) {
            if ($singleCommand == 'M') {
                $this->Move();
            }
            if ($singleCommand == 'R') {
                $this->rotateRight();
            } else if ($singleCommand == 'L') {
                $this->rotateLeft();
            }
        }

        return $this->x . ':' . $this->y . ':' . $this->direction;
    }

    public function rotateRight(): void
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

    public function rotateLeft(): void
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
    public function Move(): void
    {
        if ($this->direction == self::NORTH) {
            $this->y = ($this->y + 1) % $this->grid->height();
        } else if ($this->direction == self::EAST) {
            $this->x = ($this->x + 1) % $this->grid->width();
        } else if ($this->direction == self::SOUTH) {
            $this->y = ($this->y > 0) ? $this->y - 1 : $this->grid->height() - 1;
        } else if ($this->direction == self::WEST) {
            $this->x = ($this->x > 0) ? $this->x - 1 : $this->grid->width() - 1;
        }
    }
}
