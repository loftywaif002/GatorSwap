<?php

/**
 * Communicates with the Account table in the database
 */
class Account extends Model
{	
    /**
     * This method adds the user to the Account table in the database. This 
     * function is used by the registering account function.
     * @param int $student_id, string $username, string $password 
     * @return int containing the account_id of the newly created account
     */
   public function registerAccount($username, $password, $sfsu_id) 
    {
        try 
        {
                // generate the unique salt for the Account
                $size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
                $salt = mcrypt_create_iv($size, MCRYPT_DEV_RANDOM);

                $NaCl_Hash = Hash("SHA256", $password . $salt);

                $sql1 = "INSERT INTO Account(Student_ID, Username, NaCl_Hash, NaCl) 
                                VALUES (:Student_ID, :Username, :NaCl_Hash, :NaCl)";

                // Query for creating new Account row
                $query1 = $this->db->prepare($sql1);
                $parameters1 = array(':Student_ID' => $sfsu_id, ':Username' => $username, ':NaCl_Hash' => $NaCl_Hash, ':NaCl' => $salt);

                $query1->execute($parameters1);

                // Query for retrieving Account_ID
                $sql2 = "SELECT Account_ID FROM Account WHERE Username = :Username;";

                $query2 = $this->db->prepare($sql2);
                $parameters2 = array(':Username' => $username);

                $query2->execute($parameters2);
                $account_id = $query2->fetch(PDO::FETCH_ASSOC);

                   //**For the registration page

             $_SESSION['username'] = $username;
                                 $_SESSION['student_id'] = $sfsu_id;
                                 $_SESSION['account_id'] = $account_id["Account_ID"];
             $_SESSION['login'] = true;
                        
            return $account_id['Account_ID'];		
        } 
        catch(PDOException $e) 
        {
                echo $sql2 . "<br>" . $e->getMessage();
        }

    }
}
