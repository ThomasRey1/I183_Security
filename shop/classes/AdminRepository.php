<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'database/DataBaseQuery.php';
include_once 'Entity.php';

class AdminRepository implements Entity {

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
     * Raw sql
     *
     * @return array|resource
     */
    public function rawQuery($query,$mode) {

        $request =  new DataBaseQuery();

        return $request->rawQuery($query,$mode);

    }
    
    /**
     * Delete
     *
     * @param int $id
     * @return bool
     */
    public function removeOne($id) {

        $request = new DataBaseQuery();
        $table = 't_product';
        
        $where =  'idProduct = ' . $id;

        $query = $request->delete($table, $where);

        return $query;
    }

    /**
     * Insert
     *
     * @param $name
     * @param $description
     * @param $price
     * @param $quantity
     * @param $file
     * @param $idCategory
     *
     * @return bool|string
     */
    public function insert($name, $description, $price, $quantity, $file, $idCategory) {

        $request = new DataBaseQuery();

        $table = 't_product';
        $columns = '(idProduct, proName, proDescription, proPrice, proQuantity, proImage, fkCategory)';
        $values = "(NULL, '$name', '$description', $price, $quantity, '$file', $idCategory)";

        return $request->insert($table, $columns, $values);
    }

    /**
     * Update
     *
     * @param $name
     * @param $description
     * @param $price
     * @param $quantity
     * @param $file
     * @param $idCategory
     * @param $idProduct
     *
     * @return bool
     */
    public function update($name, $description, $price, $quantity, $file, $idCategory, $idProduct) {

        $request = new DataBaseQuery();

        $table = 't_product';
        $columns = "proName = '$name', proDescription = '$description', proPrice = $price, proQuantity = $quantity, proImage = '$file', fkCategory = $idCategory";
        $where = "idProduct = " . $idProduct;

        return $request->update($table, $columns, $where);
    }
    
}