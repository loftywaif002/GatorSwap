

<div id="login-overlay" >
    <div>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 style="text-align:center" class="modal-title" id="myModalLabel">Please sign in or register to sell items</h4>
        </div>
        <div class="modal-body">
            <div class="row">

                <div class="well col-xs-6 col-xs-offset-3 messageContainer" >
                    <form id="myForm" class="form-signin" method="post" action="<?php echo URL; ?>signin/login">
                        <div class="form-group">
                            <label for="username" control-label>Username</label>  
                            <input type="text" id="username" class="form-control" name="username" placeholder="Username" value="<?php
                            if (isset($_POST['username'])) {
                                echo htmlspecialchars($_POST['username']);
                            }
                            ?>" />
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="pwd" control-label>Password</label> 
                            <input id="pwd" class="form-control" type="password"  name="password" placeholder="Password" /> 
                            <span class="help-block"></span>
                        </div>
                        <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                        <button id="myBtn" class="btn btn-lg btn-primary btn-block" name="user-signin" type="submit" >Login</button>    

                    </form>
                </div>
			</div>
			
			<div class="row">
                <hr>
                <div style="text-align:center;">
                    <p class="lead" >Or register now for <span class="text-success">FREE</span></p>

                    <a href="<?php echo URL; ?>register/index"><button class="btn btn-lg btn-primary" name = "user_submit" type="submit" >REGISTER</button></a> 

                </div>
            </div>
        </div>
    </div>
</div>

<script>
// JavaScript Document

$('document').ready(function()
  { 
   $('#myForm').bootstrapValidator({
        //container: '#messages',
         err: {
            container: function($field, validator) {
                return $field.parent().next('.messageContainer');
            }
        },
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username cannot be empty'
                    },
                    regexp: {
                     regexp: /^[a-z0-9]+$/i,
                     message: 'Name can consist of alphanumeric characters only'
                    },

                }
            },
         password: {
            validators: {
                notEmpty: {
                        message: 'Password cannot be empty'
                    },
                  
            }
        }   
        }
    });
    
});


$(function() {
	$('.form-signin').keypress(function(e) {
		if(e.which == 13) {
			$('#myBtn').focus().click();
		}
	});
});
</script>
