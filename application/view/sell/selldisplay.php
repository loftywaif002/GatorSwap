<style>
p{
    text-align: center;
    font-size: 28px;
} 

table{
    text-align: left;
    margin: 0 auto;
    
}
td{
    min-height: 300px;
    max-height: 300px;
    margin: 10px;
    padding: 10px;

}
img{
    margin: 0 auto;
}
.container-selldisplay{
    margin: 0 auto;
    padding-right: 30px;
    padding-left: 30px;
    padding-top: 15px;
}

.wrapper {	
       margin-top: 80px;
       margin-bottom: 80px;
       
}

.sellDispbuttons{
    width: 50%;
    margin: 0 auto; 
    text-align: center;
}
</style>


<div class="container-selldisplay">
    <!--<div class= "col-xs-6 col-md-6">-->
    <p>Item successfully posted. Thank you for using GatorSwap</p>
    
     <table>
         <tr>
           <td>
           <?php foreach ($itemListArr["itemListArr"] as $item_x) { ?>
            <h4><b><?php if (isset($item_x->Title)) echo htmlspecialchars($item_x->Title, ENT_QUOTES, 'UTF-8'); ?></h4></b>
            <h4><b>Item ID: <?php if (isset($item_x->Item_ID)) echo htmlspecialchars($item_x->Item_ID, ENT_QUOTES, 'UTF-8'); ?></h4> </b>
            
            <h4><b>Description: <?php if (isset($item_x->Description)) echo htmlspecialchars($item_x->Description, ENT_QUOTES, 'UTF-8'); ?></h4> </b>
            <h4><b>Price: $<?php if (isset($item_x->Price)) echo htmlspecialchars($item_x->Price, ENT_QUOTES, 'UTF-8'); ?></h4></b>
           </td>
           <td>
            <?php 
                    if (isset($item_x->IMG )&& !empty($item_x->IMG)) {
                            echo '<img style=" width:60%;" src="data:image/jpg;base64,' . base64_encode($item_x->IMG) . '" />';
                    }	else {
                      
                            echo ' <img style="width:60%" class="group" src="' . URL . 'public/img/gatorswap-logo.png" alt="" />';
                    }								
            ?>     

        <?php } ?>
           </td>
        </tr>
     </table> 
    
    <br>
    <div class="sellDispbuttons">
        <a href="<?php echo URL; ?>home/index"><button class="btn btn-lg btn-primary" name="index">Home</button></a>
        <a href="<?php echo URL; ?>sell/returnToSellItem"><button class="btn btn-lg btn-primary"  name="returnToSellItem">Return to Sell Page</button></a>
    </div>
    <br>
    
</div>
