<?php

declare(strict_types=1);

namespace PHPKata\Tests;

use PHPKata\Grid;
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

    public function testRotateLeft(): void
    {
        $rover = new Rober();

        self::assertSame('0:0:W', $rover->execute('L'));
    }

    public function testRotateLeftTwoTimes(): void
    {
        $rover = new Rober();

        self::assertSame('0:0:S', $rover->execute('LL'));
    }

    public function testRotateLeftThreeTimes(): void
    {
        $rover = new Rober();
        self::assertSame('0:0:E', $rover->execute('LLL'));
    }

    public function testRotateLeftFourTimes(): void
    {
        $rover = new Rober();
        self::assertSame('0:0:N', $rover->execute('LLLL'));
    }

    public function testMoveForward(): void
    {
        $rover = new Rober();
        self::assertSame('0:1:N', $rover->execute('M'));
    }

    public function testMoveNorthWrapAround(): void
    {
        $rover = new Rober();
        self::assertSame('0:0:N', $rover->execute('MMMMMMMMMM'));
    }

    public function testMoveEast(): void
    {
        $rover = new Rober();
        self::assertSame('1:0:E', $rover->execute('RM'));
    }

    public function testMoveEastWrapAround(): void
    {
        $rover = new Rober();
        self::assertSame('0:0:E', $rover->execute('RMMMMMMMMMM'));
    }

    public function testMoveWest(): void
    {
        $rover = new Rober();
        self::assertSame('9:0:W', $rover->execute('LM'));
    }

    public function testMoveWestWrapAround(): void
    {
        $rover = new Rober();
        self::assertSame('0:0:W', $rover->execute('LMMMMMMMMMM'));
    }

    public function testMoveSouth(): void
    {
        $rover = new Rober();
        self::assertSame('0:9:S', $rover->execute('LLM'));
    }

    public function testMoveSouthWrapAround(): void
    {
        $rover = new Rober();
        self::assertSame('0:0:S', $rover->execute('LLMMMMMMMMMM'));
    }

    public function testStopWithObstacle(): void
    {
        $obstacle = [0, 3];
        $grid = new Grid(10, 10, [$obstacle]);
        $rover = new Rober($grid);

        self::assertSame('O:0:2:N', $rover->execute('MMMM'));
    }

}
