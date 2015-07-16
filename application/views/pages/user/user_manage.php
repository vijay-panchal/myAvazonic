<div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php
						$this->load->view('templates/sidebar');
					?>
                    <div class="span9">
                        <div class="content">
						 <table width="100%" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td bgcolor="#2c2c2c" class="smalltext" colspan="2"> 
											<table width="100%" cellspacing="0" cellpadding="4" border="0" class="dashborder"> 
												<tbody>
													<tr>
														<td valign="middle" align="center" style="background-color: rgb(255, 255, 255);" class="rowerror"> 
															<b>	User Manager </b>
														</td>
													</tr> 
												</tbody>
											</table> 
										</td>
									</tr>
									<tr><td><br style="line-height: 6px;"></td></tr>
									<tr>
										<td bgcolor="#414142" colspan="2" class="menusection2">
											<table cellspacing="0" cellpadding="0" border="0">
												<tbody>
													<tr height="21"> 
														<td width="1" bgcolor="#414142">
															<img height="1" width="1" src="<?php echo base_url();?>assets/images/space.gif">
														</td>								
														<td valign="middle" align="center" class="menusection1">
															<table>
																<tbody>
																	<tr>
																		<td><img height="14px" width="14px" title=";P" alt=";)" src="<?php echo base_url();?>assets/images/down.png"></td>
																		<td class="smalltext">
																			<b><a style="color: rgb(255, 255, 255)" href="#">List Users</a></b>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>														
														<td width="1" class="menudefbg">
															<img height="21" width="1" src="<?php echo base_url();?>assets/images/space.gif">
														</td> 
													
														<td width="1" bgcolor="#414142">
															<img height="1" width="1" src="<?php echo base_url();?>assets/images/space.gif">
														</td>	
														
														<td valign="middle" align="center" class="menusection2">
															<table>
																<tbody>
																	<tr>
																		<td><img height="14px" width="14px" title=";P" src="<?php echo base_url();?>assets/images/add.png"></td>
																		<td class="smalltext">
																			<b>
																			<a style="color: rgb(255, 255, 255)" href="<?php echo base_url();?>index.php/user/add_customer">Add New User</a>
																			</b>
																		</td>
																			<td><img width="16" border="0" height="16"  src="<?php echo base_url()?>assets/images/icons/users.jpg"></td>
																		<td class="smalltext">
																			<b>
																			<a style="color: rgb(255, 255, 255)" href="#">Manage Roles</a>
																			</b>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
														
														<td width="1" class="menudefbg">
															<img height="21" width="1" src="<?php echo base_url();?>assets/images/space.gif">
														</td>
													
													</tr>
							 					</tbody>
											</table>
										</td> 
									</tr>				
								</tbody>
							</table>
                             <img height="21" width="1" src="<?php echo base_url();?>assets/images/space.gif">
                    	 <table width="100%" cellspacing="0" cellpadding="2" border="0" align="center"> 
								<tbody>
									<tr><td height="15" align="right" class="text" colspan="7"><span id="#Results"></span></td></tr>
									<tr>
										<td class="smalltext" colspan="10" align="right">
										<?php echo $this->pagination->create_links();?>
										</td>
										
									</tr>
									<?php
									// This condition is to include the pagination only if there is more than 1 page?>
								
									<tr class="TableHeader">
										<td class="TableHeader">&nbsp;</td>
										<td class="TableHeader">User Name</td>
										<td class="TableHeader">Email</td>
										<td class="TableHeader">Status</td>
										<td align="center" class="TableHeader"><b>Options</b></td>
									</tr>
									
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
											
											<img height="21px" width="21px" border="0" title="View" alt="View" src="<?php echo base_url();?>assets/images/window.png" onclick="javascript:View('<?php echo $us->user_id; ?>','<?php #echo $this->paginatorParams;?>')" style="cursor: pointer;"> &nbsp;

											<?php #if(in_array("Edit CMS",$this->PERTERMS)) { ?>

												<img height="21px" width="21px" border="0" title="Edit" alt="Edit" src="<?php echo base_url();?>assets/images/window_edit.png" onclick="javascript:Edit('<?php echo $us->user_id; ?>','<?php# echo $this->paginatorParams;?>')" style="cursor: pointer;"> &nbsp;
											<?php #} if(in_array("Delete CMS",$this->PERTERMS)) { ?>

												<img height="21px" width="21px" border="0" title="Delete" alt="Delete" src="<?php echo base_url();?>assets/images/window_delete.png" onclick="javascript:User_delete('<?php echo $us->user_id; ?>');" style="cursor: pointer;"> &nbsp;
											<?php #} ?>
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
            <!--/.container-->
        </div>
        <!--/.wrapper-->