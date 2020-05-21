<div class="container-fluid">

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/img/carousel1.png') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/carousel2.png') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/carousel3.png') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    <div class="row text-center mt-4">
        <?php foreach ($lainnya as $prd) : ?>
            <div class="card ml-3 mb-3" style="width: 16rem;">
                <img src="<?= base_url() . '/uploads/' . $prd->image ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?= $prd->name ?></h5>
                    <small><?= $prd->description ?></small><br>
                    <span class="badge badge-pill badge-success mb-3">Rp. <?= number_format($prd->price, 0, ',', '.') ?></span><br>
                    <?= anchor('dashboard/add_to_cart/' . $prd->product_id, '<div class="btn btn-sm btn-primary">Add to Cart</div>'); ?>
                    <?= anchor('dashboard/details/' . $prd->product_id, '<div class="btn btn-sm btn-success">Details</div>'); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>