<div class="container-fluid">

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Contact Us</h1>
		</div>
		<div class="row">
				<div class="col-lg-12">
						<!-- Circle Buttons -->
						<div class="card shadow mb-4">
								<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-success">Form Contact Us</h6>
								</div>
								<div class="card-body">
										<div class="row">

											<div class="col-md-6">
													<form action="<?php echo base_url(); ?>Admin/Contact_us_update" method="post" enctype="multipart/form-data">
														<?php
															foreach ($data['contact'] as $key_detail => $item_detail){
														?>
														<div class="col-md-12 mb-2">
																<input type="hidden" class="form-control" name="contact_id[]" value="<?php echo $item_detail['contact_id']; ?>" placeholder="Contact id" required>
																<label class="col-form-label"><?php echo $item_detail['contact_title']; ?></label>
																<?php
																	if($item_detail['contact_type'] == "address"){
																?>
																 <textarea id="elm1" name="contact_content[]" ><?php echo $item_detail['contact_content']; ?></textarea>
																 <?php
															 }else{
																 ?>
																 <input type="text" class="form-control" name="contact_content[]" value="<?php echo $item_detail['contact_content']; ?>" placeholder="Contact id" required>
																 <?php
															 			}
																 ?>
														</div>
															<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

															<?php
																	}
															?>
														<div class="col-md-12 mb-2">
																	<button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Update</button>
														</div>
													</form>
											</div>

											<div class="col-md-6">
													<form action="<?php echo base_url(); ?>Admin/Social_update" method="post" enctype="multipart/form-data">
												<?php
													foreach ($data['social'] as $key_detail => $item_detail){
												?>
														<p><i class="<?php echo $item_detail['social_icon']; ?>"></i> <?php echo $item_detail['social_title']; ?></p>
														<input type="hidden" class="form-control" name="social_id[]" value="<?php echo $item_detail['social_id']; ?>" placeholder="Social id" required>
														<input type="text" class="form-control mb-2" name="social_title[]" value="<?php echo $item_detail['social_title']; ?>" placeholder="Social title" required>
														<input type="text" class="form-control mb-2" name="social_icon[]" value="<?php echo $item_detail['social_icon']; ?>" placeholder="Social icon" required>
														<input type="text" class="form-control mb-2" name="social_link[]" value="<?php echo $item_detail['social_link']; ?>" placeholder="Social link" required>
														<hr/>
												<?php
												}
												?>
															<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
														<button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Update</button>
														</form>

												</div>
											</div>
										</div>
								</div>
						</div>
				</div>
</div>
