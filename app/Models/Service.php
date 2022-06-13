<?php

namespace App\Models;

class Service extends Model
{
    //table name
    protected $table = 'service';

    /**
     * get all services with category 
     *
     * @param string $order
     * @return void
     */
    public function getAll($order = 'asc')
    {

        $query = "SELECT 
                    s.*,
                    c.title as category_title
                    from {$this->table} as s
                    LEFT JOIN {$this->category_table} as c
                    ON s.category = c.id
                    WHERE s.deleted=0
                    order by id " . $order;

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }
    /**
     * get single service with category by service id
     *
     * @param [type] $service_id
     * @return void
     */
    public function getOne($service_id)
    {
        $query = "SELECT 
                    s.*,
                    c.title as category_title
                    from {$this->table} as s
                    LEFT JOIN {$this->category_table} as c
                    ON s.category = c.id
                    WHERE 
                    s.{$this->key} = :id
                    AND 
                    s.deleted=0";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $service_id);

        $stmt->execute();

        return $stmt->fetch();
    }
    /**
     * get all service by category
     *
     * @param [type] $id
     * @return void
     */
    public function getAllByCategory($id)
    {
        $query = "SELECT 
                    s.*,
                    c.title as category_title
                    from {$this->table} as s
                    LEFT JOIN {$this->category_table} as c
                    ON s.category = c.id
                    WHERE
                    s.category = :id
                    AND
                    s.deleted=0";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        return $stmt->fetchAll();
    }
    /**
     * get all service with search
     *
     * @param [type] $search
     * @param string $order
     * @return void
     */
    public function getAllBySearch($search, $order = 'asc')
    {

        $query = "SELECT 
                    s.*,
                    c.title as category_title
                    from {$this->table} as s
                    LEFT JOIN {$this->category_table} as c
                    ON s.category = c.id
                    WHERE 
                    (s.title like :search or s.tag like :search)
                    AND 
                    s.deleted=0
                    order by id " . $order;

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':search', "%$search%");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * insert service 
     *
     * @param [type] $array
     * @return void
     */
    public function insertService($array)
    {
        $query = "INSERT 
                    INTO
                    {$this->table} 
                    (
                        category,
                        title,
                        description,
                        short_description,
                        display,
                        price,
                        estimated_time,
                        no_of_staff_required,
                        image,
                        tag
                    )
                    VALUE
                    (
                        :category,
                        :title,
                        :description,
                        :short_description,
                        :display,
                        :price,
                        :estimated_time,
                        :no_of_staff_required,
                        :image,
                        :tag
                    )";

        $stmt = self::$dbh->prepare($query);
        $params = array(
            ':category' => $array['category'],
            ':title' => $array['title'],
            ':description' => $array['description'],
            ':short_description' => $array['short_description'],
            ':display' => $array['display'],
            ':price' => $array['price'],
            ':estimated_time' => $array['estimated_time'],
            ':no_of_staff_required' => $array['no_of_staff_required'],
            ':image' => $array['file_name'],
            ':tag' => $array['tag']
        );
        $stmt->execute($params);
        return self::$dbh->lastInsertId();
    }
    /**
     * update service
     *
     * @param [type] $array
     * @return void
     */
    public function update($array)
    {
        $query = "UPDATE 
                    {$this->table} 
                   SET
                        category=:category,
                        title=:title,
                        description=:description,
                        short_description=:short_description,
                        display=:display,
                        price=:price,
                        estimated_time=:estimated_time,
                        no_of_staff_required=:no_of_staff_required,
                        image=:image,
                        tag=:tag 
                        WHERE  
                        id=:id";

        $stmt = self::$dbh->prepare($query);
        $params = array(
            ':category' => $array['category'],
            ':title' => $array['title'],
            ':description' => $array['description'],
            ':short_description' => $array['short_description'],
            ':display' => $array['display'],
            ':price' => $array['price'],
            ':estimated_time' => $array['estimated_time'],
            ':no_of_staff_required' => $array['no_of_staff_required'],
            ':tag' => $array['tag'],
            ':image' => $array['file_name'],
            ':id' => $_REQUEST['id']
        );
        return $stmt->execute($params);
    }
}
