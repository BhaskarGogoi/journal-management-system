<?php
    if(isset($_SESSION['admin_id'])){
        echo"
            <div class='admin_login_top_bar'>
                Hi $_SESSION[firstname] | 
                <a href='//$http_host/admin/dashboard'>
                    Dashboard
                </a> | 
                <a href='//$http_host/admin/includes/logout.inc'>
                    Logout
                </a>
            </div>
        ";
    } 
?>