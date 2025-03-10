<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
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
                                    <input type="submit" name="capnhap" class="btn btn-warning" value="Update"></input>
                                </div>
                            </form> 
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?php echo number_format($subtotal,0,',','.') ?>VND</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="<?php echo base_url('delete-item/'.$items['rowid']) ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php
                    }   
                    ?>
                    <tr>                          
                        <td colspan="4">Total<p class="cart_total_price"><?php echo number_format($total,0,',','.') ?>VND</p><td>
                        <td><a href="<?php echo base_url('delete-all-cart') ?>" class="btn btn-danger">Delete all</a><td>
                    </tr>
                </tbody>
            </table>
            <?php
            }else{
                echo '<span  class="text text-danger">Please add item to cart</span>';
            }
            ?>
        </div>
    </div>
</section> <!--/#cart_items-->