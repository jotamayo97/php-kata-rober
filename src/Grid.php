<?php

declare(strict_types=1);

namespace PHPKata;

final class Grid
{
    public function __construct(
        private int $width,
        private int $height,
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
}
