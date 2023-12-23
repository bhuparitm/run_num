<?php
ob_start();
session_start();
if(isset($_SESSION['userType'])) {
    if($_SESSION['userType']=='Admin') header('Location: admin.php');
    elseif($_SESSION['userType']=='User') header('Location: index.php');
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <script src="./js/stub.js" type="text/javascript"></script>
    <script src="./js/SfdcCore.js" type="text/javascript"></script>
    <script src="./js/picklist4.js" type="text/javascript"></script>
    <script src="./js/VFState.js" type="text/javascript"></script>
    <script>
        (function(UITheme) {
            UITheme.getUITheme = function() {
                return UserContext.uiTheme;
            };
        }(window.UITheme = window.UITheme || {}));
    </script>
    <meta HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE" />
    <meta HTTP-EQUIV="Expires" content="Mon, 01 Jan 1990 12:00:00 GMT" />

    <meta charset="utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link class="user" href="./bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link class="user" href="./css/common.css" rel="stylesheet" type="text/css" />
    <script src="./jquery/jquery-3.7.0.js"></script>
    <script src="./js/ap_custom_login.js"></script>
    <title>Sign in</title>
    <link class="user" href="./css/signin.css" rel="stylesheet" type="text/css" />
    <style>
        @font-face {
            font-family: 'THSarabun';
            src:
                url('./fonts/THSarabun.ttf') format('truetype'),
                url('./fonts/THSarabun\ Bold.ttf') format('truetype');

        }

        p,
        div,
        h3 {
            font-family: 'THSarabun';
        }

        .form-description {
            font-size: 25px;
        }
    </style>
</head>

<body>
    <div class="logo-wrapper" style="text-align: center;">
        <div class="logo-smart"><img src="./img/logo-mod-1.png" height="80px" width="100px" />
            <br />
            <span class="logo-subtext white-text">
                <h1>กองเทคโนโลยีและดิจิทัล</h1>
            </span>
        </div>

    </div>

    <div class="body-wrapper">
        <div class="container">
            <form id="frm_login" name="frm_login" method="post" action="checkLogin.php" class="form-signin" enctype="application/x-www-form-urlencoded">

                <script>
                    $(document).ready(function() {
                        ap_custom_login.Login.onDocumentReady(false);
                    });
                </script>

                <h1><b>เข้าสู่ระบบ</b></h1>
                <p class="form-description">กรุณาใส่ username และ password</p>

                <div class="form-group">
                    <label for="user" class="form-top-label" style="font-size: 20px;">
                        Username
                    </label>
                    <input id="AP_CustomLogin:AP_CustomLogin_Template:loginForm:loginemail" type="text" name="username" class="form-control" required="required" maxlength="80" placeholder="Username" style="font-size: 20px;" />
                </div>

                <div class="form-group">
                    <label for="pwd" class="form-top-label" style="font-size: 20px;">
                        Password
                    </label>
                    <input id="AP_CustomLogin:AP_CustomLogin_Template:loginForm:loginpassword" type="password" name="pwd" value="" maxlength="1600" class="form-control" style="font-size: 20px;" placeholder="Password" />
                </div>

                <div style="text-align: center;">
                    <input id="AP_CustomLogin:AP_CustomLogin_Template:loginForm:loginsubmit" type="submit" name="AP_CustomLogin:AP_CustomLogin_Template:loginForm:loginsubmit" value="เข้าระบบ" class="btn btn-lg btn-primary btn-default btn-block form-signin-submit" />
                </div>

            </form>
        </div>
    </div>

    <div class="logo-footer">
        <p><span class="white-text">©2566 สำนักนโยบายและแผนกลาโหม | <a id="footer-tos-link" href="#" target="_blank">กองเทคโนโลยีและดิจิทัล</a></span>
        </p>
    </div>
</body>
</html>