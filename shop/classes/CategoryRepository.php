<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'database/DataBaseQuery.php';
include_once 'Entity.php';

class CategoryRepository implements Entity {

    /**
     * Find all entries
     *
     * @return array|resource
     */
    public function findAll() {

        $table = 't_category';
        $columns = '*';

        $request =  new DataBaseQuery();
        
        return $request->select($table, $columns);

    }

}