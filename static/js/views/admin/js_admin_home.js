$(function() {
    admin_home_set_name();
    admin_name_form($('#input_admin_name'), $('#btn_update_name'), $('#text_name_success'), $('#text_name_error'));
    
    var settingsSlidePop = slidepop('#admin_settings');
    
    $('#btn_admin_settings').click(function(){
        $('#btn_update_name').hide();
        $('#text_name_success').hide();
        $('#text_name_error').hide();
        $('#input_admin_name').val(admin.name);
        settingsSlidePop.show();
    });
});

function admin_home_set_name(){
    $('#label_admin_name').html(admin.name);
    $('#input_admin_name').val(admin.name);
}

function admin_name_form(input, updateBtn, successMsg, errorMsg){
    input.val(admin.name);
    updateBtn.hide();
    successMsg.hide();
    errorMsg.hide();
    
    input.on('input', function(){
        var curname = input.val().trim();
        input.val(curname);
        
        successMsg.hide();
        errorMsg.hide();
        updateBtn.hide();
        
        if(curname == ""){
            errorMsg.html("Admin name required!");
            errorMsg.show();
        }
        else if(curname.length < 6 || curname.length > 12){
            errorMsg.html("Should be 6-12 characters long");
            errorMsg.show();
        }
        else if(admin.name != curname){
            updateBtn.show();
        }
        else{
            updateBtn.show();
        }
    });
    
    updateBtn.click(function(){
        var sendData = {};
        sendData.admin_name = input.val().trim();
        
        successMsg.hide();
        errorMsg.hide();
        updateBtn.hide();
        
        $.post(base_url() + "/admin/update_admin_name", sendData, function(data){
            data = JSON.parse(data);
            if(data.valid){
                admin.name = sendData.admin_name;
                admin_home_set_name();
                successMsg.html("Successfully updated");
                successMsg.show();
            }
            else{
                errorMsg.html(data.message);
                errorMsg.show();
            }
        }).fail(function(xhr, status, error){
            errorMsg.html(error);
            errorMsg.show();
        });
    });
}

