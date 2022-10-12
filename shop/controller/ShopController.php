<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'classes/ShopRepository.php';

class ShopController extends Controller {

    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display() {

        $action = htmlspecialchars($_GET['action']) . "Action";

        // return $this->$page();

        /* TODO :
        $this-°view = file_get_contents('view/page/' . $controller . '/' . $action . '.html');
        */

        return call_user_func(array($this, $action));
    }

    /**
     * Display List Action
     *
     * @return string
     */
    private function listAction() {

        $shopRepository = new ShopRepository();
        $products = $shopRepository->findAll();

        $view = file_get_contents('view/page/shop/list.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display Detail Action
     *
     * @return string
     */
    private function detailAction() {
        $shopRepository = new ShopRepository();

        if(preg_match('/^[0-9]*$/',$_GET['id'])){
            $product = $shopRepository->findOne($_GET['id']);
    
            $view = file_get_contents('view/page/shop/detail.php');
        } else {
            $products = $shopRepository->findAll();

            $view = file_get_contents('view/page/shop/list.php');
        }

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;

    }
}