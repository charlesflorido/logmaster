
/*
 * Initializes the form for create an admin.
 * 
 * name_input - The text input for the admin name
 * password_input - The text input for the admin password
 * cpassword_input - The text input for confirming the password
 * submit_btn - Button for submitting the data in the form
 * 
 */
function admin_signup_form(name_input, password_input, cpassword_input, submit_btn){
    var obj = {};
    
    obj.validate = function(){return true; };
    obj.fail = function(data){};
    obj.success = function(data){};
    obj.error = function(msg){};
    
        
    if(!name_input.length || !password_input.length || !cpassword_input.length && !submit_btn.length ){
        return;
    }
    
    obj.clear = function(){
        name_input.val('');
        password_input.val('');
        cpassword_input.val('');
    }
    
    submit_btn.click(
            function(){
                if(obj.validate()){
                    
                    var sendData = admin_signup_data(name_input.val(), password_input.val(), cpassword_input.val());
                    
                    
                    $.post(base_url() + "/admin/apicreateadmin", sendData, function(data){
                        data = JSON.parse(data);
                        
                        if(data.valid){
                            obj.success(data);
                        }
                        else{
                            obj.fail(data);
                        }
                    }).fail(function(xhr, status, error){
                        obj.error(error);
                    });
                }
            }
    );
    
    return obj;
}

function admin_signup_data(name, password, cpassword){
    var obj = {};
    
    obj.admin_name = name;
    obj.admin_password = password;
    obj.admin_cpassword = cpassword;
    
    return obj;
}