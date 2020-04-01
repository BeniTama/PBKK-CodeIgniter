<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaction Reports</h1>
        </div>

        <div class="section-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>ID Invoice</th>
                    <th>Date of Transaction</th>
                </thead>

                <?php foreach ($invoice as $inv) : ?>
                    <tbody>
                        <td><?= $inv->id; ?></td>
                        <td><?= $inv->order_date; ?></td>
                        <td>
                            <?= anchor('admin/transaction/detail/' . $inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?>
                        </td>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
</div>