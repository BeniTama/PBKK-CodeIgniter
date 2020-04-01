<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Product List</h1>
		</div>

		<div class="section-body">
			<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#add_product">
				<i class="fas fa-plus fa-sm"></i>
				Add Products
			</button>

			<table class="table table-striped table-bordered">
				<thead>
					<th scope="col">No.</th>
					<th scope="col">Name</th>
					<th scope="col">Price</th>
					<th scope="col">Stock</th>
					<th scope="col" colspan="2">Action</th>
				</thead>


				<?php
				$no = 1;
				foreach ($product as $prd) : ?>
					<tbody>
						<td><?= $no++ ?></td>
						<td><?= $prd->product_name ?></td>
						<td><?= $prd->price ?></td>
						<td><?= $prd->stock ?></td>
						<td>
							<?= anchor('admin/product_list/edit/' . $prd->product_id, '<div class="btn btn-success btn-sm"><i class="fas fa-edit"></i></div>'); ?>
							<?= anchor('admin/product_list/delete/' . $prd->product_id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>'); ?>
						</td>
					</tbody>
				<?php endforeach; ?>
			</table>
		</div>
	</section>
</div>

<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Product Form</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/product_list/add'); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="product_name" class="form-control">
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" name="price" class="form-control">
					</div>
					<div class="form-group">
						<label>Stock</label>
						<input type="text" name="stock" class="form-control">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Add Product</button>
			</div>
			</form>
		</div>
	</div>
</div>