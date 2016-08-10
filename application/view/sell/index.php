 
<style>
 @import "bourbon";

body {
	background: white;	
}

.wrapper {	
  margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
       .Title {
        text-align: center;
	line-height: 300%;
}
}

.form-signup {
  max-width: 80%;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signup-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}
        
	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
       .Title {
        text-align: center;
	line-height: 300%;
}
}
#conditions-button, #quantity-button, #delivery-button{
	border-color: #cccccc;
	margin-top: 15px;
	margin-bottom: 15px;

}
h3
{
    margin: 0px;
    font-size: 20pt;
}
.container{
   margin: auto;
}
.form-sell{
    font-size: 12pt;
    
}

#submit-button{
  /*margin-left: 384px; */
  padding: 12px 22px;
  font-size: 18px;
  border-radius: 8px;

}
input[type="file"] {
    margin-left: 0px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

</style>

<script>

$( document ).ready(function() {
    
     $('#hiddenDiv').hide();  
 });
          
</script>


<div id="seller-page" class="container">
    <h3 style="text-align:center; padding-top:10px;" >Sell an Item</h3>
    <hr style="margin-top: 15px;">
    
    <form name="form-sell" class="form-sell" role="form" action="<?php echo URL; ?>sell/postItem" method="POST" enctype="multipart/form-data">
        <h4>* Required</h4><br>
        <div class="col-md-6" id="first">

            <label>*Title:</label>
            <input class="form-control" name="item_title" placeholder=" " type="text" required>
            
            <br>
            <label>*Category:</label>
            <select class="form-control" name="item_category" required>
                <option selected value="">Please select a category</option>
                <?php foreach (array_slice($categoryList, 1) as $category) { 
                    if (isset($category->Category_ID))
                        $category_id = htmlspecialchars($category->Category_ID, ENT_QUOTES, 'UTF-8');
                    if (isset($category->Category_Name))
                        $category_name = htmlspecialchars($category->Category_Name, ENT_QUOTES, 'UTF-8');
                ?>
                <option <?php echo isset($_POST['item_category']) && $_POST['item_category'] == $category_id ? 'selected="' . $_POST['item_category'] . '" value="' . $category_id . '"' : 'value="' . $category_id  . '"' ?>>
                        <?php echo $category_name; ?>
                </option>
                <?php } ?>
            </select>
            <br>
            
            <label>*Item Condition:</label>
            <select class="form-control" name="item_condition" required>
              <option selected value="">Please select item condition</option>
              <option value="New">New</option>
              <option value="Used">Used</option>
            </select>
            <br>
            
            <div class="form-group">                
                <label>*Description: </label> 
                <textarea class="form-control" name="item_desc" cols="10" rows="3" style="resize: none;" placeholder="Describe your item here." required></textarea><br>
            </div>
            
             
        </div>
            
        <div class="col-md-6" id="second">
           
            <div class="form-group">
                <label>*Price:</label>
                <input class="form-control" name="item_price" placeholder="10.00" type="text" required>
            </div>
            <br>
            <div class="form-control-img">                
                <label>*Add Image: </label><br>
                    <input  type="file" size="60" name="item_image" accept=".jpg,.jpeg,.png">
            </div><br><br><br><br><br><br><br>
            <div class="col-md-12">
             	<input type="submit" value="CLICK TO SUBMIT" id="submit-button" class="btn btn-lg btn-primary center-block" name="postItem" onclick="checkPriceInput();"/> 
            </div>
        </div>
                    
    </form>
    <br><br><br>
</div>



