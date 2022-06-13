<?php

namespace App\Models;

class Order extends Model
{
    //table name
    protected $table = 'order';
    /**
     * create order 
     *
     * @param [type] $array
     * @return void
     */
    public function createOrder($array)
    {
        $query =
            "INSERT INTO 
                `{$this->table}`
                    (
                    user_id, 
                    credit_card_info,  
                    auth, 
                    gst, 
                    pst,  
                    sub_total, 
                    total,  
                    order_status,
                    address
                    )
                    VALUES
                    (
                    :user_id, 
                    :credit_card_info,  
                    :auth, 
                    :gst, 
                    :pst,  
                    :sub_total, 
                    :total,  
                    :order_status,
                    :address
                    )";

        $stmt = self::$dbh->prepare($query);
        // dd($array);
        $stmt->bindvalue(':user_id', $array['user_id']);
        $stmt->bindvalue(':credit_card_info', $array['credit_card_info']);
        $stmt->bindvalue(':auth', $array['auth']);
        $stmt->bindvalue(':gst', $array['gst']);
        $stmt->bindvalue(':pst', $array['pst']);
        $stmt->bindvalue(':sub_total', $array['sub_total']);
        $stmt->bindvalue(':total', $array['total']);
        $stmt->bindvalue(':order_status', $array['order_status']);
        $stmt->bindvalue(':address', $array['address']);
        $stmt->execute();
        return self::$dbh->lastInsertId();
    }
    /**
     * create order service
     * insert data into line item table
     *
     * @param [type] $array
     * @param [type] $order_id
     * @return void
     */
    public function createOrderService($array, $order_id)
    {
        $query =
            "INSERT INTO 
                    `{$this->order_service_table}`
                    (
                    order_id, 
                    service_id, 
                    price
                    )
                    VALUES
                    (
                    :order_id, 
                    :service_id, 
                    :price
                    ) ";

        $stmt = self::$dbh->prepare($query);
        // dd($stmt);
        foreach ($array as $service) {
            $stmt->bindvalue(':order_id', $order_id);
            $stmt->bindvalue(':service_id', $service['id']);
            $stmt->bindvalue(':price', $service['price']);
            $stmt->execute();
        }
    }
    /**
     * get order details by order id
     *
     * @param [type] $order_id
     * @return void
     */
    public function getOrderDetails($order_id)
    {
        $query =
            "SELECT 
                *
                FROM 
                `{$this->order_service_table}` os
                LEFT JOIN
                `{$this->service_table}` s
                ON
                s.id = os.service_id
                WHERE
                os.order_id = :id
            ";

        $stmt = self::$dbh->prepare($query);
        $stmt->bindvalue(':id', $order_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    /**
     * get orders by user id
     *
     * @param [type] $user_id
     * @return void
     */
    public function getOrdersByUser($user_id)
    {
        $query =
            "SELECT 
                *
                FROM 
                `{$this->table}` 
                WHERE 
                user_id = :id
            ";
        $stmt = self::$dbh->prepare($query);
        $stmt->bindvalue(':id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
