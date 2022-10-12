<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'database/DataBaseQuery.php';
include_once 'Entity.php';

class ShopRepository implements Entity {

    /**
     * Find all entries
     *
     * @return array|resource
     */
    public function findAll() {

        $table = 't_product as p, t_category as c';
        $columns = '*';
        $where =  'p.fkCategory = c.idCategory';

        $request =  new DataBaseQuery();
        
        return $request->select($table, $columns, $where);

    }

    /**
     * Find One entry
     *
     * @param $idProduct
     *
     * @return array
     */
    public function findOne($idProduct)
    {

        $table = 't_product as p, t_category as c';
        $columns = '*';
        $where = 'p.fkCategory = c.idCategory AND p.idProduct = ' . $idProduct . ' LIMIT 1';

        $request = new DataBaseQuery();
        $query = $request->select($table, $columns, $where);

        return $query;
    }
}