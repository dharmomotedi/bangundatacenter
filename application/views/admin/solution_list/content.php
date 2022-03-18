<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Solution Detail</h1>
		</div>
		<div class="row">
				<div class="col-lg-5">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-success">Form Solution</h6>
						</div>
						<div class="card-body">
								<div class="row">
										<div class="col-md-12">
												<form action="<?php echo base_url(); ?>Admin/Update_solution" method="post" enctype="multipart/form-data">
													<div class="row">
														<?php
															 foreach ($data['solution_detail'] as $key_list => $item_list){
																 $solution_id = $item_list['solution_id'];
														 ?>
														<div class="col-md-12 mb-2">
															<input type="hidden" class="form-control" name="solution_id" value="<?php echo $item_list['solution_id'];?>" placeholder="Solution title" required>
															<label class="col-form-label">Title</label>
															<input type="text" class="form-control" name="solution_title" value="<?php echo $item_list['solution_title'];?>" placeholder="Solution title" required>
														</div>
														<div class="col-md-12 mb-2">
															<center>
																<?php
																	if(isset($item_list['solution_list']) && $item_list['solution_list'] == 1){
																			$checked = "checked";
																	}else if (!isset($item_list['solution_list']) || $item_list['solution_list'] == 0){
																		$checked = "";
																	}
																?>
																<input name="detail" class="form-check-input" type="checkbox" id="gridCheck1" <?php echo $checked; ?>>
																<label class="form-check-label" for="gridCheck1">
																	Detail Solution
																</label>
															</center>
														</div>
															<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
														<div class="col-md-12 mb-2">
																	<button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Submit</button>
														</div>
														<?php
															}
														?>
												 </div>
												</form>
										</div>
								</div>
						</div>
					</div>
				</div>


				<div class="col-lg-7">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-success">Solution Point</h6>
						</div>
						<div class="card-body">
								<div class="row">
									<?php
											if(isset($data['point_detail'])){
												foreach($data['point_detail'] as $key_list => $item_list){
												if(isset($data['point_detail'])){
													 	$list_id = $item_list['list_id'];
														$solution_id = $item_list['solution_id'];
														$list_title = $item_list['list_title'];
														$list_text = $item_list['list_text'];
														$status = $item_list['status'];
												 }

									?>
											<div class="col-md-12 mb-2">
												<a href="<?php echo base_url()?>Admin/Solution_detail/<?php echo $item_list['solution_id']; ?>/<?php echo $list_id = null; ?>" class=" btn btn-sm btn-info shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Clean Form</a>
											</div>
											<form action="<?php echo base_url(); ?>Admin/Update_solution_point" method="post" enctype="multipart/form-data">
												<div class="col-md-12 mb-2">
														<input type="hidden" class="form-control" name="list_id" value="<?php echo $item_list['list_id']; ?>" placeholder="Title id" required>
												</div>
												<div class="col-md-12 mb-2">
														<input type="hidden" class="form-control" name="solution_id" value="<?php echo $solution_id; ?>" placeholder="Title id" required>
												</div>
												<div class="col-md-12 mb-2">
													<label class="col-form-label">Title</label>
													<input type="text" class="form-control" name="list_title" value="<?php if(isset($list_title)){ echo $list_title; }?>" placeholder="Solution title" required>
												</div>
												<div class="col-md-12 mb-2">
														<label class="col-form-label">Text<span style="color:red">*</span></label>
														 <textarea class="form-control" name="list_text" id="exampleFormControlTextarea1" rows="3"><?php if(isset($list_text)){ echo $list_text; }?></textarea>
												</div>
												<div class="col-md-12 mb-5 text-center">
													<?php
														if(isset($status) && $status == 0){
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
															<button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Update</button>
												</div>
											</form>
									<?php
												}
											}else{
									?>
										<form action="<?php echo base_url(); ?>Admin/Submit_solution_point" method="post" enctype="multipart/form-data">

											<div class="col-md-12 mb-2">
													<input type="hidden" class="form-control" name="solution_id" value="<?php echo $solution_id; ?>" placeholder="Title id" required>
											</div>
											<div class="col-md-12 mb-2">
												<label class="col-form-label">Title</label>
												<input type="text" class="form-control" name="list_title" value="" placeholder="Solution title" required>
											</div>
											<div class="col-md-12 mb-2">
													<label class="col-form-label">Text<span style="color:red">*</span></label>
													 <textarea class="form-control" name="list_text" id="exampleFormControlTextarea1" rows="3"></textarea>
											</div>
											<div class="col-md-12 mb-5 text-center">
												<input name="draf" class="form-check-input" type="checkbox" id="gridCheck1">
												<label class="form-check-label" for="gridCheck1">
													Save Draf
												</label>
											</div>
											<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
											<div class="col-md-12 mb-2">
														<button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Submit</button>
											</div>
										</form>
									<?php
										}
									?>
								</div>

								<div class="row mt-10">
									<table class="table">
										<thead>
									    <tr>
									      <th scope="col">#</th>
									      <th scope="col">Title</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>
										 <tbody>
											<?php
												$no = 1;
		 										foreach($data['solution_point'] as $key_list => $item_list){
		 									?>
											<tr>
									      <th scope="row"><?php echo $no; ?></th>
									      <td><?php echo $item_list['list_title']; ?></td>
												<td>
													<a href="<?php echo base_url()?>Admin/Solution_detail/<?php echo $item_list['solution_id']; ?>/<?php echo $item_list['list_id']; ?>" class="btn btn-primary btn-circle">
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
													<a href="<?php echo base_url();?>Admin/Update_point_status/<?php echo $item_list['list_id']; ?>/<?php echo $item_list['status']; ?>/<?php echo $item_list['solution_id']; ?>" class="btn <?php echo $button_style; ?> btn-circle">
															<i class="<?php echo $button_icon; ?>"></i>
													</a>
													<a href="#" data-toggle="modal" data-target="#DeleteModal-<?php echo $item_list['list_id']; ?>" class="btn btn-danger btn-circle">
															<i class="fas fa-trash"></i>
													</a>

													<!-- Logout Modal-->
													<div class="modal fade" id="DeleteModal-<?php echo $item_list['list_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
																					<a class="btn btn-danger" href="<?php echo base_url()?>Admin/Delete_point/<?php echo $item_list['list_id']; ?>/<?php echo $item_list['solution_id']; ?>">Yes</a>
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
</div>
