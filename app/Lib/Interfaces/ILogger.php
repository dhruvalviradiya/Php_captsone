<?php

namespace App\Lib\Interfaces;

interface ILogger
{
    /**
     * write function
     *
     * @param [type] $event
     * @return void
     */
    public function write($event);
}
