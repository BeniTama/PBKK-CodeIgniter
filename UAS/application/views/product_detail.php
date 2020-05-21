<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Product Details
        </div>
        <div class="card-body">

            <?php foreach ($product as $prd) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= base_url() . '/uploads/' . $prd->image ?>" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Product Name</td>
                                <td><strong><?= $prd->name ?></strong></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><strong>
                                        <div class="btn btn-sm btn-success">Rp. <?= number_format($prd->price, 0, ',', '.') ?></div>
                                    </strong></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td><strong><?= $prd->category ?></strong></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><strong><?= $prd->description ?></strong></td>
                            </tr>
                            <tr>
                                <td>Complete Description</td>
                                <td><strong><?= $prd->long_desc ?></strong></td>
                            </tr>
                        </table>

                        <?= anchor('dashboard/add_to_cart/' . $prd->product_id, '<div class="btn btn-sm btn-primary">Add to Cart</div>'); ?>
                        <?= anchor('welcome/index/', '<div class="btn btn-sm btn-danger">Back</div>'); ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>