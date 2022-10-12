<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

class Controller {

    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display() {

        $page = htmlspecialchars($_GET['action'],ENT_QUOTES) . "Display";

        $this->$page();
    }
}