<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#add_product">
		<i class="fas fa-plus fa-sm"></i>
		Add Product
	</button>
	<br>

	<table class="table table-bordered">
		<tr>
			<th>
				No.
			</th>
			<th>
				Product Name
			</th>
			<th>
				Description
			</th>
			<th>
				Category
			</th>
			<th>
				Price
			</th>
			<th colspan=3>
				Action
			</th>
		</tr>

		<?php
		$no = 1;
		foreach ($product as $prd) : ?>
			<tr>
				<td>
					<?= $no++ ?>
				</td>
				<td>
					<?= $prd->name ?>
				</td>
				<td>
					<?= $prd->description ?>
				</td>
				<td>
					<?= $prd->category ?>
				</td>
				<td>
					<?= $prd->price ?>
				</td>
				<td>
					<?= anchor('welcome/details/' . $prd->product_id, '<div class="btn btn-sm btn-success"><i class="fas fa-search-plus"></i></div>'); ?>
				</td>
				<td>
					<?php
					echo anchor(
						'admin/product_list/edit/' . $prd->product_id,
						'<div class="btn btn-primary btn-sm">
								 <i class="fa fa-edit"></i> 
							</div>'
					)
					?>
				</td>
				<td>
					<?php
					echo anchor(
						'/admin/product_list/delete/' . $prd->product_id,
						'<div class="btn btn-danger btn-sm">
							<i class="fa fa-trash"></i>
						</div>'
					);
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Product Input Form</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url() . 'admin/Product_list/add' ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>
							Product Name
						</label>
						<input type="text" name="name" class="form-control">
						<label>
							Description
						</label>
						<input type="text" name="description" class="form-control">
						<label>
							Category
						</label>
						<select class="form-control" name="category">
							<option>Programming</option>
							<option>Bahasa</option>
							<option>Bisnis</option>
							<option>Desain</option>
							<option>Lainnya</option>
						</select>
						<label>
							Price
						</label>
						<input type="text" name="price" class="form-control">
						<label>
							Product Image
						</label>
						<input type="file" name="image" class="form-control">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary ">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>