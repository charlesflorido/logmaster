

$(function() {
    
    $('.custom-modal').hide();
    $('.slidepop').hide();
    
    
    $('.custom-modal .modal-panel .modal-close').click(
        function(){
            $(this).parent().slideUp(250);
            $(this).parent().parent().fadeOut(250);
        }
    );
    
    $('.btn-close-modal').click(
        function(){
           
            $(this).closest('.modal-panel').slideUp(250);
            $(this).closest('.custom-modal').fadeOut(250);
        }
    );
    
    $('.slidepop-trigger').click(
        function(){
            var target = $(this).attr('data-target');
            $(target).find('.slidepop-body').hide();
            $(target).fadeIn(250);
            $(target).find('.slidepop-body').slideDown(500);
         
    });
    
    $('.slidepop-close').click(
            function(){
                var slidepop = $(this).closest('.slidepop');
                $(this).closest('.slidepop-body').slideUp(250, function(){
                    slidepop.fadeOut(200);
                });
    });
    
    
});

function cInput(inputf){
    var obj = {};
    
    obj.input = $(inputf);
    obj.validate = function(){ return true; };
    obj.on_error = function(msg){};
    obj.remove_error = function(){};
    
    
    return obj;
}

function cmodal(modal_id){
    if(!$(modal_id).length){
        return;
    }
    
    
    var modal = $(modal_id);
    var obj = {};
    
    obj.show = function(){
        modal.children('div').hide();
        modal.fadeIn(250);
        
        if(modal.hasClass("modal-error")){
            modal.children('div').show();
            modal.children('div').effect('shake');
        }
        else{
            modal.children('div').slideDown(250);
        }
    };
    
    obj.hide = function(){
        modal.children('div').slideUp(250);
        modal.fadeOut(250);
    };
    
    return obj;
}


function base_url(){ 
    var pathArray =location.href.split( '/' );
    var protocol = pathArray[0];
    var host = pathArray[2];
    
    return protocol + '//' + host + '/logmaster';
}