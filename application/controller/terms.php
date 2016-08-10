<?php

class Terms extends Controller 
{
    /**
     * PAGE: terms
     * This method handles the terms page  on the footer.
     */
    public function index()
    {
        $categoryList = $this->itemModel->getCategories();
		
        require APP . 'view/_templates/header.php';
        require APP . 'view/terms/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
?>