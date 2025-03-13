<section>
    <style>
        button.btn.btn-fefault.cart{
            margin-bottom:25px;
        }
        .productinfo img {
        width: 100%;
        height: 150px;
        }
    </style>
    <div class="container">
        <div class="row">
            <?php $this->load->view('pages/template/sidebar') ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Lọc Theo</label>
                                <select class="form-control select-filter" id="select-filter">
                                    <option value="0">---Lọc theo---</option>
                                    <option value="?kytu=asc">Ký tự A-Z</option>
                                    <option value="?kytu=desc">Ký tự Z-A</option>
                                    <option value="?gia=asc">Giá tăng dần</option>
                                    <option value="?gia=desc">Giá giảm dần</option>
                                </select>   
                            </div>
                        </div>
                        <div class="col-md-7">
                            <form method="GET">
                                <p>
                                    <label for="amount">Khoảng giá:</label>
                                    <input type="text" id="amount" readonly="" style="border:0; color:#f6931f; font-weight:bold;">
                                </p>
                                <div id="slider-range"></div>
                                <input type="hidden" class="price_from" name="from">
                                <input type="hidden" class="price_to" name="to">
                                <input type="submit" value="Lọc giá" class="btn btn-primary filter-price">
                            </form>
                        </div>
                    </div>
                    <h2 class="title text-center"><?php echo $title ?></h2>
                    <form action="<?php echo base_url('add-to-cart') ?>" method="POST">
                    <?php
                    foreach ($allproductbycate_pagination as $key => $pro) {
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
                </form>            
                </div><!--features_items-->         
                <?php echo $links ?>  
            </div>
        </div>
    </div>
</section>

