<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Cashier Page</h1>
		</div>
		<div class="section-body">

			<form action="<?= base_url('cashier/add_product'); ?>" method="post" class="mb-3">
				<div class="form-group">
					<label>Product Name</label>
					<input type="text" name="product_id" class="form-control">
					<!--<select>
						<?php foreach ($product as $prd) : ?>
							<option>
								<?= $prd->product_id ?>
							</option>
						<?php endforeach; ?>
					</select>-->
				</div>
				<button type="submit" class="btn btn-primary">Add Product</button>

			</form>

			<table class="table table-bordered table-striped table-hover">
				<thead>
					<th>No</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Subtotal</th>
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
				<tr>
					<td colspan="4"></td>
					<td>Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></td>
				</tr>
			</table>

			<div align="right">
				<a href="<?= base_url('cashier/clear_cart') ?>">
					<div class="btn btn-sm btn-danger mr-2">Clear</div>
				</a>
				<a href="<?= base_url('cashier/payment') ?>">
					<div class="btn btn-sm btn-success">Payment</div>
				</a>
			</div>

		</div>
	</section>