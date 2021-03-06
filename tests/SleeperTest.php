<?php

namespace League\CLImate\Tests;

use League\CLImate\TerminalObject\Helper\Sleeper;

require_once 'SleeperGlobalMock.php';

class SleeperTest extends TestBase
{
    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_can_slow_down_the_sleeper_speed()
    {
        $sleeper = new Sleeper;

        $sleeper->speed(50);

        self::$functions->shouldReceive('usleep')
                        ->once()
                        ->with(100000);

        $sleeper->sleep();
    }

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_can_speed_up_the_sleeper_speed()
    {
        $sleeper = new Sleeper;

        $sleeper->speed(200);

        self::$functions->shouldReceive('usleep')
                        ->once()
                        ->with(25000);

        $sleeper->sleep();
    }

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_will_ignore_zero_percentages()
    {
        $sleeper = new Sleeper;

        $sleeper->speed(0);

        self::$functions->shouldReceive('usleep')
                        ->once()
                        ->with(50000);

        $sleeper->sleep();
    }
}
