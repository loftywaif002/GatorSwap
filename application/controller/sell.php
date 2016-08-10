<?php

class Sell extends Controller
{
    /**
     * PAGE: sell
     * This method handles item selling actions.
     */
    public function index()
    {
        $categoryList = $this->itemModel->getCategories();

        require APP . 'view/_templates/header.php';
        require APP . 'view/sell/index.php';
        require APP . 'view/_templates/footer.php';
    } 
    
    /**
     * PAGE: sell
     * This method handles inserting new items to be sold on the logged in user.
     */
    public function postItem()
    {	
        
        $categoryList = $this->itemModel->getCategories();
        
        
        if (isset($_POST["postItem"])) 
        {
            // Insert new row in Account and setting the User's name in database 
            // using values inputted in the HTML form
            $newItem = $this->itemModel->createItem($_SESSION['account_id'], 
                       $_POST["item_title"], $_POST["item_category"], 
                       $_POST["item_price"], $_POST["item_desc"], $_POST["item_condition"] );

            // Display newly inserted item by the user
            $itemListArr = $this->itemModel->displaypostItem();

            require APP . 'view/_templates/header.php';
            require APP . 'view/sell/selldisplay.php';
            require APP . 'view/_templates/footer.php';
        }
		
    }
    
    /**
    * PAGE: selldisplay
    * This method handles displaying the currently posted item.
    */
    
    public function displayCurrItemPost()
    {

        $itemListArr = $this->itemModel->displaypostItem();
                 
	require APP . 'view/_templates/header.php';
        require APP . 'view/sell/selldisplay.php';
        require APP . 'view/_templates/footer.php';
        
    }
    
    /**
    * PAGE: sellhistdisplay
    * This method handles displaying all the items posted under the logged in user.
    */
    
    public function displayAllPost()
    {
        
        $categoryList = $this->itemModel->getCategories();
        
	$allitemListArr = $this->itemModel->displaypostItemHist();
                 
	require APP . 'view/_templates/header.php';
        require APP . 'view/profile/sellhistdisplay.php';
        require APP . 'view/_templates/footer.php';
        
    }
    
    /**
    * PAGE: selldisplay
    * This method handles the return button to sell page.
    */
    
    public function returnToSellItem()
    {
        
        $categoryList = $this->itemModel->getCategories();
                 
	require APP . 'view/_templates/header.php';
        require APP . 'view/sell/index.php';
        require APP . 'view/_templates/footer.php';
        
    }
}
?>