<div class="container">
<h3>Đăng ký ADMIN</h3>
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

    
<form action="<?php echo base_url('register-insert') ?>" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">User Name</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username...">
        <?php echo '<span class="text text-danger">'.form_error('username').'</span>' ?>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <?php echo '<span class="text text-danger">'.form_error('email').'</span>' ?>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        <?php echo '<span class="text text-danger">'.form_error('password').'</span>' ?>
    </div>
    <button type="submit"  class="btn btn-primary">Đăng kí Admin</button>
    <a href="<?php echo base_url('login') ?>" class="btn btn-default">Quay về trang đăng nhập</a>
</form>
</div>