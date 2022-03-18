<div class="container-fluid">

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">About Us</h1>
		</div>
		<div class="row">
				<div class="col-lg-12">
						<!-- Circle Buttons -->
						<div class="card shadow mb-4">
								<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-success">Form About Us</h6>
								</div>
								<div class="card-body">

										<div class="row">
											<?php
												foreach ($data['about'] as $key_detail => $item_detail){
											?>
											<div class="col-md-5">
												<center>
														<img class="mt-30" id="blah" name="thumbnail" src="<?php echo $item_detail['about_image']; ?>" alt="your image" style="width:100%;height:auto;" />
												</center>
											</div>
											<div class="col-md-7">
													<form action="<?php echo base_url(); ?>Admin/About_us_update" method="post" enctype="multipart/form-data">
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Header (Max W:2000 x H:2000 px)</label>
																<div class="custom-file">
															    <input type="file" name="about_image" class="custom-file-input" id="imgInp">
															    <label class="custom-file-label" for="customFile">Choose file</label>
															  </div>
														</div>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">About Us</label>
																 <textarea id="elm1" name="about_text" ><?php echo $item_detail['about_text']; ?></textarea>
														</div>
														<div class="col-md-12 mb-2">
																<label class="col-form-label">Our_team</label>
																 <textarea id="elm2" name="about_team"><?php echo $item_detail['about_team']; ?></textarea>
														</div>
														<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
														<div class="col-md-12 mb-2">
																	<button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Submit</button>
														</div>
													</form>
											</div>
											<?php
													}
											?>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>
