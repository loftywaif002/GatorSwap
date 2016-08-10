<?php
/**
 * Communicates with the Item table in the database
 */
class Item extends Model
{
    /**
    * PAGE: All pages
    * This method handles connecting the category dropdown to the database.
    */
    public function getCategories() 
    {
	try 
        {
            // Query for retrieving item categories from the database
            $sql = "SELECT C.Category_ID, C.Category_Name  
                    FROM Item_Category C;";

            $query = $this->db->prepare($sql);
            $query->execute();

            $categoryList = $query->fetchAll();

            return $categoryList;

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
     
    /**
     * PAGE: sell
     * This method handles inserting new items on the Item table.
     * @param int $active_id, string $item_title, string $item_category, double $item_price, 
     * string $item_desc, string $item_condition
     */
    public function createItem($active_id, $item_title, $item_category, $item_price, $item_desc, $item_condition)
    {
        try {
        //Inserting to the Item table
        $sql = "INSERT INTO Item(Account_ID, Title, Price, Category_ID, Item_Condition, Description) 
		VALUES (:Account_ID, :Title, :Price, :Category_ID, :Item_Condition, :Description)";
        
        $query = $this->db->prepare($sql);
        $parameters = array(':Account_ID' => $active_id, ':Title' => $item_title, ':Price' => $item_price, 
                     ':Category_ID' => $item_category, ':Item_Condition' => $item_condition, ':Description' => $item_desc);
        
        $query->execute($parameters);
       
        $last_id = $this->db->lastInsertId();
        
        //Get the content of the image and then add slashes to it 
        $imagetmp = addslashes (@file_get_contents($_FILES['item_image']['tmp_name']));

        //Inserting to the Item_Img table
        $sql_itemimg = "INSERT INTO Item_Img(Item_ID, IMG) 
                        VALUES ('$last_id', '$imagetmp')";
              
        $query2 = $this->db->prepare($sql_itemimg);
        $parameters = array(':Item_ID' => $last_id, ':IMG' => $imagetmp);
 
        $query2->execute($parameters);}
        
        catch (PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
        }
 
    }
    
    /**
     * PAGE: selldisplay
     * This method handles getting the newly inserted item in the Item table and
     * displaying it.
     * @return array $itemListArr
     */
    public function displaypostItem()
    {
        try {
        $sql = "SELECT I.Item_ID, I.Title, I.Description, I.Item_Condition, I.Price, Im.IMG 
                FROM Item I, Item_Img Im
		WHERE (I.Account_ID = '{$_SESSION['account_id']}') AND (I.Item_ID = Im.Item_ID)
                ORDER BY I.Item_ID DESC LIMIT 1";
        
        $query = $this->db->prepare($sql);
        $query->execute();
        
        $ItemPost = $query->fetchAll();
			
	$itemListArr= array("itemListArr" => $ItemPost);
        
        return $itemListArr;
        
        }catch (PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
        }
        
    }
    
    /**
     * PAGE: sellhistdisplay
     * This method handles getting the newly inserted item in the Item table and
     * displaying it.
     * @return array $allitemListArr
     */
    
    public function displaypostItemHist()
    {
    
        try {
        $sql = "SELECT I.Item_ID, I.Title, I.Description, I.Item_Condition, I.Price, Im.IMG 
                FROM Item I, Item_Img Im
		WHERE (I.Account_ID = '{$_SESSION['account_id']}') AND (I.Item_ID = Im.Item_ID)";
        
        $query = $this->db->prepare($sql);
        $query->execute();
        
        $allItemPost = $query->fetchAll();
			
	$allitemListArr= array("allitemListArr" => $allItemPost);
        
        return $allitemListArr;}
        
        catch (PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
        }
    }
    
    /**
     * PAGE: itemmodal
     * This method handles getting information about the item using the Item_ID
     * for the modal (more info button)
     * @param int Item_ID
     * @return array $allitemListArr
     */
    public function findItem($itemID)
    {
        //return a single item based on $itemID
   	$sql = "SELECT I.Item_ID, I.Title, I.Category_ID, I.Item_Condition, I.Price, Description, Im.IMG, I.List_Date as List_Order 
		FROM Item I, Item_Img Im 
		WHERE I.Item_ID = Im.Item_ID AND I.Item_ID = " . $itemID .  " ; " ;
    
        try {

            $query = $this->db->prepare($sql);
            $query->execute();
            // return first row
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result ; 
    
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
	}
    }
    
    /**
     * PAGE: search
     * This method searches for the item using category and search text
     * @param string $keyword Searching for items with the specified keyword(s)
     * @return mixed array containing the result set and the number of results 
     */
	public function searchItems($keyword, $category)
    {
	$sql = "";
        
        if(empty($keyword) == true) {   
            //Query for searching the Item table when there's no keyword
            $sql = "SELECT I.Item_ID, I.Title, I.Category_ID, I.Item_Condition, I.Price, I.Description, Im.IMG, I.List_Date AS List_Order, C.Category_Name 
                    FROM Item I, Item_Img Im, Item_Category C
                    WHERE I.Item_ID = Im.Item_ID AND Is_Visible = 1 AND I.Category_ID = C.Category_ID " ;
				  
            } else {
		//Parse the string into an array
                $keywordarray = explode(" ",      $keyword);
      
            $searchString = "";
        
            foreach ($keywordarray as $word)
            {

                  $word = preg_replace("/[~`@#$%^&*()\-_+={}\[\]\|\\\\\/\:\;\"\'<>,.?]/", "", $word);

                  if(strlen($word) > 1)
                      $searchString = $searchString . " +" . $word . "*" ; 
            }
		  
		  //Query for searching the Item table using the search keyword
		  $sql = "SELECT I.Item_ID, I.Title, I.Category_ID, I.Item_Condition, I.Price, I.Description, Im.IMG, C.Category_Name,
			  Match(I.Title,  I.Description) AGAINST ('". $searchString . "') AS List_Order 
			  FROM Item I, Item_Img Im, Item_Category C
		          WHERE Match(I.Title, I.Description, I.Details) AGAINST ('" . $searchString . "' IN BOOLEAN MODE) 
			  AND I.Item_ID = Im.Item_ID AND Is_Visible = 1 AND I.Category_ID= C.Category_ID " ;
           }
      
        try {		
            //Filtering by case   
            $category = strtolower($category);
            switch($category ) {
                case "1" :
                    break;
                default:
                    $sql = $sql . "AND I.Category_ID = '" . $category . "' ";
                    break;
            }
            
                $sql = $sql .	"ORDER BY List_Order DESC;";	

                $query = $this->db->prepare($sql);
                $query->execute();

                // Counts the number of results from the search
                $resultCount = $this->db->prepare($sql);
                $resultCount->execute();
                $number_of_rows = $resultCount->rowCount();
                //echo " $number_of_rows results for $search" ;

                $resultSet = $query->fetchAll();

                $results = array("results" => $resultSet, "count" => $number_of_rows);

                return $results;
				
		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
    }
}
?>