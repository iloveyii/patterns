<?php

namespace Chain;


class Alarm extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if(! $home->alarmON) {
            exit('Alarm is not ON');
        }

        $this->next($home);
    }
}