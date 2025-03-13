<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Slider
        <div class="card-body">
            <a href="<?php echo base_url('slider/list')?>" class="btn btn-success">List Slider</a>
            <a href="<?php echo base_url('slider/create')?>" class="btn btn-success">Create Slider</a>
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
            <form action="<?php echo base_url('slider/update/'.$slider->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" value="<?php echo $slider->title ?>" class="form-control" 
                        aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">'.form_error('title').'</span>' ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" name="description" value="<?php echo $slider->description ?>" class="form-control" id="exampleInputPassword1">
                    <?php echo '<span class="text text-danger">'.form_error('description').'</span>' ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleInputPassword1">
                    <img src="<?php echo base_url('uploads/slider/'.$slider->image) ?>" width="150px" height="150px">
                    <small><?php if(isset($error)){echo $error;} ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                    <?php
                        if($slider->status == 1){
                            ?>
                            <option value="1" selected>Active</option>';
                            <option value="0">Inactive</option>';
                            <?php
                        }else{
                            ?>
                            <option value="1">Active</option>
                            <option value="0" selected>Inactive</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>