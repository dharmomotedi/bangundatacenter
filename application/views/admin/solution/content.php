<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Solution</h1>
		</div>
		<div class="row">
				<div class="col-lg-4">
						<!-- Circle Buttons -->
						<div class="card shadow mb-4">
								<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-success">Form Solution Image</h6>
								</div>
								<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<form action="<?php echo base_url(); ?>Admin/Update_solution_image" method="post" enctype="multipart/form-data">
												<center>
														<?php
															 foreach ($data['solution_image'] as $key_list => $item_list) {
														?>
														<img class="mt-30" id="blah" name="thumbnail" src="<?php echo $item_list['solution_image']; ?>" alt="your image" style="width:100%;height:auto;" />
														<input type="hidden" class="form-control" name="solution_id" value="<?php echo $item_list['solution_id']; ?>" placeholder="Solution id" required>
														<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Header (Max W:1000 x H:1000 px)</label>
																<div class="custom-file">
															    <input type="file" name="solution_image" class="custom-file-input" id="imgInp">
															    <label class="custom-file-label" for="customFile">Choose file</label>
															  </div>
														</div>
														<?php
															}
														?>
												</center>
												<div class="col-md-12 mb-2">
															<button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Submit</button>
												</div>
												</form>
											</div>
										</div>
								</div>
						</div>
				</div>
				<div class="col-lg-8">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-success">Form Solution</h6>
						</div>
						<div class="card-body">
								<div class="row">
										<div class="col-md-12">
												<form action="<?php echo base_url(); ?>Admin/Submit_solution" method="post" enctype="multipart/form-data">
													<div class="row">
													<div class="col-md-12 mb-2">
														<label class="col-form-label">Title</label>
														<input type="text" class="form-control" name="solution_title" value="" placeholder="Solution title" required>
													</div>
													<div class="col-md-12 mb-2">
														<center>
															<input name="detail" class="form-check-input" type="checkbox" id="gridCheck1">
															<label class="form-check-label" for="gridCheck1">
																Detail Solution
															</label>
														</center>
													</div>
														<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
													<div class="col-md-12 mb-2">
																<button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Submit</button>
													</div>
												</div>
												</form>
										</div>
								</div>
						</div>
					</div>
				</div>
		</div>
</div>

<div class="container-fluid">
	<div class="row">
			<div class="col-lg-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-success">Solution List</h6>
					</div>
					<div class="card-body">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
									<tr>
											<th>No</th>
											<th>Title</th>
											<th>List</th>
											<th>Post Date</th>
											<th>Status</th>
											<th>Action</th>
									</tr>
							</thead>
							<tbody>
								<?php
									 $no = 1;
									 foreach ($data['solution_list'] as $key_list => $item_list) {
								 ?>
								<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $item_list['solution_title']; ?></td>
										<td><?php echo $item_list['solution_list']; ?></td>
										<td><?php echo $item_list['post_date']; ?></td>
										<td>
												<?php
													if($item_list['status'] == 1){
														echo "active";
													}else{
															echo "non active";
													}
												?>
										</td>
										<td>
											<a href="<?php echo base_url()?>Admin/Solution_detail/<?php echo $item_list['solution_id']; ?>/<?php $list_id; ?>" class="btn btn-primary btn-circle">
													<i class="fas fa-pen"></i>
											</a>
											<?php
												if($item_list['status'] == 1)
												{
													$button_style = "btn-success";
													$button_icon = "fas fa-eye";
												}else{
													$button_style = "btn-warning";
													$button_icon = "fas fa-eye-slash";
												}
											?>
											<a href="<?php echo base_url();?>Admin/Update_solution_status/<?php echo $item_list['solution_id']; ?>/<?php echo $item_list['status']; ?>" class="btn <?php echo $button_style; ?> btn-circle">
													<i class="<?php echo $button_icon; ?>"></i>
											</a>
											<a href="#" data-toggle="modal" data-target="#DeleteModal-<?php echo $item_list['solution_id']; ?>" class="btn btn-danger btn-circle">
													<i class="fas fa-trash"></i>
											</a>
											<!-- Logout Modal-->
											<div class="modal fade" id="DeleteModal-<?php echo $item_list['solution_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
													aria-hidden="true">
													<div class="modal-dialog" role="document">
															<div class="modal-content">
																	<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
																			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">×</span>
																			</button>
																	</div>
																	<div class="modal-body">are you sure you want to delete this content ?</div>
																	<div class="modal-footer">
																			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
																			<a class="btn btn-danger" href="<?php echo base_url()?>Admin/Delete_solution/<?php echo $item_list['solution_id']; ?>/<?php echo $item_list['status']; ?>">Yes</a>
																	</div>
															</div>
													</div>
											</div>
										</td>
								</tr>
								<?php
										$no++;
										}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>
