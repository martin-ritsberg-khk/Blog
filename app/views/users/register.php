<?php require_once APPROOT.'/views/inc/header.php'?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <!-- form card register -->
        <div class="card card-outline-secondary mt-5">
            <div class="card-header">
                <h3 class="mb-0">Sign Up</h3>
                <p class="mt-2">Please fill the fields below to register</p>
            </div>
            <div class="card-body">
                <form class="form" role="form" method="post" action="<?php echo URLROOT."/users/register"; ?>">
                    <div class="form-group">
                        <label for="name">Name<sup>*</sup></label>
                        <input type="text" class="form-control <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" id="name" placeholder="Full name" name="name">
                        <?php echo (!empty($data['name_error'])) ? '<span class="invalid-feedback">'.$data['name_error'].'</span>' : ''; ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email<sup>*</sup></label>
                        <input type="email" class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email" name="email">
                        <?php echo (!empty($data['name_error'])) ? '<span class="invalid-feedback">'.$data['email_error'].'</span>' : ''; ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password<sup>*</sup></label>
                        <input type="password" class="form-control <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password">
                        <?php echo (!empty($data['name_error'])) ? '<span class="invalid-feedback">'.$data['password_error'].'</span>' : ''; ?>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Verify password<sup>*</sup></label>
                        <input type="password" class="form-control <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                        <?php echo (!empty($data['name_error'])) ? '<span class="invalid-feedback">'.$data['confirm_password_error'].'</span>' : ''; ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg float-right">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form card register -->

    </div>
</div>
<?php require_once APPROOT.'/views/inc/footer.php'?>