<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Inquiry</h1>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-success">Inquiry List</h6>
					</div>
					<div class="card-body">
							<div class="row justify-content-center">
								<div class="col-lg-12">
								<p id="csrf-hash" style="display:none;"><?php echo $this->security->get_csrf_hash(); ?></p>
								<div class="table-responsive">
										<table class="table table-bordered" id="table" width="100%" cellspacing="0">
											<thead>
													<tr>
														<th>No</th>
														<th>Name</th>
														<th>Company</th>
														<th>Phone</th>
														<th>Industry</th>
														<th>Needs</th>
														<th>Post date</th>
														<th>Read Status</th>
														<th>Action</th>
													</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
								</div>
							</div>
							</div>
					</div>
				</div>
		</div>
	</div>
</div>
