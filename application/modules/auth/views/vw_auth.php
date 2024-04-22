<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="<?= ASSETS_URL_BACKEND ?>assets/css/bootstrap.css">

    <link rel="shortcut icon" href="<?= ASSETS_URL ?>images/logo_blue.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS_URL_BACKEND ?>assets/css/app.css">

    <!-- Jquery -->
    <script src="<?= ASSETS_URL ?>jquery/jquery-3.7.1.js"></script>

    <!-- TOAST -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Alert -->
    <link rel="stylesheet" href="<?= ASSETS_URL ?>alerts/style.css">


    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="<?= ASSETS_URL ?>images/logo_blue.png" height="48" class='mb-4'>
                                <h3>Sign In</h3>
                            </div>
                            <form method="POST" id="form_login" enctype="multipart/form-data">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="username" name="username">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                        <a href="auth-forgot-password.html" class='float-end'>
                                            <small>Forgot password?</small>
                                        </a>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class='form-check clearfix my-4'>
                                    <div class="checkbox float-start">
                                        <input type="checkbox" id="checkbox1" class='form-check-input'>
                                        <label for="checkbox1">Remember me</label>
                                    </div>
                                    <div class="float-end">
                                        <a href="auth-register.html">Don't have an account?</a>
                                    </div>
                                </div>
                                <div class="clearfix btn-login">
                                    <button class="btn btn-primary float-end btn-login" type="submit" id="loginButton">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Toast -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Alerts -->
    <script src="<?= ASSETS_URL ?>alerts/cute-alert.js"></script>

    <script src="<?= ASSETS_URL_BACKEND ?>assets/js/feather-icons/feather.min.js"></script>
    <script src="<?= ASSETS_URL_BACKEND ?>assets/js/app.js"></script>
    <script src="<?= ASSETS_URL_BACKEND ?>assets/js/main.js"></script>

    <script>
        $('#form_login').on('submit', function(e) {
            e.preventDefault();
            $('#loginButton').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            $('#loginButton').attr('disabled', true);
            let formData = new FormData($('#form_login')[0])
            $.ajax({
                url: '<?= base_url() ?>Auth/login',
                method: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                data: formData,
                success: function(results) {
                    if (results.code != 200) {
                        errors(results)
                        $('.btn-login').html('<button class="btn float-end btn-primary" type="submit" id="loginButton">Login</button>');
                        $('#loginButton').attr('disabled', false);
                    } else {
                        success(results)
                    }


                }


            })
        })

        function success(results) {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "200",
                "hideDuration": "600",
                "timeOut": "5000",
                "extendedTimeOut": "600",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                onHidden: function() {
                    window.location.href = `<?= base_url() ?>dashboard`
                }
            }
            toastr.success(`${results.message}`)

        }

        function errors(results) {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "200",
                "hideDuration": "600",
                "timeOut": "5000",
                "extendedTimeOut": "600",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error(`${results.message}`)
        }
    </script>
</body>

</html>