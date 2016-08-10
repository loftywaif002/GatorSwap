<?php

if(!session_id())
{
    session_start();  
}
/**
* PAGE: editing profile
* This method handles editing user's profile
*/
class editProfile extends Controller
{
    /**
    * This is the function for editing profile
    * 
    */
    public function profileEdit()
    {
        if(!session_id()) 
        {
            session_start();  
        }

        $categoryList = $this->itemModel->getCategories();

        require APP . 'view/_templates/header.php';
        require APP . 'view/profile/profileEdit.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
    * This is the function for updating profile
    * 
    */
    public function updateUserInfo() 
    {
        
        if (isset($_POST["user-update"])) 
        {       
            try {	
                $username = $_SESSION['username'];   

                $accountId = $this->userModel->getAccountId($username);    
                $this->userModel->updateUser($accountId,$_POST['firstName'],$_POST['lastName'],$_POST['phoneNumber'],$_POST['address'],$_POST['city'],$_POST['state'],$_POST['zipcode'],$_POST['country']);

                header('location: ' . URL . 'profile/index');

                } catch(PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();
                }
        }   
    }
}
?>