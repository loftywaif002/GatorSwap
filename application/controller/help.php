<?php

class Help extends Controller
{
    /**
     * PAGE: help
     * This method handles the help page on the footer. 
     */
    public function index()
    {
        $categoryList = $this->itemModel->getCategories();
		
        require APP . 'view/_templates/header.php';
        require APP . 'view/help/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
?>