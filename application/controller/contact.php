<?php 
/**
* PAGE: contact
* This method handles the contact page on the footer. 
*/

class Contact extends Controller
{
	
    public function index()
    {
        $categoryList = $this->itemModel->getCategories();
		
        require APP . 'view/_templates/header.php';
        require APP . 'view/contact/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
?>