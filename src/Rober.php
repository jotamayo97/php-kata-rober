<?php

declare(strict_types=1);

namespace PHPKata;

final class Rober
{
    private const NORTH = 'N';
    private const SOUTH = 'S';
    private const EAST = 'E';
    private const WEST = 'W';
    private const MAX_MOVEMENT = 10;
    private string $direction = self::NORTH;
    private int $x = 0;
    private int $y = 0;

    public function execute(string $commands): string
    {
        foreach (str_split($commands) as $command) {
            if ($command == 'M') {
                $this->Move();
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
            $this->y = ($this->y + 1) % self::MAX_MOVEMENT;
        } else if ($this->direction == self::EAST) {
            $this->x = ($this->x + 1) % self::MAX_MOVEMENT;
        } else if ($this->direction == self::SOUTH) {
            $this->y = ($this->y > 0) ? $this->y - 1 : self::MAX_MOVEMENT - 1;
        } else if ($this->direction == self::WEST) {
            $this->x = ($this->x > 0) ? $this->x - 1 : self::MAX_MOVEMENT - 1;
        }
    }
}
