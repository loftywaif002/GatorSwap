<div class="container">
<div class="row">
    <div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-2 ">
<?php

    if (isset($item['IMG']) && !empty($item['IMG'])) {
         echo '<img class="pull-left" width="256"  src="data:image/jpg;base64,' . base64_encode($item['IMG']) . '" alt=""/>';
        } else {
              echo ' <img class="pull-left" width="256" height="256" src="http://placehold.it/400x250/000/fff" alt="" /> ';
        }
 ?>
	</div>
  <div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-1">
        <h2> <b><?php if (isset($item['Title'])){ 
            echo $item['Title'];} ?> </b></h2>  
          <h5><b> Id: </b><?php if (isset($item['Item_ID'])){ 
            echo $item['Item_ID'];} ?> </h5>  
          <h5> <b> Condition: </b> <?php if (isset($item['Item_Condition'])){ 
            echo $item['Item_Condition'];} ?> </h5>  
            <p><b> Description: </b></p>
            <p> <?php if (isset($item['Description'])){ 
            echo $item['Description'];} ?> </p>  
            <br>
         <h3> Price: $<?php if (isset($item['Price'])){ 
            echo $item['Price'];} ?> </h3>
  </div> 
  
      </div> 
      <div class="row" style="margin-top: 50px; text-align:center;">	
		<form method="post" action="<?php echo URL; ?>home/search">
			<input type="hidden" name="search-keyword" value="<?php echo $search_query[0] ?>" />
			<input type="hidden" name="search-category" value="<?php echo $search_query[1] ?>" />
			<button class="btn btn-default btn-lg" style="font-size:18px; margin-right:10px" name="return_search" type="submit">
				Return
			</button>
			<a href="<?php echo URL; ?>thankyoumessage/index" style="font-size:18px; margin-left:10px" type="button" class="btn btn-primary btn-lg">
			Confirm your order
			</a>
		</form>
      </div>
    </div><br><br>
