<?php

declare(strict_types=1);

namespace PHPKata;

final class Rober
{
    public function execute(string $rotation): string
    {
        if($rotation == 'R'){
            return '0:0:E';
        }
        else if($rotation == 'L'){
            return '0:0:W';
        }
        return '0:0:N';
    }
}
