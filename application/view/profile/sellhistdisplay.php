<style>
    
table{
    margin: 15px;
        
    }
.sellhistbuttons{
    width: 50%;
    margin: 0 auto; 
    text-align: center;
}   
.sellitem{
    margin-bottom: 10 px;
}

.wrapper {    
      margin-top: 80px;
      margin-bottom: 80px;
      
}

</style>

<div class="container">
    
    
    
     <div class="sellitems" class="row list-group is-table-row">

        <?php
			if(!empty($allitemListArr["allitemListArr"])) {
              foreach ($allitemListArr["allitemListArr"] as $item_x) { ?>
             
            
            <div class="item col-xs-6 col-md-3 " style="margin-bottom: 10px">

                <div class="thumbnail">
                   <?php
                    if (isset($item_x->IMG) && !empty($item_x->IMG)) {
                        echo '<img style="max-height: 180px; min-height: 180px; padding: 8px; margin: 8px;" class="group"  src="data:image/jpg;base64,' . base64_encode($item_x->IMG) . '" alt=""/>';

                    } else {
                        echo ' <img style="max-height: 180px; min-height: 180px; padding: 8px; margin: 8px;" class="group " src="http://placehold.it/400x250/000/fff" alt="" /> ';
                         
                    }
        
                    ?>
                                          
                    <div class= "caption list-group-text">
                        <p class="group inner">
                            <b>Item ID:<?php if (isset($item_x->Item_ID)) echo htmlspecialchars($item_x->Item_ID, ENT_QUOTES, 'UTF-8'); ?> </b> 
                        </p>
                        
                        <p class="group inner" style="height:47px">
                            <b>Title: <?php if (isset($item_x->Title)) echo htmlspecialchars($item_x->Title, ENT_QUOTES, 'UTF-8'); ?> </b> 
                        </p>
                        
                        <p class="lead" style="margin: 0px;">
                            <?php if (isset($item_x->Price)) echo "$" . htmlspecialchars($item_x->Price, ENT_QUOTES, 'UTF-8'); ?> 
                        </p>

                    </div>
                </div>
      
            </div>
 
              <?php }
			  } else { ?>
					<div class="col-md-12  wrapper" style="text-align:center">
					<h3>You haven't posted any items yet!</h3>
					</div>
			  <?php  } ?>
        <hr>
        <br>
     </div>

</div>
<div class="sellhistbuttons">
        <a href="<?php echo URL; ?>home/index"><button class="btn btn-lg btn-primary" name="index">Home</button></a>
        <a href="<?php echo URL; ?>profile/index"><button class="btn btn-lg btn-primary"  name="returnToProf">Return To Profile Page</button></a>
</div>
<br><br>