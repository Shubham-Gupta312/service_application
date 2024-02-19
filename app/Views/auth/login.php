<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Sashi Silver & Gold Jewellery</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
            style="background:url(../assets/images/background/login-register.jpg) no-repeat center center; background-size: cover;">
            <div class="auth-box on-sidebar p-4 bg-white m-0">
                <div id="loginformContainer">
                    <div class="logo text-center">
                        <span class="db"><img src="../assets/images/logo-icon.png" alt="logo" /><br />
                            <img src="../assets/images/logo-text.png" alt="Home" /></span>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3 form-material" id="loginform">
                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="email" name="email"
                                            placeholder="Username / Email">
                                        <div class="invalid-feedback" class="text-danger" id="email_msg"></div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" id="password" name="password"
                                            placeholder="Password">
                                        <div class="invalid-feedback" class="text-danger" id="password_msg"></div>
                                    </div>
                                </div>
                                <div class="warning-message text-center">
                                    <p class="wrn_msg text-danger mt-4"></p>
                                </div>
                                <div class="form-group text-center mt-3">
                                    <div class="col-xs-12">
                                        <button
                                            class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                            type="submit" name="login" id="login">Log In</button>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="col-sm-12 justify-content-center d-flex">
                                        <p>Don't have an account? <a href="<?= base_url('admin/register') ?>"
                                                class="text-info font-weight-normal ml-1">Sign Up</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#login').click(function (e) {
                e.preventDefault();
                // console.log('clicked');
                var formdata = $('#loginform').serialize();
                // console.log(formdata);
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('admin/login') ?>",
                    data: formdata,
                    success: function (response) {
                        // console.log(response);
                        if (response.status == '200') {
                            window.location.href = "<?= base_url() ?>";
                        } else {
                            var error = response.errors;
                            // console.log(response.message);
                            for (const key in error) {
                                document.getElementById(key).classList.add('is-invalid');
                                document.getElementById(key + '_msg').innerHTML = error[key];
                            }
                            var message = response.message;
                            $('.wrn_msg').text(message);
                            $('.warning-message').show();
                        }
                    }
                });
            });
        });
    </script>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function () {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>

</html>