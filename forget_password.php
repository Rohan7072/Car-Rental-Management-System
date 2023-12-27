<?PHP
include('includes/header.php');
include('includes/top-navbar.php');
?>

<div class="form-gap" style="padding-top: 70px;"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <span class="anchor" id="formResetPassword"></span>
            <hr class="mb-5">

            <!-- form card reset password -->
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3 class="mb-0">Password Reset</h3>
                </div>
                <div class="card-body">
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post"
                        action="login.php">

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i
                                        class="glyphicon glyphicon-envelope color-blue"></i></span>
                                <input id="email" name="email" placeholder="email address" class="form-control"
                                    type="email" required>
                            </div>
                            <span id="helpResetPasswordEmail" class="form-text small text-muted">
                                Password reset OTP will be sent to this email address.
                            </span>
                        </div>
                        <div class="form-group">
                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password"
                                type="submit" required>
                        </div>

                        <input type="hidden" class="hide" name="token" id="token" value="" required>
                    </form>
                </div>
            </div>
            <!-- /form card reset password -->
        </div>
    </div>
</div>