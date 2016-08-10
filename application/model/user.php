<?php
if(!session_id())
   {
    session_start();  
   }

/**
 * Communicates with the User table in the database
 */
class User extends Model
{
        
    /**
     * PAGE: profileedit
     * This method Set's the user's full name in the database when they first register
     * @param int $account_id, string $firstname, string $lastname, string $country, string $state, string $address, string $city, int $zipcode, int $phoneNumber
     */
    public function setUser($account_id,$firstname, $lastname,$country,$state,$address, $city, $zipcode,$phoneNumber) 
    {	
        try {	

                $sql = "UPDATE User SET F_Name= :firstname,L_Name=:lastname,Country=:country,State=:state,Address=:address,City=:city,Zipcode=:zipcode,Phone=:phoneNumber WHERE Account_ID = :account_id;";
                $query = $this->db->prepare($sql);
                $parameters = array(':account_id'=>$account_id,':firstname' => $firstname, ':lastname' => $lastname,':country'=>$country,':state'=>$state,':address'=>$address,':city'=>$city,':zipcode'=>$zipcode,':phoneNumber'=>$phoneNumber);
                $query->execute($parameters); 


                $sql4="SELECT F_Name,L_Name,Country,State,Address,City,Zipcode,Phone FROM User WHERE Account_ID = :accountId;";
                $query4 = $this->db->prepare($sql4);
                $parameters4 = array(':accountId' => $account_id);
                $query4->execute($parameters4);
                $userInfo = $query4->fetch(PDO::FETCH_ASSOC);   


                $_SESSION['firstname']=$userInfo['F_Name'];
                $_SESSION['lastname']=$userInfo['L_Name'];
                $_SESSION['country']=$userInfo['Country'];
                $_SESSION['state']=$userInfo['State'];
                $_SESSION['address']=$userInfo['Address'];
                $_SESSION['city']=$userInfo['City'];
                $_SESSION['zipcode']=$userInfo['Zipcode'];
                $_SESSION['phone']=$userInfo['Phone'];
            } 
            catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
            }
    }
        
        
    /**
     * This method checks user info if its in the Account and User database
     * @param string $username, string $password
     * */ 
    public function loginAccount($username, $password) 
    {

            try {
                    $_SESSION['login'] = false;
                    //$account_exist = true;

                    // Query to retrieve salt to verify password
                    $sql1 = "SELECT NaCl FROM Account WHERE Username = :username;";

                    $query1 = $this->db->prepare($sql1);
                    $parameters1 = array(':username' => $username);
                    $query1->execute($parameters1);
                    $row1 = $query1->fetch(PDO::FETCH_ASSOC);

                    $salt = $row1['NaCl'];

                    $NaCl_Hash = Hash("SHA256", $password . $salt);

                    // Query to retrieve a row that matches the log in information
                    $sql2 = "SELECT Account_ID, Student_ID, Username, Date_created 
                                    FROM Account 
                                    WHERE Username = :username AND NaCl_Hash = :Nacl_Hash;";// AND NaCl_Hash = :Nacl_Hash;";

                    $query2 = $this->db->prepare($sql2);
                    $parameters2 = array(':username' => $username, ':Nacl_Hash' => $NaCl_Hash); 

                    $query2->execute($parameters2);


                    $sql3 = "SELECT Account_ID,Student_ID FROM Account WHERE Username = :username;";
                    $query3 = $this->db->prepare($sql3);
                    $parameters3 = array(':username' => $username);
                    $query3->execute($parameters3);


                    $account = $query3->fetch(PDO::FETCH_ASSOC);
                    $accountId = $account['Account_ID'];


                    $studentId = $account['Student_ID'];
                    $sql4="SELECT F_Name,L_Name,Country,State,Address,City,Zipcode,Phone FROM User WHERE Account_ID = :accountId;";
                    $query4 = $this->db->prepare($sql4);
                    $parameters4 = array(':accountId' => $accountId);
                    $query4->execute($parameters4);
                    $userInfo = $query4->fetch(PDO::FETCH_ASSOC);


                    // Check that a row exists with the log in information
                    if(empty($query2->fetchAll())) {
                        //$account_exist = false;
                        $_SESSION['login'] = false; 
                    }
                    else
                    {
                     $_SESSION['account_id'] = $accountId;
                     $_SESSION['username'] = $username;
                     $_SESSION['login'] = true;
                     $_SESSION['firstname']=$userInfo['F_Name'];
                     $_SESSION['lastname']=$userInfo['L_Name'];
                     $_SESSION['student_id']=$studentId;
                     $_SESSION['country']=$userInfo['Country'];
                     $_SESSION['state']=$userInfo['State'];
                     $_SESSION['address']=$userInfo['Address'];
                     $_SESSION['city']=$userInfo['City'];
                     $_SESSION['zipcode']=$userInfo['Zipcode'];
                     $_SESSION['phone']=$userInfo['Phone'];
                    }

                    //return $account_exist;

            } catch (PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
            }
    }
    
    /**
     * This method gets the Account_ID from the Account table
     * @param string $username
     * @return int $accountId
     **/
    
    public function getAccountId($username)
    {

          $sql = "SELECT Account_ID FROM Account WHERE Username = :username;";
          $query = $this->db->prepare($sql);
          $parameters = array(':username' => $username);
          $query->execute($parameters);
          $account = $query->fetch(PDO::FETCH_ASSOC);
          $accountId = $account['Account_ID']; 
          return $accountId;
    }
    
    /**
     * PAGE: profile
     * This method gets the Account_ID from the Account table
     * @param int $accountId, string $firstName, string $lastName,int $phoneNumber,
     * string $address, string $city, string $state, string $zipcode, string $country
     * 
     **/
    public function updateUser($accountId,$firstName,$lastName,$phoneNumber,$address,$city,$state,$zipcode,$country) 
    {
          $sql = "UPDATE User SET F_Name= :firstname,L_Name=:lastname,Phone=:phoneNumber,Address=:address,City=:city,State=:state,Zipcode=:zipcode,Country=:country WHERE Account_ID = :account_id;";
          $query = $this->db->prepare($sql);
          $parameters = array(':account_id'=>$accountId,':firstname' => $firstName, ':lastname' => $lastName,':phoneNumber'=> $phoneNumber,':address'=>$address,':city'=>$city,':state'=>$state,':zipcode'=>$zipcode,':country'=>$country );
          $query->execute($parameters); 

          $sql2="SELECT F_Name,L_Name,Phone,Address,City,State,Zipcode,Country FROM User WHERE Account_ID = :accountId;";
          $query2 = $this->db->prepare($sql2);
          $parameters2 = array(':accountId' => $accountId);
          $query2->execute($parameters2);
          $userInfo = $query2->fetch(PDO::FETCH_ASSOC);

          $_SESSION['firstname']=$userInfo['F_Name'];
          $_SESSION['lastname']=$userInfo['L_Name'];
          $_SESSION['address']=$userInfo['Address'];
          $_SESSION['phone']=$userInfo['Phone'];
          $_SESSION['city']=$userInfo['City'];
          $_SESSION['state']=$userInfo['State'];
          $_SESSION['zipcode']=$userInfo['Zipcode'];
          $_SESSION['country']=$userInfo['Country'];

    }
          
}


