<?php
  
class Register extends Controller
{
	
    public function index()
    {
	if(!session_id()) 
        {
            session_start();  
        }

	$categoryList = $this->itemModel->getCategories();
		
        require APP . 'view/_templates/header.php';
        require APP . 'view/register/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
     /**
     * PAGE: register
     * This method handles user registration
     */
    public function addUser()
    {
 
        
        $categoryList = $this->itemModel->getCategories();

        //Check that register button exists and was clicked
         if (isset($_POST["user_submit"])) {       

            //Insert new row in Account and setting the User's name in database using values inputted in the HTML form
            $username = $_POST['username'];        

            $newly_registered_account_id = $this->accountModel->registerAccount($username,$_POST["password"],$_POST["sfsu_id"]);

            $this->userModel->setUser($newly_registered_account_id,$_POST["firstname"], 
            $_POST["lastname"],$_POST["country"],$_POST["state"],
            $_POST["address"],$_POST["city"],$_POST["zipcode"],$_POST["phoneNumber"]);

        } else 
        {
            echo '<script language="javascript">';
            echo 'alert("accounts.php registerUser bad.")';
            echo '</script>';
        }

        header('location: ' . URL . 'home/index');
    }    
}
?>