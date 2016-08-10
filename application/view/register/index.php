
<style>
 @import "bourbon";

body {
	background: #eee !important;
        height:100%;
}

.wrapper {	
	margin-top: 80px;
  margin-bottom: 80px;
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


<div id="signup" class="container">

  <h3 Style = "text-align:center">Already Have an account? <a href="<?php echo URL; ?>signin/index" >Login</a></h3>
    
    <form class="form-signup"  method="post" id="register-form" role="form" method="post" action="<?php echo URL; ?>register/addUser">
        <h3>Register To Create Your Account</h3>
        <div class = "row ">
        
            <div class="col-md-5 messageContainer" >
                
              <div class="form-group">                
	                <label>SFSU ID:</label> 
	                <input class="form-control" name="sfsu_id" placeholder="SFSU ID" type="text">
                        
            	</div>
                
  
                <div class="form-group form-inline"> 				
	                <label>SFSU E-mail</label></br> 
                        <input style="width:60%" class="form-control" name="username" placeholder="username" type="text"  value="" required /> @mail.sfsu.edu<br>
            	        
                  <b Style = "font-size: 80% ">Example: <i Style = "color:blue">jdoe@mail.sfsu.edu</i> is <b Style = "color:blue">jdoe</b></b>
                </div>
                
                
                <div class="form-group">                
	                <label>Password</label> 
	                <input class="form-control" name="password" placeholder="Password" type="password">
                        
            	</div>
                
                
                <div class="form-group">                
	                <label>Confirm Password</label> 
	                <input class="form-control" name="confirmPassword" placeholder="Confirm Password" type="password">
                        
            	</div>
                
            
            </div>
            <div class="col-md-1"></div>
            
            <div class="col-md-5 messageContainer" >

                <div class="form-group">
	                <label>First Name</label>
	                <input class="form-control" name="firstname" placeholder="First Name" type="text">

            	</div>
                
                
            	<div class="form-group">
	                <label>Last Name</label>
	                <input class="form-control" name="lastname" placeholder="Last Name" type="text">
                           
            	</div>
   		
                
                <div class="form-group">                
	                <label>Country</label> 
	                <input class="form-control"  name="country" placeholder="Ex: USA" type="text"> 
            	</div>
               
                
                <div class="form-group">                
	                <label>State</label> 
	                <input class="form-control"  name="state" placeholder="Ex: California" type="text"> 
            	</div>
                
              
                <div class="form-group">                
	                <label>Address:</label> 
	                <input class="form-control" name="address"  placeholder="Example: 1600 Holloway Ave." type="text"> 
            	</div>
                
                
                <div class="form-group">                
	                <label>City</label> 
	                <input class="form-control"  name="city" placeholder="Example: San Francisco" type="text"> 
            	</div>
                
                
                <div class="form-group">                
	                <label>Zipcode</label> 
	                <input class="form-control" name="zipcode" placeholder="Example: 94132" type="text">    
            	</div>
                
              
              <div class="form-group">                
	                <label>Phone Number</label> 
	                <input class="form-control" name="phoneNumber" placeholder="Example: 510-408-1325" type="text"> 
                       
              </div>
                
              <div class="col-md-1"></div>

        </div>
              <div class="col-md-offset-3 col-md-6 " Style = "Padding-top:2%">
                  <button id="regBtn" class="btn btn-lg btn-primary btn-block" name = "user_submit" type="submit" >REGISTER</button>    
              </div>
       </div>
                  
    </form>
     
<script>
// JavaScript Document

$('document').ready(function()
  { 
   $('#register-form').bootstrapValidator({
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
			$('#regBtn').focus().click();
		}
	});
});
</script>

</div>
