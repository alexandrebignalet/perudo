<?php

namespace App\Tests;

use App\Entity\Perudo\PlayerTurn;
use App\Service\DiceLauncherImpl;
use PHPUnit\Framework\TestCase;

class PlayerTurnTest extends TestCase
{
    private $players = ['john', 'wick', 'deux'];
    private PlayerTurn $turn;

    public function setUp(): void
    {
        $this->turn = new PlayerTurn($this->players, new DiceLauncherImpl());
    }


    public function test_should_have_a_current_player()
    {
        $this->assertEquals($this->turn->current()->name(), 'john');
    }

    public function test_should_have_a_next_player()
    {
        $this->turn->goNext();
        $this->assertEquals($this->turn->current()->name(), 'wick');
    }

    public function test_should_loop()
    {
        $this->turn->goNext();
        $this->turn->goNext();
        $this->turn->goNext();
        $this->turn->goNext();

        $this->assertEquals($this->turn->current()->name(), 'wick');
    }

    public function test_should_have_a_prev()
    {
        $this->turn->goPrev();

        $this->assertEquals($this->turn->current()->name(), 'deux');
    }
}
