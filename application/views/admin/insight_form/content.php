<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Insight</h1>
			<?php
				if(isset($data['insight_detail']))
				{
			?>
			<a href="<?php echo base_url();?>Admin/Insight" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Create New</a>
			<?php
				}
			?>
	</div>
	<div class="row">
			<div class="col-lg-12">
					<!-- Circle Buttons -->
						<div class="card shadow mb-4">
							<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-success">Insight Form</h6>
							</div>
							<div class="card-body">
									<div class="row justify-content-center">
												<?php
													if(isset($data['insight_detail']))
													{
														foreach ($data['insight_detail'] as $key_detail => $item_detail){
															$insight_id = $item_detail['insight_id'];
															$insight_title = $item_detail['insight_title'];
															$insight_content = $item_detail['insight_content'];
															$insight_category = $item_detail['insight_category'];
															$insight_image = $item_detail['insight_image'];
															$status = $item_detail['status'];
														}
														$link_form = "Update_insight";
													}else{
														$link_form = "Submit_insight";
													}
												?>
												<div class="col-md-4">
													<?php
														if(isset($insight_image)){
													?>
													<center>
															<img class="mt-30" id="blah" name="thumbnail" src="<?php echo $insight_image; ?>" alt="your image" style="width:100%;height:auto;" />
													</center>
													<?php
														}else{
													?>
													<center>
														<img class="mt-30" id="blah" name="thumbnail" src="<?php echo $this->config->item('admin_source'); ?>img/choose-image.jpg" alt="your image" style="width:100%;height:auto;" />
													</center>
													<?php
													}
													?>
												</div>
												<div class="col-md-8">
														<form id="posts" name="posts" action="<?php echo base_url(); ?>Admin/<?php echo $link_form;?>" method="post" enctype="multipart/form-data">
															<div class="row">
															<?php
																	if(isset($insight_id)){
															?>
															<div class="col-md-12 mb-2">
																	<input type="hidden" class="form-control" name="insight_id" value="<?php echo $insight_id; ?>" placeholder="Title id" required>
															</div>
															<?php
																}
															?>
															<div class="col-md-12 mb-2">
																	<label class="col-form-label">Image (Max W:2000 x H:2000 px)</label>
																	<div class="custom-file">
																    <input type="file" name="insight_image" class="custom-file-input" id="imgInp">
																    <label class="custom-file-label" for="customFile">Choose file</label>
																  </div>
															</div>
															<div class="col-md-6 mb-2">
																	<label class="col-form-label">Title<span style="color:red">*</span></label>
																	<input type="text" class="form-control" name="insight_title" value="<?php if(isset($insight_title)){ echo $insight_title; }?>" placeholder="Category title" required>
															</div>

															<div class="col-md-6 mb-2">
																	<label class="col-form-label" name="insight_content" >Category<span style="color:red">*</span></label>

																	<select class="form-select" name="insight_category" aria-label="Default select example" data-live-search="true">
																	<option value="0">select one</option>
																	<?php
																		foreach ($data['category_list'] as $key_detail => $item_detail){
																			if($insight_category == $item_detail['category_id']){
																				$selected = "selected";
																			}else{
																					$selected = "";
																			}
																	?>
																		<option value="<?php echo $item_detail['category_id']; ?>" <?php echo $selected; ?>><?php echo $item_detail['category_title']; ?></option>
																	<?php
																		}
																	?>
																</select>
															</div>

															<div class="col-md-12 mb-2">
																	<label class="col-form-label">Content<span style="color:red">*</span></label>
																	<textarea id="post_content" name="insight_content" ><?php if(isset($insight_content)){ echo $insight_content; }?></textarea>
															</div>



																	<div class="col-md-12 mb-5 text-center">
																		<?php
																			if(isset($status) && $status == 0){
																					$checked = "checked";
																			}else if (!isset($status) || $header_status == 1){
																				$checked = "";
																			}
																		?>
																		<br/>
																		<input name="draf" class="form-check-input" type="checkbox" id="gridCheck1" <?php echo $checked; ?>>
														        <label class="form-check-label" for="gridCheck1">
														          Save Draf
														        </label>
																	</div>
																	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
																	<button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Submit</button>
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
							<h6 class="m-0 font-weight-bold text-success">Category List</h6>
					</div>
					<div class="card-body">
							<div class="row justify-content-center">
								<div class="col-lg-12">
								<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
													<tr>
															<th>No</th>
															<th>Title</th>
															<th>View</th>
															<th>Post Date</th>
															<th>Status</th>
															<th>Action</th>
													</tr>
											</thead>
											<tbody>
												<?php
													 $no = 1;
													 foreach ($data['insight_list'] as $key_list => $item_list) {
												 ?>
												<tr>
														<td><?php echo $no;?></td>
														<td><?php echo $item_list['insight_title']; ?></td>
														<td><?php echo $item_list['insight_view']; ?></td>
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
															<a href="<?php echo base_url()?>Admin/Insight/<?php echo $item_list['insight_id']; ?>" class="btn btn-primary btn-circle">
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
															<a href="<?php echo base_url();?>Admin/Update_insight_status/<?php echo $item_list['insight_id']; ?>/<?php echo $item_list['status']; ?>" class="btn <?php echo $button_style; ?> btn-circle">
																	<i class="<?php echo $button_icon; ?>"></i>
															</a>
															<a href="#" data-toggle="modal" data-target="#DeleteModal-<?php echo $item_list['insight_id']; ?>" class="btn btn-danger btn-circle">
																	<i class="fas fa-trash"></i>
															</a>
															<!-- Logout Modal-->
															<div class="modal fade" id="DeleteModal-<?php echo $item_list['insight_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
																							<a class="btn btn-danger" href="<?php echo base_url()?>Admin/Delete_insight/<?php echo $item_list['insight_id']; ?>/<?php echo $item_list['status']; ?>">Yes</a>
																					</div>
																			</div>
																	</div>
															</div>
														</td>
												</tr>
												<?php
														}
												?>
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
