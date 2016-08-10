
<style>
@import "bourbon";

body {
	background: #eee !important;
        
        
}

.wrapper {	
       margin-top: 80px;
       margin-bottom: 80px;
       
}

.form-sign-in {
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



</style>

  <div id="login" class="container wrapper">
      
      <form id="myForm" class="form-sign-in" role="form" method="post" action="<?php echo URL; ?>signin/login">  
		
        <h3>Login or <a href="<?php echo URL; ?>register/index">Sign up</a> </h3>
		<div class="messageContainer">
      <div class="form-group">
		  <label>Username</label>  
		  <input type="text" id="username" class="form-control" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])){echo htmlspecialchars($_POST['username']); }?>" />
	  </div>
      
	  <div class="form-group">
		  <label>Password</label> 
		  <input id="pwd" class="form-control" type="password"  name="password" placeholder="Password" /> 
      </div>
	  </div>
      <br>
      <button id="myBtn" class="btn btn-lg btn-primary btn-block" name="user-signin" type="submit" >Login</button>    
    </form>
 
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
	$('.form-sign-in').keypress(function(e) {
		if(e.which == 13) {
			$('#myBtn').focus().click();
		}
	});
});
</script>







