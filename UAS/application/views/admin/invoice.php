<div class="container-fluid">
    <h4>Product Order Invoice</h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Invoice ID</th>
            <th>Customer Name</th>
            <th>Delivery Address</th>
            <th>Order Date</th>
            <th>Payment Deadline</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($invoice as $inv) : ?>
            <tr>
                <td><?= $inv->id ?></td>
                <td><?= $inv->name ?></td>
                <td><?= $inv->address ?></td>
                <td><?= $inv->order_date ?></td>
                <td><?= $inv->payment_deadline ?></td>
                <td><?= anchor('admin/Invoice/detail/' . $inv->id, '<div class="btn btn-sm btn-primary">Details</div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>