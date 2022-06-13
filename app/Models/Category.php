<?php

namespace App\Models;

class Category extends Model
{
    // table name
    protected $table = 'category';
    /**
     * get category list with service count related to category
     *
     * @return void
     */
    public function getAllWithServiceCount()
    {
        $query =
            "SELECT count(s.category) as service_count,
                c.*
                FROM
                service s
                left join 
                {$this->table} c on  c.id = s.category
                where s.deleted = 0
                group by s.category ";

        $stmt = $this->getDbh()->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
