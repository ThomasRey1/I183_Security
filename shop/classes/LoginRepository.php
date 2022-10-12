<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'database/DataBaseQuery.php';
include_once 'Entity.php';


class LoginRepository implements Entity {

    /**
     * Find all entries
     *
     * @return array|resource
     */
    public function findAll() {

        $table = 't_user';
        $columns = 'useLogin';

        $request =  new DataBaseQuery();
        
        return $request->select($table, $columns);

    }

    /**
     * Find One entry
     *
     * @param $login
     *
     * @return array
     */
    public function findOne($login,$password) {

        $table = 't_user';
        $columns = '*';
        $where = "useLogin = '$login' LIMIT 1";

        $request =  new DataBaseQuery();

        return $request->select($table, $columns, $where);

    }

    /**
     * Login
     *
     * @param $login
     * @param $password
     *
     * @return bool
     */
    public function login($login, $password) {

        $result = $this->findOne($login,$password);

        if(isset($result) && count($result)>0){
            foreach ($result as $key) {
                if (password_verify($password, $key['usePassword'])) {
                    $_SESSION['right'] = $key['useRight'];
                    $connect = true;
                    return $connect;
                } else {
                    $_SESSION['right'] = null;
                    $connect = false;
                }
            }
        } else {
            $_SESSION['right'] = null;
            $connect = false;
        }
        sleep(1);
        return $connect;
    }
}