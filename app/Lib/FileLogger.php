<?php

namespace App\Lib;

use App\Lib\Interfaces\ILogger;

class FileLogger implements ILogger
{
    // file handler
    protected static $fh;

    public function __construct($fh)
    {
        self::$fh = $fh;
    }

    /**
     * get method for dbh
     *
     * @return void
     */
    public function getfh()
    {
        return self::$fh;
    }
    /**
     * write function to write logs in file
     *
     * @param [type] $event
     * @return void
     */
    public function write($event)
    {
        fputs($this->getfh(), $event . "\n");

        fclose($this->getfh());
    }
}
