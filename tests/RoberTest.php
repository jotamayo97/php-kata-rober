<?php

declare(strict_types=1);

namespace PHPKata\Tests;

use PHPKata\Rober;
use PHPUnit\Framework\TestCase;

final class RoberTest extends TestCase
{

    public function testRoverEmptyCommand(): void
    {
        $rover = new Rober();

        self::assertSame('0:0:N', $rover->execute(''));
    }

    public function testRotateRight(): void
    {
        $rover = new Rober();

        self::assertSame('0:0:E', $rover->execute('R'));
    }

    public function testRotateLeft(): void
    {
        $rover = new Rober();

        self::assertSame('0:0:W', $rover->execute('L'));
    }

    public function testRotateRightTwoTimes(): void
    {
        $rover = new Rober();

        self::assertSame('0:0:S', $rover->execute('RR'));
    }
    public function testRotateRightThreeTimes(): void
    {
        $rover = new Rober();

        self::assertSame('0:0:W', $rover->execute('RRR'));
    }

    public function testRotateRightFourTimes(): void
    {
        $rover = new Rober();

        self::assertSame('0:0:N', $rover->execute('RRRR'));
    }

}
