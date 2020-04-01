<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Invoice</h1>
        </div>

        <div class="section-body">
            <table class="table">
                <thead>
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </thead>
                </thead>
                <?php
                $no = 1;
                foreach ($this->cart->contents() as $items) :
                ?>
                    <tbody>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $items['name'] ?></td>
                            <td><?= $items['qty'] ?></td>
                            <td>Rp. <?= number_format($items['price'], 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($items['subtotal'], 0, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
            <?php
            $grand_total = 0;
            if ($cart = $this->cart->contents()) {
                foreach ($cart as $item) {
                    $grand_total = $grand_total + $item['subtotal'];
                }

                echo "<h4>Total Price: Rp. " . number_format($grand_total, 0, ',', '.');
            }
            ?>

            <br>
            <div align="right">
                <a href="<?= base_url('cashier/clear_cart') ?>">
                    <div class="btn btn-primary">New Transaction</div>
                </a>
            </div>
        </div>
    </section>
</div>