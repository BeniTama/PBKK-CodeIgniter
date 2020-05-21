<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT PRODUCT DATA</h3>

    <?php foreach ($product as $prd) : ?>

        <form method="post" action="<?= base_url() . 'admin/Product_list/update' ?>">

            <div class="for-group">
                <label>Product ID</label>
                <input type="hidden" name="product_id" class="form-control" value="<?php echo $prd->product_id ?>">
            </div>
            <div class="for-group">
                <label>Nama Barang</label>
                <input type="text" name="name" class="form-control" value="<?php echo $prd->name ?>">
            </div>
            <div class="for-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" value="<?php echo $prd->description ?>">
            </div>
            <div class="for-group">
                <label>Category</label>
                <input type="text" name="category" class="form-control" value="<?php echo $prd->category ?>">
            </div>
            <div class="for-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $prd->price ?>">
            </div>
            <div class="for-group">
                <label>Long Description</label>
                <textarea name="long_desc" class="form-control"><?php echo $prd->long_desc ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>
        </form>

    <?php endforeach; ?>
</div>