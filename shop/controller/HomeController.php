<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

class HomeController extends Controller {

    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display() {

        $action = htmlspecialchars($_GET['action'],ENT_QUOTES) . "Action";

        return call_user_func(array($this, $action));
    }

    /**
     * Display Index Action
     *
     * @return string
     */
    private function indexAction() {

        $view = file_get_contents('view/page/home/index.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display Contact Action
     *
     * @return string
     */
    private function contactAction() {

        $view = file_get_contents('view/page/home/contact.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
}