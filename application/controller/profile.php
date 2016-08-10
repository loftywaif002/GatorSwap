<?php

if(!session_id()) {
	session_start();  
}
   
class Profile extends Controller
{
    /**
     * PAGE: profile
     * This method handles displaying the profile page of the user
     */
    
    public function index()
    {   
	$categoryList = $this->itemModel->getCategories();
	
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/profile/index.php';
        require APP . 'view/_templates/footer.php';
    }				
}
?>