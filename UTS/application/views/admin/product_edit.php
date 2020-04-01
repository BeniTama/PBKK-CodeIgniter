<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Product</h1>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Edit Product Form</h4>
						</div>
						<div class="card-body">
							<?php foreach ($product as $prd) : ?>
								<form method="post" action="<?= base_url() . 'admin/product_list/update' ?>">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="product_name" class="form-control" value="<?= $prd->product_name; ?>">
									</div>
									<div class="form-group">
										<label>Price</label>
										<input type="text" name="price" class="form-control" value="<?= $prd->price; ?>">
									</div>
									<div class="form-group">
										<label>Stock</label>
										<input type="text" name="stock" class="form-control" value="<?= $prd->stock; ?>">
									</div>
									<div class="form-group">
										<input type="hidden" name="product_id" class="form-control" value="<?= $prd->product_id; ?>">
									</div>
									<div class="card-footer text-right">
										<button class="btn btn-danger" type="reset">Reset</button>
										<button class="btn btn-primary mr-1" type="submit">Submit</button>
									</div>
								</form>
							<?php endforeach; ?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>