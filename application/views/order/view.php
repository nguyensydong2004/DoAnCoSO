<div class="container">
    <div class="card">
        <div class="card-header">
            List Order
        </div>
        <div class="card-body">
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Code</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Image</th>

                        <th scope="col">Product Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($order_details as $key => $ord){
                        ?>
                        <tr>
                        <th scope="row"><?php echo $key ?></th>
                        <td><?php echo $ord->order_code ?></td>
                        <td><?php echo $ord->title ?></td>
                        <td><img src="<?php echo base_url('uploads/product/'.$ord->image) ?>"  width="150px" height="150px"></td>
                        <td><?php
                               echo number_format($ord->price,0,',','.')
                            ?>VND
                        </td>
                        <td><?php echo $ord->qty?></td>

                        <td>
                            <?php
                               echo number_format($ord->qty*$ord->price,0,',','.')
                            ?>VND
                        </td>
                        <td>
                            <!-- <a onclick="return confirm('Are you sure?')" href="<?php echo base_url('order/delete/'.$ord->order_code)?>" class="btn btn-danger">Delete</a>
                            <a href="<?php echo base_url('order/view/'.$ord->order_code)?>" class="btn btn-warning">View</a> -->
                        </td>
                    </tr>
                    <?php
                    }   
                    ?>
                    <tr>
                        <td>
                            <select class="xulydonhang form control">
                                <?php
                                if($ord->order_status==1){
                                    ?>
                                    <option selected id="<?php echo $ord->order_code ?>" value="0">----Xử lý đơn hàng----</option>
                                    <option id="<?php echo $ord->order_code ?>" value="2">Xử lý thành công</option>
                                    <option id="<?php echo $ord->order_code ?>" value="3">Huỷ đơn</option>
                                    <?php
                                } else if ($ord->order_status==2){
                                    ?>
                                    <option id="<?php echo $ord->order_code ?>" value="0">----Xử lý đơn hàng----</option>
                                    <option selected  id="<?php echo $ord->order_code ?>" value="2">Xử lý thành công</option>
                                    <option id="<?php echo $ord->order_code ?>" value="3">Huỷ đơn</option>
                                    <?php

                                } else {
                                    ?>
                                    <option id="<?php echo $ord->order_code ?>" value="0">----Xử lý đơn hàng----</option>
                                    <option id="<?php echo $ord->order_code ?>" value="2">Xử lý thành công</option>
                                    <option selected  id="<?php echo $ord->order_code ?>" value="3">Huỷ đơn</option>
                                    <?php
                                }
                                ?>        
                            </select>

                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>