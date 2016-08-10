<?php

class Privacy extends Controller
{
    /**
     * PAGE: privacy
     * This method handles the privacy page on the footer. 
     */
    public function index()
    {
        $categoryList = $this->itemModel->getCategories();
		
        require APP . 'view/_templates/header.php';
        require APP . 'view/privacy/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
?>