<?php

namespace App\Models;

class Dashboard extends Model
{
    /**
     * get total orders count 
     *
     * @return void
     */
    public function getTotalOrderCount()
    {
        $query =
            "SELECT 
                count(id) as total
                FROM 
                `{$this->order_table}` 
                WHERE
                deleted = 0;
            ";

        $stmt = self::$dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
    /**
     * get average order value
     *
     * @return void
     */
    public function getAverageOrderTicket()
    {
        $query =
            "SELECT 
                AVG(total) as avg
                FROM 
                `{$this->order_table}` 
                WHERE
                deleted = 0;
            ";

        $stmt = self::$dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
    /**
     * get highest order value
     *
     * @return void
     */
    public function getHighestOrderTicket()
    {
        $query =
            "SELECT 
                Max(total) as max
                FROM 
                `{$this->order_table}` 
                WHERE
                deleted = 0;
            ";

        $stmt = self::$dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
    /**
     * get total user count
     *
     * @return void
     */
    public function getTotalUserCount()
    {
        $query =
            "SELECT          
                count(id) as total
                FROM 
                `{$this->user_table}`   
                WHERE
                deleted = 0;
            ";

        $stmt = self::$dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
    /**
     * get total category count
     *
     * @return void
     */
    public function getTotalCategoryCount()
    {
        $query =
            "SELECT          
                count(id) as total
                FROM 
                `{$this->category_table}` 
                WHERE
                deleted = 0;
            ";

        $stmt = self::$dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
    /**
     * get total service count
     *
     * @return void
     */
    public function getTotalServiceCount()
    {
        $query =
            "SELECT          
                count(id) as total
                FROM 
                `{$this->service_table}` 
                WHERE
                deleted = 0;
            ";

        $stmt = self::$dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
}
