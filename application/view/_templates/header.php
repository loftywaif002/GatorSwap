
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>CSC 648 - Group 7</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/custom.css"> 
    </head>

    <body>
        <nav class="navbar navbar-default navbar-inverse" role="navigation">

            <a class="navbar-left" href="<?php echo URL; ?>home/index"><img id="logo" src=" <?php echo URL; ?>public/img/gatorswap-logo.png" alt="GatorSwap" width="300" height="110"></img></a>


            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>  
            </div>

            <div class="navbar-collapse collapse" id="myNavbar" style=" margin-top:20px;">
                <form class="form-inline pull-xs-right" action="<?php echo URL; ?>home/search" method="POST">

                    <div class = "">
                        <ul class="nav navbar-nav  " style = "padding-top:20px">
                            <li>     
                                <select class="form-control" id="menuitem" name="search-category">
                                    <?php
                                    foreach ($categoryList as $category) {
                                        if (isset($category->Category_ID))
                                            $category_id = htmlspecialchars($category->Category_ID, ENT_QUOTES, 'UTF-8');
                                        if (isset($category->Category_Name))
                                            $category_name = htmlspecialchars($category->Category_Name, ENT_QUOTES, 'UTF-8');
                                        ?>
                                        <option <?php echo isset($_POST['search-category']) && $_POST['search-category'] == $category_id ? 'selected="' . $_POST['search-category'] . '" value="' . $category_id . '"' : 'value="' . $category_id . '"' ?>>
                                        <?php echo $category_name; ?>
                                        </option>
<?php } ?>
                                </select> 
                            </li>


                            <li><div class="input-group">
                                    <input class="form-control search-input" type="search" placeholder="Search for an item" name="search-keyword" value="<?php echo isset($_POST['search-keyword']) ? $_POST['search-keyword'] : '' ?>">
                                    <div class="input-group-btn"><button class="btn btn-success-outline" id="search-button" name="search" value="Search"><i class="glyphicon glyphicon-search"></i></button></div></div>
                            </li>

                        </ul>
                    </div>

                </form>
                <div class = "col-xs-12 col-md-12" style = "padding-top:5px;">
                    <ul class="nav navbar-nav navbar-right ">  


                        <li id="sellLink1"><button class="btn btn-block btn-primary headerLinks" href="<?php echo URL; ?>checkLoginModal/index" data-remote="false" data-toggle="modal" data-target="#signinModal"><span class="glyphicon glyphicon-open headerLinks" style="font-size:1.5em;"></span> Sell An Item</button></li>
                        <li id="sellLink2"><a class="btn btn-block btn-primary headerLinks" href="<?php echo URL; ?>sell/index" role="button" style="padding-top:6px;padding-bottom:6px;"><span class="glyphicon glyphicon-open headerLinks" style="font-size:1.5em;"></span> Sell An Item</a></li>

                        <!-- modal template -->
                        <div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">


                                </div>
                            </div>
                        </div>

                        <script>
                            $("#signinModal").on("show.bs.modal", function (e) {
                                var link = $(e.relatedTarget);
                                $(this).find(".modal-content").load(link.attr("href"));
                            });

                        </script>


                        <li id="signinLink"><a href="<?php echo URL; ?>signin/index" class="headerLinks"><span class="glyphicon glyphicon-log-in headerLinks"></span> Sign In</a></li>
                        <li id="registerLink"><a href="<?php echo URL; ?>register/index" class="headerLinks"><span class="glyphicon glyphicon-log-in headerLinks"></span> Register</a></li>
                        <li id="logoutLink"><a href="<?php echo URL; ?>signin/index" class="headerLinks"><span class="glyphicon glyphicon-log-in headerLinks"></span> Logout</a></li>
                        <li id="profileLink"><a href="<?php echo URL; ?>profile/index" class="headerLinks"><span class="glyphicon glyphicon-user headerLinks"></span>

                                <?php
                                if (isset($_SESSION["login"])) {
                                    if ($_SESSION["login"]) {
                                        echo $_SESSION['username'];
                                        echo "
            <script type=\"text/javascript\">
              $('#sellLink1').hide();
              $('#sellLink2').show();
              $('#signinLink').hide();
              $('#registerLink').hide();
              $('#profileLink').show();
              $('#logoutLink').show();
              </script>
              ";
                                    }
                                } else {
                                    //Logout
                                    echo "
            <script type=\"text/javascript\">
              $('#sellLink2').hide();
               $('#sellLink1').show();
              $('#signinLink').show();
              $('#logoutLink').hide();
              $('#profileLink').hide();
              $('#cartLink').hide();
              </script>
             ";
                                    if (session_id()) {
                                        session_destroy();
                                    }
                                }
                                ?>  
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <script>
        $(function () {

            $(".dropdown-menu li a").click(function () {

                $(".btn:first-child").text($(this).text());
                $(".btn:first-child").val($(this).text());
            });

        });
        $(function () {

            $(".dropdown-menu1 li a").click(function () {

                $(".btn:first-child").text($(this).text());
                $(".btn:first-child").val($(this).text());
            });

        });
    </script>

    <style>

        .panel-primary>.panel-heading {
            background-color: #000000;
            border-color: #000000;
        }

        .panel-primary{
            border-color: #53565a
        }

        #sellLink2 .btn-primary:hover {
            background-color: #286090;
        }


    </style>