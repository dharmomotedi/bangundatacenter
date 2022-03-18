<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Introduction Content</h1>
		</div>
		<div class="row">
			<?php
				 foreach ($data['introduction'] as $key_list => $item_list) {
			 ?>
				<div class="col-lg-4">
						<!-- Circle Buttons -->
						<div class="card shadow mb-4">
								<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-success">Form <?php echo $item_list['text_sub_title']; ?></h6>
								</div>
								<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<center>
														<img class="mt-30" id="blah-<?php echo $item_list['text_id']; ?>" name="header_image" src="<?php echo $item_list['text_image']; ?>" alt="your image" style="width:100%;height:auto;" />
												</center>
											</div>
											<div class="col-md-12">
													<form action="<?php echo base_url(); ?>Admin/Update_introduction" method="post" enctype="multipart/form-data">
														<div class="col-md-12 mb-2">
																<input type="hidden" class="form-control" name="text_id" value="<?php echo $item_list['text_id']; ?>" placeholder="Title id" required>
														</div>

														<div class="col-md-12 mb-2">
																<label class="col-form-label">Image (Max W:600 x H:600 px) <span style="color:red">*</span></label>
																<div class="custom-file">
															    <input type="file" name="text_image" class="custom-file-input-<?php echo $item_list['text_id']; ?>" id="imgInp-<?php echo $item_list['text_id']; ?>">
															    <label class="custom-file-label-<?php echo $item_list['text_id']; ?>" for="customFile">Choose file</label>
															  </div>
														</div>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Title<span style="color:red">*</span></label>
																<input type="block" class="form-control" name="text_title" value="<?php echo $item_list['text_title']; ?>" placeholder="Title id" required>
														</div>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Sub title<span style="color:red">*</span></label>
																<input type="block" class="form-control" name="text_sub_title" value="<?php echo $item_list['text_sub_title']; ?>" placeholder="Title id" required>
														</div>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Intro<span style="color:red">*</span></label>
																 <textarea class="form-control" name="text_intro" id="exampleFormControlTextarea1" rows="3"><?php echo $item_list['text_intro']; ?></textarea>
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
