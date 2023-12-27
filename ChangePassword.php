<?PHP
include('includes/header.php');
include('includes/top-navbar.php');
?>

<div class="form-gap" style="padding-top: 70px;"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <span class="anchor" id="formChangePassword"></span>
            <hr class="mb-5">

            <!-- form card change password -->
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3 class="mb-0">Change Password</h3>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="login.php">
                        <div class="form-group">
                            <label for="inputPasswordOld">Current Password</label>
                            <input type="password" name="pass" class="form-control" id="inputPasswordOld" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordNew">New Password</label>
                            <input type="password" class="form-control" name="passNew" id="inputPasswordNew" required>
                            <span class="form-text small text-muted">
                                The password must be 8-20 characters, and must <em>not</em> contain spaces.
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordNewVerify">Verify</label>
                            <input type="password" class="form-control" name="passCheck" id="inputPasswordNewVerify"
                                required="">
                            <span class="form-text small text-muted">
                                To confirm, type the new password again.
                            </span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="ChangePassword"
                                class="btn btn-success btn-lg float-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>