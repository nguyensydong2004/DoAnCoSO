<div class="container">
    <div class="row">
       
        <div class="md-col-12 notfound">
            <!-- <img src="https://th.bing.com/th/id/OIP.yYBFzWZ0R970KK2bJhwO9AHaEi?rs=1&pid=ImgDetMain" alt="404notfound"> -->
             <h4><center>Xin liên hệ với chúng tôi qua email. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất</center></h4>
             <form action="<?php echo base_url('send-contact') ?>" method="POST">
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
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address *</label>
                    <input type="email" name="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="...">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Họ và tên *</label>
                    <input type="text" name="name" required class="form-control" id="exampleInputPassword1" placeholder="...">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại *</label>
                    <input type="text" name="phone" required class="form-control" id="exampleInputPassword1" placeholder="...">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="...">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ghi chú</label>
                    <textarea rows="5" name="note" resize="none" placeholder="Điền thông tin ghi chú"></textarea>

                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
            </form>
        </div>
    </div>
</div>