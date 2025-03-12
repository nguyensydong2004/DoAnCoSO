<section>
    <style>
        button.btn.btn-fefault.cart{
            margin-bottom:25px;
        }
    </style>
    <div class="container">
        <div class="row">
            <?php $this->load->view('pages/template/sidebar') ?>
            <form action="<?php echo base_url('add-to-cart') ?>" method="POST">
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?php echo $title ?></h2>
                    <?php
                    foreach ($allproductbybra_pagination as $key => $pro) {
                    ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <input type="hidden" value="<?php echo $pro->id ?>" name="product_id">
                                        <input type="hidden" value="1" name="quantity">
                                        <img src="<?php echo base_url('uploads/product/'.$pro->image) ?>" alt="<?php echo $pro->title ?>" />
                                        <h2><?php echo number_format($pro->price,0,',','.') ?>VND</h2>
                                        <p><?php echo $pro->title ?></p>
                                        <a href="<?php echo base_url('san-pham/'.$pro->id.'/'.$pro->slug) ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
                                        <button type="submit" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    </div>                                  
                            </div>
                 
                            <div class="choose">
                                <!-- <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>   
                    <?php
                    }
                    ?>                
                </div><!--features_items-->      
                <?php echo $links ?>     
            </div>
            </form>
        </div>
    </div>
</section>

