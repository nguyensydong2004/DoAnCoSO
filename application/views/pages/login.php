<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <?php
                    if($this->session->flashdata('success'))
                    {  
                        ?>
                        <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
                    <?php 
                    }else if($this->session->flashdata('error')){
                        ?>
                        <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
                        <?php
                    }
                    ?>
                    <form action="<?php echo base_url('login-customer') ?>" method="POST">
                        <input type="email" name="email" placeholder="Email" />
                        <?php echo '<span class="text text-danger">'.form_error('email').'</span>' ?>
                        <input type="password" name="password" placeholder="Password" />
                        <?php echo '<span class="text text-danger">'.form_error('password').'</span>' ?>
                        
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                    <hr>
                    <p class="text-center">Bạn chưa có tài khoản?</p>
                    <a href="<?php echo base_url('register') ?>" class="btn btn-outline-success w-100">Đăng ký tài khoản</a>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->