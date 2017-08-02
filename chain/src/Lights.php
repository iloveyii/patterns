<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2017-08-02
 * Time: 18:48
 */

namespace Chain;


class Lights extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if(! $home->lightsOff) {
            exit('Lights are not off.');
        }

        $this->next($home);
    }

}