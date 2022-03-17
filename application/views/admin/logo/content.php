<div class="container-fluid">

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Partners & Customers</h1>
				<?php
				if($data['logo_type'] == "partner"){
					$link_detail = "Partners_management";
				}else{
					$link_detail = "Customers_management";
				}

					if(isset($data['logo_detail']))
					{
						if($data['logo_type'] == "partner"){
							$link_create = "Partners_management";
						}else if($data['logo_type'] == "customer"){
							$link_create = "Customers_management";
						}
				?>
					<a href="<?php echo base_url();?>Admin/<?php echo $link_create; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Create New</a>
				<?php
						}
				?>
		</div>
		<div class="row">
				<div class="col-lg-12">
						<!-- Circle Buttons -->
						<div class="card shadow mb-4">
								<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-success" style="text-transform: capitalize;"><?php echo $data['logo_type']; ?> Form Logo</h6>
								</div>
								<div class="card-body">
									<?php
										if(isset($data['logo_detail']))
										{
											foreach ($data['logo_detail'] as $key_detail => $item_detail){
												$logo_id = $item_detail['logo_id'];
												$logo_image = $item_detail['logo_image'];
												$logo_image_dark = $item_detail['logo_image_dark'];
												$logo_name = $item_detail['logo_name'];
												$logo_link = $item_detail['logo_link'];
												$logo_type = $item_detail['logo_type'];
												$logo_status = $item_detail['status'];
											}
											$link_form = "Update_logo";
										}else{
											$link_form = "Submit_logo";
										}
									?>
										<div class="row">
											<div class="col-md-5">
												<?php
														if(isset($logo_image)){
												?>
												<center style="background-color:#1cc88a;">
														<img class="mt-30" id="blah" name="thumbnail" src="<?php echo $logo_image; ?>" alt="your image" style="width:50%;height:auto;padding:10px;" />
												</center>
												<center style="background-color:#1cc88a;">
														<img class="mt-30" id="blah2" name="thumbnail_2" src="<?php echo $logo_image_dark; ?>" alt="your image" style="width:50%;height:auto;padding:10px;" />
												</center>
												<?php
														}else{
												?>
												<center>
														<img class="mt-30" id="blah" name="thumbnail" src="<?php echo $this->config->item('admin_source'); ?>img/choose-image.jpg" alt="your image" style="width:50%;height:auto;padding:10px;" />
												</center>
												<center>
														<img class="mt-30" id="blah2" name="thumbnail_2" src="<?php echo $this->config->item('admin_source'); ?>img/choose-image.jpg" alt="your image" style="width:50%;height:auto;padding:10px;" />
												</center>
												<?php
														}
												?>
											</div>
											<div class="col-md-7">

													<form action="<?php echo base_url(); ?>Admin/<?php echo  $link_form; ?>" method="post" enctype="multipart/form-data">
														<?php
																if(isset($logo_id)){
														?>
														<div class="col-md-12 mb-2">
																<input type="hidden" class="form-control" name="logo_id" value="<?php echo $logo_id; ?>" placeholder="Title id" required>
														</div>
														<div class="col-md-12 mb-2">
																<input type="hidden" class="form-control" name="logo_type" value="<?php echo $logo_type; ?>" placeholder="Title id" required>
														</div>
														<?php
															}
														?>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Logo (Max W:500 x H:300 px) <span style="color:red">*</span></label>
																<div class="custom-file">
															    <input type="file" name="logo_image" class="custom-file-input" id="imgInp">
															    <label class="custom-file-label" for="customFile">Choose file</label>
															  </div>
														</div>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Logo Dark(Max W:500 x H:300 px) <span style="color:red">*</span></label>
																<div class="custom-file">
															    <input type="file" name="logo_image_dark" class="custom-file-input" id="imgInp2">
															    <label class="custom-file-label" for="customFile">Choose file</label>
															  </div>
														</div>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Name<span style="color:red">*</span></label>
																<input type="text" class="form-control" name="logo_name" value="<?php if(isset($logo_name)){ echo $logo_name; }?>" placeholder="Logo name" required>
														</div>


														<div class="col-md-12 mb-2">
																<label class="col-form-label">Link <span style="color:#46009b;font-size:11px;">(Optional)</span></label><br/>
																<input type="text" class="form-control" name="logo_link" value="<?php if(isset($logo_link)){ echo $logo_link; }?>" placeholder="Ex:https://bangundatacenter.com">
														</div>

														<div class="col-md-12 mb-5 text-center">
															<?php
																if(isset($logo_status) && $logo_status == 0){
																		$checked = "checked";
																}else if (!isset($logo_status) || $logo_status == 1){
																	$checked = "";
																}
															?>
															<input name="draf" class="form-check-input" type="checkbox" id="gridCheck1" <?php echo $checked; ?>>
											        <label class="form-check-label" for="gridCheck1">
											          Save Draf
											        </label>
														</div>
														<input type="hidden" class="form-control" name="logo_type" value="<?php echo $data['logo_type']; ?>" placeholder="Title id" required>
														<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
														<div class="col-md-12 mb-2">
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
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
				<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-success" style="text-transform: capitalize;"><?php echo $data['logo_type']; ?>s Logo List</h6>
				</div>
				<div class="card-body">
						<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
											<tr>
													<th>No</th>
													<th>Image</th>
													<th>Name</th>
													<th>Post Date</th>
													<th>Status</th>
													<th>Action</th>
											</tr>
									</thead>
									<tbody>
										<?php
											 $no = 1;
											 foreach ($data['List_logo'] as $key_list => $item_list) {
										 ?>
												<tr>
														<td><?php echo $no; ?></td>
														<td style="background-color:#1cc88a;">
																<img src="<?php echo $item_list['logo_image']; ?>" style="width:60px;"/>
																<img src="<?php echo $item_list['logo_image_dark']; ?>" style="width:60px;"/>
														</td>
														<td><?php echo $item_list['logo_name']; ?></td>
														<td><?php echo $item_list['post_date']; ?></td>
														<td>
																<?php
																 	if($item_list['status'] == 1)
																	{
																		echo "active";
																	}else{
																			echo "non active";
																	}
																?>
														</td>
														<td>
															<a href="<?php echo base_url()?>Admin/<?php echo 	$link_detail; ?>/<?php echo $item_list['logo_id']; ?>" class="btn btn-primary btn-circle">
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
															<a href="<?php echo base_url();?>Admin/Update_logo_status/<?php echo $item_list['logo_id']; ?>/<?php echo $item_list['status']; ?>/<?php echo $item_list['logo_type']; ?>" class="btn <?php echo $button_style; ?> btn-circle">
																	<i class="<?php echo $button_icon; ?>"></i>
															</a>
															<a href="#" data-toggle="modal" data-target="#DeleteModal-<?php echo $item_list['logo_id']; ?>" class="btn btn-danger btn-circle">
																	<i class="fas fa-trash"></i>
															</a>

															<!-- Logout Modal-->
													    <div class="modal fade" id="DeleteModal-<?php echo $item_list['logo_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
													                    <a class="btn btn-danger" href="<?php echo base_url()?>Admin/Delete_logo/<?php echo $item_list['logo_id']; ?>/<?php echo $item_list['logo_type']; ?>">Yes</a>
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
