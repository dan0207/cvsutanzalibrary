<?php
session_start();
include '../php_script/main_script.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../web_contents/head.php'; ?>
    <title>Login • Tanza Campus Library</title>
</head>

<body>

    <!-- Main -->
    <div class="background container-fluid bg-background">
        <section class="loin_section container d-flex justify-content-center align-items-center vh-100 text-center">
            <div class="login_content col-12 col-sm-8 col-md-6 col-lg-4 col-xl-3 bg-surface shadow-lg p-4 rounded-4">
                <img src="../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" class="img-fluid">
                <h3 class="fs-2 py-3" style="font-family: arial; font-weight: bold;">USER</h3>

                <div id="g_id_onload" data-client_id="171145039223-i2oabkul3cr1qflpogvbm55taag2a3kj.apps.googleusercontent.com" data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse" data-nonce="" data-itp_support="true">
                </div>

                <div class="container d-flex justify-content-center">
                    <div class="g_id_signin" data-type="standard" data-shape="pill" data-theme="outline" data-text="continue_with" data-size="medium" data-logo_alignment="left">
                    </div>
                    <input type="file" id="avatar_fileInput" class="d-none">
                </div>

                <hr class="hr_login_text" data-content="or continue with username & password">

                <form id="login_form" action="../php_script/login_script.php" class="needs-validation m-0" method="POST" novalidate>
                    <div class="form-outline text-start mb-2">
                        <label class="form-label mb-0">Username</label>
                        <input id="login_username" type="text" name="username" class="form-control form-control-md" required />
                        <div id="validationUsernameFeedback" class="invalid-feedback fs-7">
                            Please enter username.
                        </div>
                    </div>

                    <div class="form-outline text-start">
                        <label class="form-label mb-0">Password</label>
                        <input id="login_password" type="password" name="password" class="form-control form-control-md" required />
                        <div id="validationPasswordFeedback" class="invalid-feedback fs-7">
                            Please enter the password.
                        </div>
                    </div>

                    <div class="form-check d-flex justify-content-start mb-2">
                        <input class="form-check-input" type="checkbox" id="rememberCheckbox" />
                        <label class="form-check-label ms-2" for="rememberCheckbox"> Remember password </label>
                    </div>

                    <div id="login_feedback" class="text-danger mb-2 fs-7"></div>

                    <button id="login_form_btn" type="button" class="btn btn-primary btn-md w-100 mb-3"> Login </button>
                </form>

                <div class="d-flex align-items-center">
                    <button id="back_login_form_btn" class="btn btn-secondary text-onSecondary fs-7" onclick="handle_BackLoginFormBtn()">Cancel</button>
                    <a class="text-black  ms-auto fs-7" type="button">Forgot password?</a>
                </div>
            </div>
        </section>
    </div>
    <!-- Main -->


    <!-- Scripts -->
    <script src="../assets/vendor/js/googleAuth.js" type="text/javascript"></script>
    <script src="../assets/vendor/js/login.js" type="module"></script>
    <!-- Scripts -->


    <!-- Modals -->
    <?php include '../web_contents/modals.php'; ?>
    <!-- Modals -->
</body>

</html>