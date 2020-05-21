<div class="container-fluid">
    <h4>
        Order Details
        <div class="btn btn-sm btn-success">
            No. Invoice:
            <?= $invoice->id ?>
        </div>
    </h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>No.</th>
            <th>Product Name</th>
            <!--<th>Quantity</th>-->
            <th>Price</th>
            <th>Sub Total</th>
        </tr>

        <?php
        $total = 0;
        foreach ($order as $ord) :
            $subtotal = $ord->price;
            $total += $subtotal;
        ?>
            <tr>
                <td><?= $ord->id_product ?></td>
                <td><?= $ord->name_product ?></td>
                <!--<td><?= $ord->quantity ?></td>-->
                <td><?= number_format($ord->price, 0, ',', '.') ?></td>
                <td><?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>

        <?php endforeach; ?>

        <tr>
            <td colspan="3" align="right">Grand Total</td>
            <td align="left">Rp. <?= number_format($total, 0, ',', '.') ?></td>
        </tr>
    </table>

    <a href="<?= base_url('admin/invoice/index') ?>">
        <div class="btn btn-sm btn-primary">Back</div>
    </a>
</div>