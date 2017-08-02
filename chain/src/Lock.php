<?php

namespace Chain;


class Lock extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if(! $home->locked ) {
            exit('Home is not locked');
        }

        $this->next($home);
    }
}