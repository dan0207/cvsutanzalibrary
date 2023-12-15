<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../php_script/head.php'; ?>
    <title>Login • Tanza Campus Library</title>
</head>

<body>

    <!-- Main -->
    <div class="background container-fluid bg-background">
        <section class="loin_section container d-flex justify-content-center align-items-center vh-100 text-center">
            <div class="login_content col-12 col-sm-8 col-md-6 col-lg-4 col-xl-3 bg-surface shadow-lg p-4 rounded-4">
                <img src="../../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" class="img-fluid">
                <h3 class="fs-1" style="font-family: 'Times New Roman', Times, serif;">Student</h3>

                <div id="g_id_onload" data-client_id="171145039223-i2oabkul3cr1qflpogvbm55taag2a3kj.apps.googleusercontent.com" data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse" data-nonce="" data-auto_prompt="false">
                </div>

                <div class="container d-flex justify-content-center">
                    <div class="g_id_signin" data-type="standard" data-shape="pill" data-theme="outline" data-text="continue_with" data-size="medium" data-logo_alignment="left">
                    </div>
                </div>

                <hr class="hr_login_text" data-content="or continue with username & password">

                <form id="login_form" action="../../php_script/login_script.php" class="needs-validation m-0" method="POST" novalidate>

                    <div class="form-outline text-start mb-2">
                        <label class="form-label mb-0">Username</label>
                        <input type="text" name="username" class="form-control form-control-md" required />
                        <div class="invalid-feedback">
                            Please enter username.
                        </div>
                    </div>

                    <div class="form-outline text-start">
                        <label class="form-label mb-0">Password</label>
                        <input type="password" name="password" class="form-control form-control-md" required />
                        <div class="invalid-feedback">
                            Please enter password.
                        </div>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-start mb-2">
                        <input class="form-check-input" type="checkbox"/>
                        <label class="form-check-label ms-2"> Remember password </label>
                    </div>

                    <button id="login_form_btn" class="btn btn-primary btn-md w-100 mb-3"> Login </button>
                </form>

                <div class="d-flex align-items-center">
                    <button id="back_login_form_btn" class="btn btn-secondary text-onSecondary fs-7"  onclick="handle_BackLoginFormBtn()">Cancel</button>
                    <a class="text-black  ms-auto fs-7" type="button">Forgot password?</a>
                </div>
            </div>
        </section>
    </div>
    <!-- Main -->


    <!-- Modals -->
    <?php include '../../php_script/modals.php'; ?>
    <!-- Modals -->

    <!-- Scripts -->
    <script src="../../assets/vendor/js/login.js" type="module"></script>
    <!-- Scripts -->

</body>

</html>