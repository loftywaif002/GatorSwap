<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles the homepage
     */
    public function index()
    {
       
        $categoryList = $this->itemModel->getCategories();

        if(!session_id())
        {
                session_start();  
        }	
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
 
   
    /**
     * PAGE: profile
     * This method handles the user's profile page when they are logged in
     */
    public function profile()
    {
        $categoryList = $this->itemModel->getCategories();
        
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/profile/index.php';
        require APP . 'view/_templates/footer.php';
    }


    /**
     * PAGE: search
     * This method handles searching and displaying the search results in a new page
     */
    public function search()
    {
        $categoryList = $this->itemModel->getCategories();
        
	// Runs search using keyword and selected category and saves the search query
        if(isset($_POST["search"]) || isset($_POST["return_search"])) 
            {
		$search_query = array($_POST["search-keyword"], $_POST["search-category"]);
		$results = $this->itemModel->searchItems($_POST["search-keyword"], $_POST["search-category"]);
            }   

        require APP . 'view/_templates/header.php';
        require APP . 'view/home/search.php';
        require APP . 'view/_templates/footer.php';
    }
}

?>
