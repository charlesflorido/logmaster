
<div class="main-body admin-panel">
    <div class="admin-login-panel">
        <div class="panel-logo"><img src="<?php echo base_url();?>static/img/cyberlab.png"></div>
        <div class="panel-title">
            CREATE ADMIN
        </div>
        <div class="panel-form">
            <input type="text" placeholder="admin name" id="admin_name" data-placement="right" data-content=""/>
            <input type="password" placeholder="password" id="admin_password"/>
            <input type="password" placeholder="confirm password" id="admin_cpassword" />
        </div>
        <div class="panel-form">
            <button class="btn-admin-success" id="admin_create_submit">CREATE</button>
        </div>
    </div>
</div>

<div class="custom-modal modal-center" id="admin_modal_success">
    <div class="modal-panel">
        <div class="modal-close"></div>
        <div class="modal-body" style="text-align: center">
            <h1 class="glyphicon glyphicon-ok color-success"></h1>
            <h4 id="msg_success"></h4>
        </div>
    </div>
</div>

<div class="custom-modal modal-error modal-center" id="admin_modal_error">
    
    <div class="modal-panel">
        <div class="modal-close"></div>
        <div class="modal-body text-center">
            <h4 id="msg_error">ERROR</h4>
        </div>
    </div>
</div>
