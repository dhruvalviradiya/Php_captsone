<?php

namespace App\Lib;

use App\Lib\Interfaces\ILogger;

class DatabaseLogger implements ILogger
{
    /**
     * log table 
     * @var string
     */
    protected $table = 'log';

    // database handler
    protected static $dbh;

    public function __construct($dbh)
    {
        self::$dbh = $dbh;
    }
    /**
     * get method for dbh
     *
     * @return void
     */
    public function getDbh()
    {
        return  self::$dbh;
    }
    /**
     * write function to insert log into database 
     *
     * @param [type] $event
     * @return void
     */
    public function write($event)
    {
        $query =
            "INSERT INTO 
                {$this->table} 
                (event)
                VALUES
                (:event)
            ";

        $stmt = self::$dbh->prepare($query);
        $stmt->bindvalue(':event', $event);
        $stmt->execute();
    }
    /**
     * get last 10 logs from database
     *
     * @return void
     */
    public function getLog()
    {
        $query =
            "Select * from 
                {$this->table}
                ORDER BY id desc
                limit 10 
            ";

        $stmt = self::$dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
