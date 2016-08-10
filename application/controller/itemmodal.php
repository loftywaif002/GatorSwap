<?php
/**
* PAGE: Modal for search results' more info
* 
*/
class ItemModal extends Controller 
{  
    public function index () 
    {

        if(isset($_POST["item_id"])) {
                $results = $this->itemModel->findItem($_POST["item_id"]);
        }   

        if(isset($_POST["search_key"]) && isset($_POST["search_cat"])) {
                $search_query = array($_POST["search_key"], $_POST["search_cat"]);
        }

        require APP . 'view/ajax/itemmodal.php';
    }	
}
?>