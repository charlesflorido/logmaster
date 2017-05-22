<div class="main-body admin-bg">
    <div class="admin-home-body">
        <div class="slidepop" id="admin_settings">

            <div class="slidepop-body">
                <div class="slidepop-head">
                    SETTINGS
                    <i class="slidepop-close fa fa-chevron-up"></i>
                </div>
                <div class="slidepop-content">
                    <h5><b>ADMIN NAME</b></h5>
                    <div class="barform">
                        <div class="barform-input">
                            <input type="text" id="input_admin_name"/>
                        </div>
                        <div class="barform-text">
                            <button id="btn_update_name" class="cbutton cbutton-success"><i class="fa fa-refresh"></i>Update</button>
                            <text id="text_name_error" class="text-error">Error</text>
                            <text id="text_name_success" class="text-success">Success</text>
                        </div>
                    </div>
                    <br />
                    <h5><b>CHANGE PASSWORD</b></h5>
                    <div class="barform">
                        <div class="barform-input">
                            <input type="password" placeholder="Current Password" />
                        </div>
                    </div>
                    <div class="barform">
                        <div class="barform-input">
                            <input type="password" placeholder="New Password" />
                        </div>
                    </div>
                    <div class="barform">
                        <div class="barform-input">
                            <input type="password" placeholder="Confirm New Password" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="admin-nav">
            <div class="adnav-logo">
                <img src="<?php echo base_url();?>static/img/cyberlab.png" />
            </div>
            <div class="adnav-search">
                <input type="text" placeholder="Search Student"/>
                <span class="fa fa-search" aria-hidden="true"></span>
            </div>
            
            <div class="adnav-user">
                <div class="user-name">
                    <span class="fa fa-user-circle"></span>
                    <span class="text-user-name" id="label_admin_name"></span>
                    
                </div>
                <div class="user-links">
                    <a class="" data-target="#admin_settings" id="btn_admin_settings">Settings</a>
                    <a href="<?php echo base_url();?>admin/logout">Log Out</a>  
                </div>
            </div>
            <div class="adnav-add">
                <span class="fa fa-plus-circle"></span>
                <span class="text-add-students">Add Students </span>
            </div>
        </div>
        
        dsdsdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
        
    </div>
</div>


