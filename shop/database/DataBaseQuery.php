<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'config.ini.php';

class DataBaseQuery
{

    /** @var \PDO $connection */
    private $connection;

    /**
     * Constructor
     */
    public function __construct() {

        $user   = $GLOBALS['MM_CONFIG']['database']['username'];
        $pass   = $GLOBALS['MM_CONFIG']['database']['password'];
        $dbname = $GLOBALS['MM_CONFIG']['database']['dbname'];
        $host   = $GLOBALS['MM_CONFIG']['database']['host'];
        $port   = $GLOBALS['MM_CONFIG']['database']['port'];
        $charset = $GLOBALS['MM_CONFIG']['database']['charset'];

        try
        {
            $this->connection = new \PDO(
                'mysql:host=' . $host .
                ';port=' . $port .
                ';dbname=' . $dbname .
                ";charset=". $charset, $user, $pass,array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Select request
     *
     * @param string $table
     * @param string $columns
     * @return array
     */
    public function select($table, $columns, $where = '', $orderBy = '') {

        $query = 'SELECT ' . $columns . ' FROM ' . $table;

        if ($where !== '') {
            $query .= ' WHERE ' . $where;
        }

        if ($orderBy !== '') {
            $query .= ' ORDER BY ' . $orderBy;
        }

        if($GLOBALS['debug']===true)
		    echo $query;
        return $this->rawQuery($query);

    }

    /**
     * Select request
     *
     * @param string $query
     * @return array
     */
    public function rawQuery($query,$mode=PDO::FETCH_ASSOC) {

        $req = $this->connection->prepare($query);
        $req->execute();
        return $req->fetchAll($mode);

    }

    /**
     * Method for insert a new record
     *
     * @param string $table
     * @param array $requestInfos (array with column, marker, value and flag)
     * @param bool|false $lastID
     * @return bool|string
     */
    public function insert($table, $columns, $values) {

        $query = 'INSERT INTO ' . $table . ' ' . $columns . " VALUES " . $values ;

        $req = $this->connection->prepare($query);

        return $req->execute();
    }

    /**
     * Method for update a record
     *
     * @param string $table
     * @param array $requestInfos
     * @param string $where
     * @return bool
     */
    public function update($table, $columns, $where) {

        $query = 'UPDATE ' . $table . ' SET ' . $columns . " WHERE " . $where;

        $req = $this->connection->prepare($query);

        return $req->execute();
    }

    /**
     * Method for delete a record
     * @param $table
     * @param $where
     */
    public function delete($table, $where){
        $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;

        $req = $this->connection->prepare($query);

        return $req->execute();
    }
}
