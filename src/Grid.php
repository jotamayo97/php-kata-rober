<?php

declare(strict_types=1);

namespace PHPKata;

final class Grid
{
    public function __construct(
        private int $width,
        private int $height,
        private array $obstacles = [],
    ) {
    }

    public function width(): int
    {
        return $this->width;
    }

    public function height(): int
    {
        return $this->height;
    }

    public function hasObstacle(int $x, int $y): bool
    {
        foreach ($this->obstacles as $obstacle) {
            if ($obstacle[0] == $x && $obstacle[1] == $y) {
                return true;
            }
        }

        return false;
    }
}
