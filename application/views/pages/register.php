<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="<?php echo base_url('dang-ky') ?>" method="POST">
                        <input type="text" name="name" placeholder="Name"/>
                        <?php echo '<span class="text text-danger">'.form_error('name').'</span>' ?>
                        <input type="text" name="phone" placeholder="Phone"/>
                        <?php echo '<span class="text text-danger">'.form_error('phone').'</span>' ?>
                        <input type="text" name="address" placeholder="Address"/>
                        <?php echo '<span class="text text-danger">'.form_error('address').'</span>' ?>
                        <input type="email" name="email" placeholder="Email Address"/>
                        <?php echo '<span class="text text-danger">'.form_error('email').'</span>' ?>
                        <input type="password" name="password" placeholder="Password"/>
                        <?php echo '<span class="text text-danger">'.form_error('password').'</span>' ?>
                        
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->