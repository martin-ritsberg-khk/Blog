<?php require_once APPROOT.'/views/inc/header.php'?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <!-- form card register -->
            <div class="card card-outline-secondary mt-5">
                <div class="card-header">
                    <h3 class="mb-0">Login</h3>
                    <p class="mt-2">Please fill the fields below to login</p>
                </div>
                <div class="card-body">
                    <form class="form" role="form" method="post" action="<?php echo URLROOT."/users/login"; ?>">
                        <div class="form-group">
                            <label for="email">Email<sup>*</sup></label>
                            <input type="email" class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email" name="email" value="<?php echo (!empty($data['email'])) ? $data['email'] : ''; ?>">
                            <?php echo (!empty($data['email_error'])) ? '<span class="invalid-feedback">'.$data['email_error'].'</span>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password<sup>*</sup></label>
                            <input type="password" class="form-control <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password">
                            <?php echo (!empty($data['password_error'])) ? '<span class="invalid-feedback">'.$data['password_error'].'</span>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg float-right">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /form card register -->

        </div>
    </div>
<?php require_once APPROOT.'/views/inc/footer.php'?>