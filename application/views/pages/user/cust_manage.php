<div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php
						$this->load->view('templates/sidebar');
					?>
                    <div class="span9">
                        <div class="content">
							<div class="module">
								<div class="module-head">
									<h3>User Manager</h3>
								</div>
								<div class="module-option clearfix">
									<div class="pull-left">
										Filter : &nbsp;
										<div class="btn-group">
											<button class="btn">Choose</button>
											<button class="btn dropdown-toggle" data-toggle="dropdown">
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li><a href="#">User Name</a></li>
												<li><a href="#">Email</a></li>
												<li><a href="#">Status</a></li>
												<li class="divider"></li>
												<li><a href="#">Active</a></li>
												<li><a href="#">InActive</a></li>
											</ul>
										</div>
									</div>
									<div class="pull-right">
										<a href="<?php echo base_url(); ?>customer_manage/new" class="btn btn-primary">Create Customer</a>
									</div>
								</div>
								<div class="module-body">
									<table class="table table-striped table-bordered table-condensed">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>User Name</th>
									  <th>Email</th>
									  <th>Status</th>
									  <th>Options</th>
									</tr>
								  </thead>
								  <tbody>
									<?php //var_dump($user);exit;
									if(!empty($user))
									{  
										$i = 1;
										foreach($user as $us){ 
											if($i%2==0) {$rowclass = 'even';} else {$rowclass = 'odd';}?>
												
										<tr class="<?php echo $rowclass;?>" valign="middle" onmouseout="out(this);" onmouseover="over(this);" class="smalltext" style="background-color: rgb(255, 255, 255);">	
											<?php if($us->is_active == 'Y') { ?>
											<td valign="middle" align="center" class="smalltext ListData"><img title="Active" alt="Active" src="<?php echo base_url();?>assets/images/icon_greenbigdot.gif">&nbsp;<img title="&gt;&gt;" alt="&gt;&gt;" src="<?php echo base_url();?>assets/images/icon_rightarrowred.gif"></td>
										<?php } else { ?>
											<td valign="middle" align="center" class="smalltext ListData"><img title="Deactivated" alt="Deactivated" src="<?php echo base_url();?>assets/images/icon_redbigdot.gif">&nbsp;<img title="&gt;&gt;" alt="&gt;&gt;" src="<?php echo base_url();?>assets/images/icon_rightarrowred.gif"></td>
										<?php } ?>

											<td valign="middle" class="smalltext ListData"><?php echo $us->username; ?></td>

											<td valign="middle" class="smalltext ListData"><?php echo $us->email;?></td>
											
											<td valign="middle" class="smalltext ListData">
											<?php if($us->is_active == 'Y'){echo "Active";} else if($us->is_active == 'N') {echo "InActive";}?>
											</td>
											
											<td valign="middle" align="center" class="smalltext ListData">
											<table >
												<tr >
													<td style="border:none;" title="View"><a href="javascript:void(0);"><i class="icon-zoom-in"></i></a></td>
													<td style="border:none;" title="Edit"><a href="javascript:void(0);"><i class="icon-edit"></i></a></td>
													<td style="border:none;" title="Delete"><a href="javascript:void(0);"><i class="icon-trash"></i></a></td>
												</tr>
											</table>
											
											</td>

										</tr>	

									<?php $i = $i+1; }
									}
									else
									{
									?>
										<tr>
											<td class="smalltext">No records found.</td>
										</tr>
									<?php } ?> 
								  </tbody>
						 </table>
							
					</div>	
								</div>
						</div>
					</div>
				</div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->