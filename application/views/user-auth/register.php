<div class="page-header align-items-start min-vh-100"
    style="background-image: url(<?= base_url('assets/images/login-bg.jpeg') ?>);">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">User Register</h4>
                            <div class="row mt-3">
                                <div class="col-2 text-center ms-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-facebook text-white text-lg"></i>
                                    </a>
                                </div>
                                <div class="col-2 text-center px-1">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-github text-white text-lg"></i>
                                    </a>
                                </div>
                                <div class="col-2 text-center me-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-google text-white text-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <?php require APPPATH.'views/layout/alert.php'; ?>

                        <form action="<?= base_url('Register/register'); ?>" method="POST" role="form" class="text-start">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required autocomplete="off" onkeypress="return /[A-Za-z ]/i.test(event.key)" value="<?= set_value('name'); ?>" />
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required autocomplete="off" value="<?= set_value('email'); ?>" />
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Contact</label>
                                <input type="text" class="form-control" name="contact" required autocomplete="off" onkeypress="return /[0-9]/i.test(event.key)" value="<?= set_value('contact'); ?>"/>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required autocomplete="off" minlength="6" value="<?= set_value('password'); ?>" />
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" required autocomplete="off" minlength="6" value="<?= set_value('confirm_password'); ?>" />
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign in</button>
                            </div>
                            <p class="mt-4 text-sm text-center">
                                Already have an account?
                                <a href="<?= base_url(); ?>login" class="text-primary text-gradient font-weight-bold">Login</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
