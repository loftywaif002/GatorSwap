<?php
/**
* PAGE: confirmation of buying an item
* This method handles confirmation of buying an item.
*/
class Confirmation extends Controller
{
    public function index()
    {
        $categoryList = $this->itemModel->getCategories();

        if(isset($_POST["confirm"])) 
            {
                $item = $this->itemModel->findItem($_POST["item_id"]);
                $search_query = array($_POST["search_key"], $_POST["search_cat"]);
        }

        require APP . 'view/_templates/header.php';
        require APP . 'view/confirmation/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
}
?>