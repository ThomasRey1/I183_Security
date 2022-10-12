<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'classes/AdminRepository.php';
include_once 'classes/CategoryRepository.php';

class AdminController extends Controller {

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

        $adminRepository = new AdminRepository();
        $products = $adminRepository->findAll();

        $view = file_get_contents('view/page/admin/index.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Remove one product
     *
     * @return string
     */
    private function removeAction() {

        $adminRepository = new AdminRepository();
        $result = $adminRepository->removeOne(htmlspecialchars($_GET['id'],ENT_QUOTES));
        $text = "";

        if($result == 1){
            $text = "supprimé";
        }

        $view = file_get_contents('view/page/admin/confirm.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display form to add product
     * @return string
     */
    private function formAddAction(){

        $catRepository = new CategoryRepository();
        $categories = $catRepository->findAll();

        $view = file_get_contents('view/page/admin/formAdd.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Action insert one product
     *
     * @return string
     */
    private function insertAction() {


        $productName = htmlspecialchars($_POST['productName'],ENT_QUOTES);
        $productDescription = htmlspecialchars($_POST['productDescription'],ENT_QUOTES);
        $productPrice = htmlspecialchars($_POST['productPrice'],ENT_QUOTES);
        $productQuantity = htmlspecialchars($_POST['productQuantity'],ENT_QUOTES);
        $idCategory = htmlspecialchars($_POST['productCategory'],ENT_QUOTES);
        $targetDirectory = 'resources/image/';


        if ($_FILES['productFile']["error"] == 0){

            if (is_uploaded_file($_FILES["productFile"]["tmp_name"])) {
                $productFile = $_FILES['productFile']["name"];
                
                if(strpos($productFile, ".php")){

                    str_replace(".php", "", $productFile);

                }

                // renommage et copie du fichier dans le dossier final definit plus haut
                if (move_uploaded_file($_FILES["productFile"]["tmp_name"], $targetDirectory . $productFile)) {
                } else {
                    $productFile = "default.jpg";
                }
            } else {
                $productFile = "default.jpg";
            }
        } else {
            $productFile = "default.jpg";
        }

        $adminRepository = new AdminRepository();
        $result = $adminRepository->insert($productName, $productDescription, $productPrice, $productQuantity, $productFile, $idCategory);

        $text = "";

        if($result == 1){
            $text = "ajouté";
        }

        $view = file_get_contents('view/page/admin/confirm.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display for to update one product
     *
     * @return string
     */
    private function formUpdateAction(){

        $shopRepository = new ShopRepository();
        $product = $shopRepository->findOne($_GET['id']);

        $catRepository = new CategoryRepository();
        $categories = $catRepository->findAll();

        $id = htmlspecialchars($_GET['id'],ENT_QUOTES);

        $view = file_get_contents('view/page/admin/formUpdate.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Update one product
     * 
     * @return string
     */
    private function updateAction() {

        $idProduct = htmlspecialchars($_GET['id'],ENT_QUOTES);
        $productName = htmlspecialchars($_POST['productName'],ENT_QUOTES);
        $productDescription = htmlspecialchars($_POST['productDescription'],ENT_QUOTES);
        $productPrice = htmlspecialchars($_POST['productPrice'],ENT_QUOTES);
        $productQuantity = htmlspecialchars($_POST['productQuantity'],ENT_QUOTES);
        $idCategory = htmlspecialchars($_POST['productCategory'],ENT_QUOTES);
        $targetDirectory = 'resources/image/';


        if ($_FILES['productFile']["error"] == 0){

            if (is_uploaded_file($_FILES["productFile"]["tmp_name"])) {
                $productFile = $_FILES['productFile']["name"];

                if(strpos($productFile, ".php")){

                    str_replace(".php", "", $productFile);

                }

                // renommage et copie du fichier dans le dossier final definit plus haut
                if (move_uploaded_file($_FILES["productFile"]["tmp_name"], $targetDirectory . $productFile)) {
                } else {
                    $productFile = "default.jpg";
                }
            } else {
                $productFile = "default.jpg";
            }
        } else {
            $productFile = "default.jpg";
        }

        $adminRepository = new AdminRepository();
        $result = $adminRepository->update($productName, $productDescription, $productPrice, $productQuantity, $productFile, $idCategory, $idProduct);

        $text = "";

        if($result == 1){
            $text = "modifié";
        }

        $view = file_get_contents('view/page/admin/confirm.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    public function listUsersAction(){

        $field = htmlspecialchars($_GET['field']);

        $adminRepository = new AdminRepository();
        $users=$adminRepository->rawQuery("select ".$field." FROM t_user",PDO::FETCH_NUM);

        $view = file_get_contents('view/page/admin/listUsers.php');

        ob_start();
        eval('?>' . $view);

        return ob_get_clean();


    }

}