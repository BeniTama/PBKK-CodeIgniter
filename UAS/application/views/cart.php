<div class="container-fluid">
    <h4>Shopping Cart</h4>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sub-Total</th>
        </tr>

        <?php
        $no = 1;
        foreach ($this->cart->contents() as $items) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $items['name'] ?></td>
                <td><?= $items['qty'] ?></td>
                <td align="right">Rp. <?= number_format($items['price'], 0, ',', '.') ?></td>
                <td align="right">Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4"></td>
            <td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
        </tr>
    </table>

    <div align="right">
        <a href="<?= base_url('dashboard/clear') ?>">
            <div class="btn btn-sm btn-danger">Clear Cart</div>
        </a>
        <a href="<?= base_url('dashboard/index') ?>">
            <div class="btn btn-sm btn-primary">Continue Shopping</div>
        </a>
        <a href="<?= base_url('dashboard/payment') ?>">
            <div class="btn btn-sm btn-success">Buy Products</div>
        </a>
    </div>
</div>