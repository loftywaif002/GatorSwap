<!-- Default bootstrap modal example -->
<?php 
    // Row id set from Search.php
    $rowid = $_POST['item_id'];
   
 ?> 
   <!--  Use $results['content'] where 'content' is the item's information 

<?php if (isset($results['Title'])) {  
        echo $results['Title'];
        } ?>

   --> 
    <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
       
      </div>
    <div class="modal-body clearfix">
    <div class= "col-xs-6 col-md-6">
<?php

    if (isset($results['IMG']) && !empty($results['IMG'])) {
         echo '<img class="pull-left" width="256"  src="data:image/jpg;base64,' . base64_encode($results['IMG']) . '" alt=""/>';
        } else {
              echo ' <img class="pull-left" width="256" height="256" src="http://placehold.it/400x250/000/fff" alt="" /> ';
        }
 ?>
	</div>
  <div class= "col-xs-6 col-md-6">
        <h2> <b><?php if (isset($results['Title'])){ 
            echo $results['Title'];} ?> </b></h2>  
          <h5><b> Id: </b><?php if (isset($results['Item_ID'])){ 
            echo $results['Item_ID'];} ?> </h5>  
          <h5> <b> Condition: </b> <?php if (isset($results['Item_Condition'])){ 
            echo $results['Item_Condition'];} ?> </h5>  
            <p><b> Description: </b></p>
            <p> <?php if (isset($results['Description'])){ 
            echo $results['Description'];} ?> </p>  
            <br>
         <h3> Price: $<?php if (isset($results['Price'])){ 
            echo $results['Price'];} ?> </h3>
  </div> 
  
      </div> 
      <div class="modal-footer">
        
          <?php
             if(isset($_SESSION["login"])){
               if($_SESSION["login"])
               {  
             ?>
                  <form method="post" action="<?php echo URL; ?>confirmation/index">
							  <input type="hidden" name="item_id" value="<?php if (isset($results['Item_ID'])) echo $results['Item_ID']; ?>" />
							  <input type="hidden" name="search_key" value="<?php echo htmlspecialchars($search_query[0], ENT_QUOTES, 'UTF-8'); ?>" />
							  <input type="hidden" name="search_cat" value="<?php echo htmlspecialchars($search_query[1], ENT_QUOTES, 'UTF-8'); ?>" />
							  <button style="font-size:18px" type="button" class="btn btn-lg btn-default" data-dismiss="modal"> Return </button>
                              <button style="font-size:18px" class="btn btn-lg btn-primary" name="confirm" type="submit">Buy it now</button>
							</form>
             
               <?php  }
              }      
                 else 
               {  ?>
				<button style="font-size:18px" type="button" class="btn btn-lg btn-default" data-dismiss="modal"> Return </button>
                <button href="<?php echo URL; ?>checkLoginModal/index"  data-toggle="modal" data-dismiss = "modal" data-remote="false" data-target="#loginModal" style="font-size:18px" type="button" class="btn btn-lg btn-primary">Buy it now</button>  
              
               <?php   }  
               
               ?>
       
    <!--   <button style="font-size:18px" type="button" class="btn btn-lg btn-primary" data-dismiss="modal">Buy it now</button>   -->
       
      </div>
    </div>
  

 