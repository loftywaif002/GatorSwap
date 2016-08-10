
<style>

    /* Code for footer starts */
    footer {

        background-color: #53565A;
        border-top: 1px solid #E7E7E7;
        text-align:center;
        padding:20px;   
        position: relative;
        left: 0;
        bottom: 0;   
        width: 100%;

    } 

    .footerLinks{
        color:white;

    }

    .footerLinks:hover{
        color:#C99700;

    }
    /*Code for the footer ends*/
</style>
<!--   <p> <?php
if (isset($results["results"][1]->Title)) {
    echo $results["results"][1]->Title;
}
?> </p> -->


<body style = "background-color:#F0f0f0;">
<!-- Details Modal --> 

<!--<a href= "<?php echo URL; ?>itemmodal/index" data-remote="false" data-toggle="modal" data-rowid = "NULL" data-target="#myModal" class="btn btn-default">
   Launch Modal
</a>
    -->
    <!-- modal template -->
    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <!-- modal template -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <!--search results body --> 

    <div class="container" >
    <!-- This displays the number of results found. If no results are found, then "no results found" is displayed.-->

        <h2 id="results"><?php echo $results["count"]; ?> results found </h2>
        <h2 id="one_result"><?php echo $results["count"]; ?> result found </h2>
        <h2 id="noResults"> No results found
            <?php
            if ($results["count"] < 1) {
                echo "
            <script type=\"text/javascript\">
              $('#results').hide();
			  $('#one_result').hide();
              $('#noResults').show();
              </script>
              ";
            } elseif ($results["count"] == 1) {
                echo "
			<script type=\"text/javascript\">
              $('#results').hide();
			  $('#one_result').show();
              $('#noResults').hide();
              </script>
              ";
            } else {
                echo "
            <script type=\"text/javascript\">
              $('#results').show();
			  $('#one_result').hide();
              $('#noResults').hide();
              </script>
              ";
            }
            ?>
        </h2>

        <div id="products" class="row list-group is-table-row">

            <?php
            // Incrementing variable for details button 
            $rowID = 0;

            foreach ($results["results"] as $result) {
                ?>


                <div class="item col-xs-6 col-md-3 " style="margin-bottom: 40px">

                    <div class="thumbnail">
                        <?php
                        if (isset($result->IMG) && !empty($result->IMG)) {
                            echo '<img style="max-height: 180px; min-height:180px; padding-top: 7px;" class=" group"  src="data:image/jpg;base64,' . base64_encode($result->IMG) . '" alt=""/>';
                        } else {
                            echo ' <img style="max-height:180px; padding-top: 7px; min-height:180px;" class="group" src="' . URL . 'public/img/gatorswap-logo.png" alt="" /> ';
                        }
                        ?>

                    <div class= "caption list-group-text">
                        <h3 class="group inner" style="margin-bottom:38px; height:37px">
                            <b> <?php if (isset($result->Title)) echo htmlspecialchars($result->Title, ENT_QUOTES, 'UTF-8'); ?> </b> 
                        </h3>

                        <p style="margin: 0px; padding-top: 5px; padding-bottom: 3px;"> 
                            <b><i><?php if (isset($result->Category_Name)) echo htmlspecialchars($result->Category_Name, ENT_QUOTES, 'UTF-8'); ?> </i></b>
                        </p>

                        <p style="margin: 0px; padding-top: 0px; padding-bottom: 3px;"> 
                            <b>Condition:</b> <?php if (isset($result->Item_Condition)) echo htmlspecialchars($result->Item_Condition, ENT_QUOTES, 'UTF-8'); ?> 
                        </p>

                        <p class="lead" style="margin: 0px;">
                    <?php if (isset($result->Price)) echo "$" . htmlspecialchars($result->Price, ENT_QUOTES, 'UTF-8'); ?> 
                        </p>

                    <hr style ="border-color:black; margin-top: 5px; margin-bottom: 10px;">

                    <div class="btn-group" style="margin-top: 0px;">
                        <div class="col-xs-6 col-md-6">
                            <button href="<?php echo URL; ?>itemmodal/index" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-block btn-default" 
                                    data-item= "<?php if (isset($result->Item_ID)) echo htmlspecialchars($result->Item_ID, ENT_QUOTES, 'UTF-8'); ?>" 
                                    data-searchkey="<?php echo htmlspecialchars($search_query[0], ENT_QUOTES, 'UTF-8'); ?>" 
                                    data-searchcat="<?php echo htmlspecialchars($search_query[1], ENT_QUOTES, 'UTF-8'); ?>" >More Info</button> 
                        </div>

                        <div class="col-xs-6 col-md-6"> 
                            <?php
                            if (isset($_SESSION["login"])) 
                                {
                                if ($_SESSION["login"]) 
                                    {
                                        ?>
                                        <form method="post" action="<?php echo URL; ?>confirmation/index">
                                            <input type="hidden" name="item_id" value="<?php if (isset($result->Item_ID)) echo htmlspecialchars($result->Item_ID, ENT_QUOTES, 'UTF-8'); ?>" />
                                            <input type="hidden" name="search_key" value="<?php echo htmlspecialchars($search_query[0], ENT_QUOTES, 'UTF-8'); ?>" />
                                            <input type="hidden" name="search_cat" value="<?php echo htmlspecialchars($search_query[1], ENT_QUOTES, 'UTF-8'); ?>" />
                                            <button class="form-control btn btn-block  btn-primary" name="confirm" type="submit">Buy it now</button>
                                        </form>

                                        <?php
                                    }
                                }
                            else {
                             ?>
                            <button href="<?php echo URL; ?>checkLoginModal/index"  data-toggle="modal" data-remote="false" data-target="#myModal" class="btn btn-block  btn-primary">Buy it now</button>  

                            <?php }
                            ?>
                        </div>

                     </div>
                    </div>
                    </div>
                </div>

                <?php
                $rowID++;}?>      
        </div>
    </div>

<script>
        //Function for ajax modal 
        $("#myModal").on("show.bs.modal", function (e) {
            var link = $(e.relatedTarget);
            var Id = link.data('item');
            var SearchKey = link.data('searchkey');
            var SearchCat = link.data('searchcat');
            $(this).find(".modal-content").load(link.attr("href"), {item_id: Id, search_key: SearchKey, search_cat: SearchCat});
        });


        $('#myModal').on('hidden.bs.modal', function () {
            $(this).find(".modal-content").html("");

        });
        $("#loginModal").on("show.bs.modal", function (e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-content").load(link.attr("href"));
        });

        $('#loginModal').on('hidden.bs.modal', function () {
            $(this).find(".modal-content").html("");

        });
        $('.advenced').click(function (e) {
            e.preventDefault();
            $('#panelAdv').toggle();
        });
        $('.plus1 a').click(function (e) {
            e.preventDefault();
            if ($(this).children('i').hasClass('glyphicon-plus')) {
                $(this).children('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
            }
            else {
                $(this).children('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
            }
            $('.morePanel1').toggle();
        });
        $('.plus2 a').click(function (e) {
            e.preventDefault();
            if ($(this).children('i').hasClass('glyphicon-plus')) {
                $(this).children('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
            }
            else {
                $(this).children('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
            }
            $('.morePanel2').toggle();
        });
        $('.plus3 a').click(function (e) {
            e.preventDefault();
            if ($(this).children('i').hasClass('glyphicon-plus')) {
                $(this).children('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
            }
            else {
                $(this).children('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
            }
            $('.morePanel3').toggle();
        });
</script>

</body>

