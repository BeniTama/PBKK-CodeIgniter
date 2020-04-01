<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaction Detail <?= $invoice->id ?></h1>
        </div>

        <div class="section-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </thead>

                <?php
                $total = 0;
                foreach ($order as $ord) :
                    $subtotal = $ord->quantity * $ord->price;
                    $total += $subtotal;
                ?>
                    <tbody>
                        <td><?= $ord->product_id ?></td>
                        <td><?= $ord->product_name ?></td>
                        <td><?= $ord->quantity ?></td>
                        <td><?= number_format($ord->price, 0, ',', '.') ?></td>
                        <td><?= number_format($subtotal, 0, ',', '.') ?></td>
                    </tbody>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" align="right"><b>Grand Total</b></td>
                    <td>Rp. <?= number_format($total, 0, ',', '.') ?></td>
                </tr>
            </table>

            <a href="<?= base_url('admin/transaction/index') ?>">
                <div class="btn btn-primary">Back to List</div>
            </a>
        </div>
    </section>
</div>