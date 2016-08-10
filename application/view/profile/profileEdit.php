<?php
if(!session_id())
   {
    session_start();  
   }
?>
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
.button{

}

</style>



<div id="signup" class="container">

    <form class="form-signup" role="form" method="post" id = "editProfile" action="<?php echo URL; ?>editProfile/updateUserInfo">
        <h3>Account Information</h3>
        <div class="row">
            <div class="col-md-6 messageContainer">

                <div class="form-group">
	                <label>First Name</label></br>
                       <input class="form-control" name="firstName"  type="text" value= <?php if(isset($_SESSION['firstname'])){ echo $_SESSION['firstname'] ;}?>>
            	</div>

            	<div class="form-group">
	                <label>Last Name</label></br>
                        <input class="form-control" name="lastName"  type="text" value= <?php if(isset($_SESSION['lastname'])){ echo $_SESSION['lastname']; }?>>      
            	</div>

		  <div class="form-group">
	                <label>Username</label></br>
                        <label><?php if(isset($_SESSION['username'])){ echo $_SESSION['username'] ;} ?></label>      
                        
            	</div>
                  <div class="form-group">
	                <label>SFSU E-mail</label></br>
                        <label><?php if(isset($_SESSION['username'])){ echo $_SESSION['username']."@mail.sfsu.edu" ;} ?></label>

                </div>

                <div class="form-group">
	                <label>SFSU ID:</label>
                        <label><?php if(isset($_SESSION['student_id'])){ echo  $_SESSION['student_id']; }?></label>
            	</div>

            </div>

            <div class="col-md-6 messageContainer">

                <div class="form-group">
	                <label>Phone Number</label>
                        <input class="form-control" type="text" name="phoneNumber"  value= "<?php if(isset($_SESSION['phone'])){echo  $_SESSION['phone']; }?>">         
            	</div>



                <div class="form-group">
	                <label>Address:</label>
                        <input class="form-control" name="address"  type="text" value= "<?php if(isset($_SESSION['address'])){ echo  $_SESSION['address'];} ?>">
              
            	</div>
        <div class="form-group">
	                <label>City</label>
                        <input class="form-control" name="city"  type="text" value= "<?php if(isset($_SESSION['city'])){ echo $_SESSION['city']; }?>">
                        
            	</div>
              
              <div class="form-group">
	                <label>State</label>
                        <input class="form-control" name="state"  type="text" value= "<?php if(isset($_SESSION['state'])){ echo $_SESSION['state']; }?>">
                        
            	</div>
        <div class="form-group">
	                <label>Zipcode</label>                 
                        <input class="form-control" name="zipcode"  type="text" value= "<?php if(isset($_SESSION['zipcode'])){ echo  $_SESSION['zipcode'] ;}?>">
                        
            	</div>
              
              <div class="form-group">
	                <label>Country</label>
                        <input class="form-control" name="country"  type="text" value= "<?php if(isset($_SESSION['country'])){ echo $_SESSION['country']; }?>">
                        
            	</div>
</div>
		
       <button  id="useEditBtn" class="btn btn-lg btn-primary btn-block" name="user-update" type="submit" >Save</button>
               

       </div>

    </form>
</div>

<script>
// JavaScript Document

$('document').ready(function()
  { 
   $('#editProfile').bootstrapValidator({
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
            sfsu_id: {
                validators: {
                    notEmpty: {
                        message: 'Your SFSU ID is required for registration'
                    },
                    numeric: {
                            message: 'Value must be numeric',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: ' '
                        },
                    stringLength: {
                        max: 9,
                        min: 9,
                        message: 'Hint: It\'s your 9 digit student ID'
                    }
                    
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username cannot be empty'
                    },
                    regexp: {
                     regexp: /^[a-z0-9]+$/i,
                     message: 'Username must consist of alphanumeric characters only'
                    },
                    stringLength: {
                        max: 20,
                        message: 'Username contains too many characters'
                    }
                }
            },
         password: {
            validators: {
                notEmpty: {
                        message: 'Password cannot be empty'
                    },
                identical: {
                    field: 'confirmPassword',
                },
                    stringLength: {
                        max: 25,
                        min: 6,
                        message: 'Password must be between 6-25 characters long'
                    }
                  
            }
        },
        confirmPassword: {
            validators: {
              notEmpty: {
                        message: 'Password cannot be empty'
                    },
                identical: {
                    field: 'password',
                    message: 'Paswords do not match'
                },
                    stringLength: {
                        max: 25,
                        min: 6,
                        message: 'Password must be between 6-25 characters long'
                    }
            }
        },
            firstname: {
                validators: {
                    notEmpty: {
                        message: 'The firstname is required and cannot be empty'
                    },
                    regexp: {
                     regexp: /^[a-z\s]+$/i,
                     message: 'First name must consist of alphabetical characters and spaces only'
                    },
                    stringLength: {
                        max: 35,
                        message: 'First name must be be shorter than 35 characters'
                    }
                }
            },
            lastname: {
                validators: {
                    notEmpty: {
                        message: 'The lastname is required and cannot be empty'
                    },
                    regexp: {
                     regexp: /^[a-z\s]+$/i,
                     message: 'Last name must consist of alphabetical characters and spaces only'
                    },
                     stringLength: {
                        max: 35,
                        message: 'Last name must be be shorter than 35 characters'
                    }
                }
            },
            country: {
                validators: {
                    notEmpty: {
                        message: 'Country is required and cannot be empty'
                    },
                    regexp: {
                     regexp: /^[a-z\s]+$/i,
                     message: 'Country name must consist of alphabetical characters and spaces only'
                    },
                     stringLength: {
                        max: 15,
                        message: 'Country name must be be shorter than 15 characters'
                    }
                }
            },
             state: {
                validators: {
                    notEmpty: {
                        message: 'State is required and cannot be empty'
                    },
                    regexp: {
                     regexp: /^[a-z\s]+$/i,
                     message: 'State name must consist of alphabetical characters and spaces only'
                    },
                    stringLength: {
                        max: 12,
                        message: 'State name must be be shorter than 12 characters'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'Address is required and cannot be empty'
                    },
                    regexp: {
                     regexp: /^[0-9a-zA-Z. ]+$/i,
                     message: 'Address must consist of alphanumeric characters and spaces only'
                    },
                     stringLength: {
                        max: 50,
                        message: 'Address must be be shorter than 50 characters'
                    }
                }
            },
             city: {
                validators: {
                    notEmpty: {
                        message: 'City is required and cannot be empty'
                    },
                    regexp: {
                     regexp: /^[a-z\s]+$/i,
                     message: 'City name must consist of alphabetical characters and spaces only'
                    },
                    stringLength: {
                        max: 15,
                        message: 'City name must be be shorter than 35 characters'
                    }
                }
            },
            phoneNumber: {
                validators: {
                    notEmpty: {
                        message: 'Phone number is required and cannot be empty'
                    },
                    regexp: {
                     regexp: /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/i,
                     message: 'This is an invalid phone number'
                            },
                    stringLength: {
                        message: 'Your 10 digit phone number'
                    }
                }
            },
             zipcode: {
                validators: {
                    regexp: {
                        regexp: /^\d{5}$/,
                        message: 'US zipcode must contain 5 digits'
                    }
                }
            }
           
        }
    });
    
});

$(function() {
	$('.form-signup').keypress(function(e) {
		if(e.which == 13) {
			$('#useEditBtn').focus().click();
		}
	});
});
</script>



