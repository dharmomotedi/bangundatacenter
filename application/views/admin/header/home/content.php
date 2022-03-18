<div class="container-fluid">

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Header Home</h1>
				<?php
					if(isset($data['header_detail']))
					{
				?>
				<a href="<?php echo base_url();?>Admin/Header_home" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Create New</a>
				<?php
					}
				?>
		</div>
		<div class="row">
				<div class="col-lg-12">
						<!-- Circle Buttons -->
						<div class="card shadow mb-4">
								<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-success">Form Header</h6>
								</div>
								<div class="card-body">
									<?php
										if(isset($data['header_detail']))
										{
											foreach ($data['header_detail'] as $key_detail => $item_detail){
												$header_id = $item_detail['header_id'];
												$header_image = $item_detail['header_image'];
												$header_title = $item_detail['header_title'];
												$header_subtitle = $item_detail['header_subtitle'];
												$header_link = $item_detail['header_link'];
												$header_status = $item_detail['status'];
											}
											$link_form = "Update_home_header";
										}else{
											$link_form = "Submit_home_header";
										}
									?>
										<div class="row">
											<div class="col-md-5">
												<?php
														if(isset($header_image)){
												?>
												<center>
														<img class="mt-30" id="blah" name="thumbnail" src="<?php echo $header_image; ?>" alt="your image" style="width:100%;height:auto;" />
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
											<div class="col-md-7">

													<form action="<?php echo base_url(); ?>Admin/<?php echo  $link_form; ?>" method="post" enctype="multipart/form-data">
														<?php
																if(isset($header_id)){
														?>
														<div class="col-md-12 mb-2">
																<input type="hidden" class="form-control" name="header_id" value="<?php echo $header_id; ?>" placeholder="Title id" required>
														</div>
														<?php
															}
														?>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Header (Max W:1920 x H:1080 px) <span style="color:red">*</span></label>
																<div class="custom-file">
															    <input type="file" name="header_image" class="custom-file-input" id="imgInp">
															    <label class="custom-file-label" for="customFile">Choose file</label>
															  </div>
														</div>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Title<span style="color:red">*</span></label>
																<input type="text" class="form-control" name="header_title" value="<?php if(isset($header_title)){ echo $header_title; }?>" placeholder="Title Header" required>
														</div>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Sub title<span style="color:red">*</span></label>
																 <textarea class="form-control" name="header_subtitle" id="exampleFormControlTextarea1" rows="3"><?php if(isset($header_subtitle)){ echo $header_subtitle; }?></textarea>
														</div>

														<div class="col-md-12 mb-2">
																<label class="col-form-label">Link <span style="color:#46009b;font-size:11px;">(Optional)</span></label><br/>
																<input type="text" class="form-control" name="header_link" value="<?php if(isset($header_link)){ echo $header_link; }?>" placeholder="Ex:https://bangundatacenter.com">
														</div>

														<div class="col-md-12 mb-5 text-center">
															<?php
																if(isset($header_status) && $header_status == 0){
																		$checked = "checked";
																}else if (!isset($header_status) || $header_status == 1){
																	$checked = "";
																}
															?>
															<input name="draf" class="form-check-input" type="checkbox" id="gridCheck1" <?php echo $checked; ?>>
											        <label class="form-check-label" for="gridCheck1">
											          Save Draf
											        </label>
														</div>

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
						<h6 class="m-0 font-weight-bold text-success">Header Home</h6>
						<p>Untuk yang akan di tampilkan di header home hanya untuk 1 list paling terakhir dengan status aktif</p>
				</div>
				<div class="card-body">
						<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
											<tr>
													<th>No</th>
													<th>Image</th>
													<th>Title</th>
													<th>Post Date</th>
													<th>Status</th>
													<th>Action</th>
											</tr>
									</thead>
									<tbody>
										<?php
											 $no = 1;
											 foreach ($data['header_list'] as $key_list => $item_list) {
										 ?>
												<tr>
														<td><?php echo $no; ?></td>
														<td>
																<img src="<?php echo $item_list['header_image']; ?>" style="width:60px;"/>
														</td>
														<td><?php echo $item_list['header_title']; ?></td>
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
															<a href="<?php echo base_url()?>Admin/Header_home/<?php echo $item_list['header_id']; ?>" class="btn btn-primary btn-circle">
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
															<a href="<?php echo base_url();?>Admin/Update_home_status/<?php echo $item_list['header_id']; ?>/<?php echo $item_list['status']; ?>" class="btn <?php echo $button_style; ?> btn-circle">
																	<i class="<?php echo $button_icon; ?>"></i>
															</a>
															<a href="#" data-toggle="modal" data-target="#DeleteModal-<?php echo $item_list['header_id']; ?>" class="btn btn-danger btn-circle">
																	<i class="fas fa-trash"></i>
															</a>

															<!-- Logout Modal-->
													    <div class="modal fade" id="DeleteModal-<?php echo $item_list['header_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
													                    <a class="btn btn-danger" href="<?php echo base_url()?>Admin/Delete_home_header/<?php echo $item_list['header_id']; ?>/<?php echo $item_list['status']; ?>">Yes</a>
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
