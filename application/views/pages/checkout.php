<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Checkout</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
            if($this->cart->contents()){
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="description">Image</td>
                        <td class="image">Item</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $total =0;
                $subtotal= 0;
                foreach ($this->cart->contents() as $items){ 
                    $subtotal = $items['qty']*$items['price'];
                    $total +=$subtotal
                    ?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="<?php echo base_url('uploads/product/'.$items['options']['image']) ?>" width="150" height="150" alt="<?php echo $items['name'] ?>"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""><?php echo $items['name'] ?></a></h4>
                        </td>
                        <td class="cart_price">
                            <p><?php echo number_format($items['price'],0,',','.') ?>VND</p>
                        </td>
                        <td class="cart_quantity_button">
                            <form action="<?php echo base_url('update-cart-item') ?>" method="POST">
                                <div class="cart_quantity_button">
                                    <input type="hidden" value="<?php echo $items['rowid'] ?>" name="rowid">
                                    <input class="cart_quantity_input" type="number" min="1" name="quantity" value="<?php echo $items['qty'] ?>" autocomplete="off" size="2">
                                    <input type="submit" name="capnhap" class="btn btn-warning" value="Cập nhập"></input>
                                </div>
                            </form> 
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?php echo number_format($subtotal,0,',','.') ?>VND</p>
                        </td>
                    </tr>
                    <?php
                    }   
                    ?>
                    <tr>                          
                        <td colspan="4">Total<p class="cart_total_price"><?php echo number_format($total,0,',','.') ?>VND</p><td>
                        <!-- <td><a href="<?php echo base_url('checkout') ?>" class="btn btn-primary">Đặt Hàng</a><td> -->

                    </tr>
                </tbody>
            </table>
            <?php
            }else{
                echo '<span  class="text text-danger">Please add item to cart</span>';
            }
            ?>
        </div>
        <section><!--form-->
		<div class="container">
			<div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
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
                        <div class="login-form"><!--login form-->
                            <h2>Điền thông tin thanh toán</h2>
                            <form onsubmit="return confirm('Xác nhận đặt hàng')" method="POST" action="<?php echo base_url('online-checkout')?>">
                                <lable>Name</lable>
                                <input type="text" name="name" placeholder="Name" />
                                <?php echo '<span class="text text-danger">'.form_error('name').'</span>' ?>
                                <lable>Address</lable>
                                <input type="text" name="address" placeholder="Address" />
                                <?php echo '<span class="text text-danger">'.form_error('address').'</span>' ?>
                                <lable>Phone</lable>
                                <input type="text" name="phone" placeholder="Phone" />
                                <?php echo '<span class="text text-danger">'.form_error('phone').'</span>' ?>
                                <lable>Email</lable>
                                <input type="text" name="email" placeholder="Email" />
                                <?php echo '<span class="text text-danger">'.form_error('email').'</span>' ?>
                                <lable>Hình thức thanh toán</lable>
                                <!-- <select name="shipping_method">
                                    <option value="code">COD</option>
                                    <option value="vnpay">VNPAY</option>
                                    <option></option>
                                </select> -->
                                <button type="submit" name="cod" class="btn btn-default">Thanh toán COD</button>
                                <button type="submit" name="payUrl" class="btn btn-danger">Thanh toán MOMO</button>
                                <!-- <button type="submit" class="btn btn-default">Xác nhận thanh toán</button> -->
                            </form>
                        </div><!--/login form-->
                    </div>
			</div>
		</div>
	</section><!--/form-->
    </div>
</section> <!--/#cart_items-->