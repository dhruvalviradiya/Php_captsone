<?php

namespace App\Models;

abstract class Model
{
    // database handler
    protected static $dbh;
    //table name
    protected $table;
    //primary key of table 
    protected $key = 'id';

    // tables
    protected $user_table = 'user';
    protected $category_table = 'category';
    protected $service_table = 'service';
    protected $order_table = 'order';
    protected $order_service_table = 'order_service';

    /**
     * initial function to set database handler
     *
     * @param [type] $dbh
     * @return void
     */
    public static function init($dbh)
    {
        // self or static
        self::$dbh = $dbh;
    }

    /**
     * function to get database handler
     *
     * @return void
     */
    public function getDbh()
    {
        // self or static
        return  self::$dbh;
    }
    /**
     * get all data
     *
     * @param string $order ascending or desc
     * @return void
     */
    public function getAll($order = 'asc')
    {

        $query = "SELECT 
                    *
                    from `{$this->table}`
                    WHERE 
                    deleted=0
                    order by id " . $order;

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }
    /**
     * GET SINGLE record with id
     *
     * @param [type] $id
     * @return void
     */
    public function getOne($id)
    {

        $query = "SELECT 
                    *
                    from `{$this->table}`
                    WHERE 
                    {$this->key} = :id
                    AND
                    deleted=0";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * delete record from user table function
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {

        $query = "UPDATE 
                    `{$this->table}`
                    SET 
                    deleted = 1
                    where
                    id = :id";
        $stmt = self::$dbh->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
