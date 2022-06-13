<?php

namespace App\Models;

class User extends Model
{
    // table name
    protected $table = 'user';

    /**
     * insert user function
     *
     * @param [type] $array
     * @return void
     */
    public function create($array)
    {
        $query =
            "INSERT INTO 
                {$this->table} 
                (
                first_name, 
                last_name,  
                street, 
                city, 
                postal_code,  
                province, 
                country,  
                phone,  
                email,  
                password, 
                subscribe_to_newsletter
                )
                VALUES
                (
                :first_name, 
                :last_name,  
                :street, 
                :city, 
                :postal_code,  
                :province, 
                :country,  
                :phone,  
                :email,  
                :password, 
                :subscribe_to_newsletter
                ) ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindvalue(':first_name', $array['first_name']);
        $stmt->bindvalue(':last_name', $array['last_name']);
        $stmt->bindvalue(':street', $array['street']);
        $stmt->bindvalue(':city', $array['city']);
        $stmt->bindvalue(':postal_code', $array['postal_code']);
        $stmt->bindvalue(':province', $array['province']);
        $stmt->bindvalue(':country', $array['country']);
        $stmt->bindvalue(':phone', $array['phone']);
        $stmt->bindvalue(':email', $array['email']);
        $stmt->bindvalue(':subscribe_to_newsletter', $array['subscribe_to_newsletter']);
        $stmt->bindvalue(':password', $array['password']);

        $stmt->execute();

        return  self::$dbh->lastInsertId();
    }


    /**
     * update user function
     *
     * @param [type] $array
     * @return void
     */
    public function update($array)
    {
        $query =
            "UPDATE {$this->table} 
                SET 
                first_name = :first_name,  
                last_name = :last_name,    
                street = :street,  
                city = :city,  
                postal_code = :postal_code,    
                province = :province,  
                country = :country,    
                phone = :phone,    
                email = :email,    
                password = :password,  
                subscribe_to_newsletter = :subscribe_to_newsletter      
                where  
                id = :id";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindvalue(':id', $array['id']);
        $stmt->bindvalue(':first_name', $array['first_name']);
        $stmt->bindvalue(':last_name', $array['last_name']);
        $stmt->bindvalue(':street', $array['street']);
        $stmt->bindvalue(':city', $array['city']);
        $stmt->bindvalue(':postal_code', $array['postal_code']);
        $stmt->bindvalue(':province', $array['province']);
        $stmt->bindvalue(':country', $array['country']);
        $stmt->bindvalue(':phone', preg_replace('/[^0-9.]+/', '', $array['phone']));
        $stmt->bindvalue(':email', $array['email']);
        $stmt->bindvalue(':subscribe_to_newsletter', $array['subscribe_to_newsletter'] ? 1 : 0);
        $stmt->bindvalue(':password', $array['password']);

        $stmt->execute();
    }

    /**
     * get user by email
     *
     * @param [type] $id
     * @return void
     */
    public function getUserByEmail($email)
    {

        $query = "SELECT 
                    * 
                    FROM
                    {$this->table}
                    WHERE 
                    email = :email";
        $stmt = self::$dbh->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }
}
