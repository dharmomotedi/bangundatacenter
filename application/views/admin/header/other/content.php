<div class="container-fluid">

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Other Header</h1>
		</div>
		<div class="row">
			<?php
				 foreach ($data['header_other'] as $key_list => $item_list) {
			 ?>
				<div class="col-lg-4">
						<!-- Circle Buttons -->
						<div class="card shadow mb-4">
								<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-success">Form <?php echo $item_list['header_title']; ?></h6>
								</div>
								<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<center>
														<img class="mt-30" id="blah-<?php echo $item_list['header_id']; ?>" name="header_image" src="<?php echo $item_list['header_image']; ?>" alt="your image" style="width:100%;height:auto;" />
												</center>
											</div>
											<div class="col-md-12">
													<form action="<?php echo base_url(); ?>Admin/Update_other_header" method="post" enctype="multipart/form-data">
														<div class="col-md-12 mb-2">
																<input type="hidden" class="form-control" name="header_id" value="<?php echo $item_list['header_id']; ?>" placeholder="Title id" required>
																<input type="hidden" class="form-control" name="header_title" value="<?php echo $item_list['header_title']; ?>" placeholder="Title id" required>
																<input type="hidden" class="form-control" name="header_page" value="<?php echo $item_list['header_page']; ?>" placeholder="Title id">
														</div>

														<div class="col-md-12 mb-2">
																<label class="col-form-label">Image (Max W:1920 x H:1080 px) <span style="color:red">*</span></label>
																<div class="custom-file">
															    <input type="file" name="header_image" class="custom-file-input-<?php echo $item_list['header_id']; ?>" id="imgInp-<?php echo $item_list['header_id']; ?>">
															    <label class="custom-file-label-<?php echo $item_list['header_id']; ?>" for="customFile">Choose file</label>
															  </div>
														</div>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Sub title<span style="color:red">*</span></label>
																 <textarea class="form-control" name="header_subtitle" id="exampleFormControlTextarea1" rows="3"><?php echo $item_list['header_subtitle']; ?></textarea>
														</div>
														<?php
															if(isset($item_list['header_link'])){
																$link_visible = "text";
															}else{
																$link_visible = "hidden";
															}
														?>
														<div class="col-md-12 mb-2">
																<input type="<?php echo $link_visible; ?>" class="form-control" name="header_link" value="<?php echo $item_list['header_link']; ?>" placeholder="Link">
														</div>

														<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
														<div class="col-md-12 mb-2">
																	<button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Update</button>
														</div>
													</form>

											</div>

										</div>
								</div>
						</div>
				</div>
				<?php
						}
				?>
		</div>
</div>
