<?php

namespace Ino\Auth;


class Stage
{
    private $singers = [];

    public function addSinger(Singer $singer)
    {
        $this->singers[] = $singer;
    }

    public function takeTheirBallsInYourHand()
    {
        foreach ($this->singers as $singer) {
            $singer->sing();
        }
    }
}
