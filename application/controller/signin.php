<?php
/**
* PAGE: login
* This method handles logging on the site.
*/
class Signin extends Controller
{
    public function index()
    {
	$categoryList = $this->itemModel->getCategories();
        
        if (session_id()) {   
            session_unset();
            session_destroy();   
        }
		
            require APP . 'view/_templates/header.php';
            require APP . 'view/signin/index.php';
            require APP . 'view/_templates/footer.php';
    }
       
    /**
     * PAGE: login
     * This method handles validation of logging in.
     */
	
    public function login() 
    {
	$categoryList = $this->itemModel->getCategories();
		
	// Check that signin button responds and was clicked
        if (isset($_POST["user-signin"])) {             
					
            //Check is the user exists in the database
            $this->userModel->loginAccount($_POST["username"],$_POST["password"]);

            if($_SESSION['login']) {
             // where to go after song has been added
        header('location: ' . URL . 'home/index'); 
			
	} else if(!isset ($_SESSION['login'])|| $_SESSION['login']==false) { 
          
            //User is invalid Warning here
            $message = "Username and/or Password incorrect.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');</script>"; 
		?>

        <script>  
            var url = window.location.href;   
            var newUrl = url.split("/");
            delete newUrl[5];
            delete newUrl[6];
            var modifiedUrl = newUrl.join("/");
            location.href = modifiedUrl+"signin/index";   
        </script>
        
        <?php  } 
       
	}
    }
}
?>