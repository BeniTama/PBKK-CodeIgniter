<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php
                $grand_total = 0;
                if ($cart = $this->cart->contents()) {
                    foreach ($cart as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "Total Checkout: Rp. " . number_format($grand_total, 0, ',', '.');

                ?>
            </div>
            <br><br>
            <h3>Input Shipping and Payment Options</h3>
            <form method="post" action="<?= base_url() ?>dashboard/checkout">
                <div class="form-group">
                    <label>Full Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Insert Full Name">
                </div>
                <div class="form-group">
                    <label>Full Address</label>
                    <input class="form-control" type="text" name="address" placeholder="Your Full Address">
                </div>
                <div class="form-group">
                    <label>Telephone Number</label>
                    <input class="form-control" type="text" name="telephone" placeholder="Your Phone Number">
                </div>
                <div class="form-group">
                    <label>Payment Options</label>
                    <select class="form-control" type="text" name="preference">
                        <option>BCA</option>
                        <option>BNI</option>
                        <option>BRI</option>
                        <option>Mandiri</option>
                        <option>Lainnya</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mb-3">Order Now!</button>
            </form>
        <?php
                } else {
                    echo "Your cart is empty!";
                }
        ?>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>