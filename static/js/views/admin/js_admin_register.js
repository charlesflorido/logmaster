
$(function() {
   
    /* Sets up the @adminForm */
    var adminForm = admin_signup_form($("#admin_name"), $("#admin_password"), $("#admin_cpassword"), $("#admin_create_submit"));
    
    /* Getting admin_sign_form fields */
    var input_name = cInput("#admin_name");
    var input_password = cInput("#admin_password");
    var input_cPassword = cInput("#admin_cpassword");
    
    
    /* Setting handler for displaying @input_name validation errors */
    input_name.on_error = function(msg){
        $("#admin_name").addClass('has-error');
        $("#admin_name").attr('data-content', msg);
        $("#admin_name").popover('show');
    };
    
    /* Setting handler for hiding @input_name validation errors */
    input_name.remove_error = function(){
        $("#admin_name").removeClass('has-error');
        $("#admin_name").popover('hide');
    };
    
    /* Setting handler for displaying @input_password validation errors */
    input_password.on_error = function(msg){
        $("#admin_password").addClass('has-error');
        $("#admin_password").attr('data-content', msg);
        $("#admin_password").popover('show');
    };
    
    /* Setting handler for hiding @input_password validation errors */
    input_password.remove_error = function(){
        $("#admin_password").removeClass('has-error');
        $("#admin_password").popover('hide');
    };
    
    /* Setting handler for displaying @input_cPassword validation errors */
    input_cPassword.on_error = function(msg){
        $("#admin_cpassword").addClass('has-error');
        $("#admin_cpassword").attr('data-content', msg);
        $("#admin_cpassword").popover('show');
    };
    
    /* Setting handler for hiding @input_cPassword validation errors */
    input_cPassword.remove_error = function(){
        $("#admin_cpassword").removeClass('has-error');
        $("#admin_cpassword").popover('hide');
    };
    
    
    
    /* Setting validation handler for @input_name
     *  
     * Validation Requirements
     *      - admin name should not be empty
     *      - admin name should be alphanumberic
     *      - admin name should be between 6-12 characters long
     *      
     * Returns true if all validation requirements are met, else returns false.
     */
    input_name.validate = function(){
        
        var ival = input_name.input.val();
        var valid = true;
        
        if(/[^a-zA-Z0-9]/.test(ival)){
            valid = false;
            input_name.on_error('must be alphanumeric');
        }
        else if(ival.length === 0){
            valid = false;
            input_name.on_error('field required');
        }
        else if (ival.length < 6 || ival.length > 12){
            valid = false;
            input_name.on_error('must be 6-12 characters long');
        }
        else{
            input_name.remove_error();
        }
        
        return valid;
    };
    
    /*
     * Setting validation handler for @input_password
     * 
     * Validation requirements
     *      - admin password should not be empty
     *      - admin password should be alphanumeric
     *      - admin password should be 8-16 characters long
     *      
     * Returns true if all validation requirements are met, else returns false. 
     */
    input_password.validate = function(){
        var ival = input_password.input.val();
        var valid = true;
        
        if(/[^a-zA-Z0-9]/.test(ival)){
            valid = false;
            input_password.on_error('must be alphanumeric');
        }
        else if(ival.length === 0){
            valid = false;
            input_password.on_error('field required');
        }
        else if (ival.length < 8 || ival.length > 16){
            valid = false;
            input_password.on_error('must be 8-16 characters long');
        }
        else{
            input_password.remove_error();
        }
        
        return valid;
    };
    
    /*
     * Setting validation handler for @input_cPassword
     * 
     * Validation requirements
     *      - @input_cPassword should not be empty
     *      - @input_cPassword should be equal to @input_password
     *      
     * Returns true if all validation requirements are met, else returns false. 
     */
    input_cPassword.validate = function(){
        
        var ival = input_cPassword.input.val();
        var valid = true;
        
        if(ival.trim() === ""){
            valid = false;
            input_cPassword.on_error("Input the same password to confirm");
        }
        else if(ival !== input_password.input.val()){
            valid = false;
            input_cPassword.on_error("Confirmation password failed");
        }
        else{
            input_cPassword.remove_error();
        }
        
        return valid;
    };
    
    
    
    /*
     * Triggers the validation handler for each @input_name, @input_password ,and @input_cPassword when it loses focus. 
     */
    input_name.input.blur(function(){
        input_name.validate();
    });
    input_password.input.blur(function(){
        input_cPassword.validate();
    });
    input_cPassword.input.blur(function(){
        input_cPassword.validate();
    })
    
    
    /*
     * Sets the validation handler for @adminForm
     * 
     * @returns {Boolean}
     */
    adminForm.validate = function(){
        var valid_name = input_name.validate();
        var valid_password = input_password.validate();
        var valid_cPassword = true;
        
        if(valid_password){
            valid_cPassword = input_cPassword.validate();
        }
        
        var valid = valid_name && valid_password &&  valid_cPassword;
        
        return valid;
    };
    
   adminForm.success = function(data){
       
        $('#msg_success').html("Admin successfully created");
        cmodal('#admin_modal_success').show();
        
        adminForm.clear();
   };
   
   adminForm.fail = function(data){
       $('#msg_error').html(data.message);
       cmodal('#admin_modal_error').show();
   };
   
   adminForm.error = function(msg){
       $('#msg_error').html(msg);
       cmodal('#admin_modal_error').show();
   }
    
    /*
    $('#admin_create_submit').click(
        function(){
            cmodal('#admin_create_modal').show();
        }
    );*/
});
