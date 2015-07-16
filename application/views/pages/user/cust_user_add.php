<?php 

$FirstName	= $this->session->userdata('first_name');
$LastName	= $this->session->userdata('last_name');
$UserName	= $this->session->userdata('username');
$Email		= $this->session->userdata('email');
$UserType	= $this->session->userdata('UserType');
$Status		= $this->session->userdata('status');
?>
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
																			<a style="color: rgb(255, 255, 255)" href="<?php echo base_url(); ?>index.php/user/add_customer">Add New User</a>
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
									<div id="error"  class="infoElement" style="display:none;">
						</div>

						<?php if($this->session->userdata('UserError')!=''){ ?>
							<table width="100%">
							
							<tr> 
								<td class="infoElement"><?php echo $this->session->userdata('UserError');$this->session->unset_userdata('UserError')?>
								</td>
							</tr>
							</table>
						<?php } ?>


							<?php echo form_open_multipart('/user/add_customer');?>

										<dl class="zend_form">
										<dt id="user_name-label"><label for="user_name" class="required">* First Name:</label></dt>
										<dd id="user_name-element">
										<input type="text" name="first_name" id="first_name" value="<?php echo $FirstName;?>" class="innerelement"></dd>

										<dt id="user_name-label"><label for="user_name" class="required">* Last Name:</label></dt>
										<dd id="user_name-element">
										<input type="text" name="last_name" id="last_name" value="<?php echo $LastName; ?>" class="innerelement"></dd>

										<dt id="user_name-label"><label for="user_name" class="required">* User Name:</label></dt>
										<dd id="user_name-element">
										<input type="text" name="user_name" id="user_name" value="<?php echo $UserName;?>" class="innerelement"></dd>

										<dt id="password-label"><label for="password" class="required">* Password:</label></dt>
										<dd id="password-element">
										<input type="password" name="password" id="password" value="" class="innerelement"></dd>

										<dt id="confirm_password-label"><label for="confirm_password" class="required">* Confirm Password:</label></dt>
										<dd id="first_name-element">
										<input type="password" name="confirm_password" id="confirm_password" value="" class="innerelement"></dd>

										<dt id="email_id-label"><label for="email_id" class="required">* Email Id:</label></dt>
										<dd id="last_name-element">
										<input type="text" name="email_id" id="email_id" value="<?php echo $Email; ?>" class="innerelement"></dd>
                                        
									    <!-- <dt id="email_id-label"><label for="email_id" class="required">* User Type:</label></dt>
										<dd id="last_name-element">
										<select name="user_type" class="innerelement" id="user_type"><option value=""></select></dd> -->
										
										<dt id="verification_code"><label class="required">* Verification Code:</label>
										<dd id="verification_code"><img height="20" width="130" alt="Verification" src="<?php echo base_url().'index.php/user/captcha';?>"> 
										</dt>
										<input type="text" title="Enter the validation code" id="verification_code" name="verifcation_code" class="innerelement"></dd>

										<dt id="email_id-label"><label class="required">* Status:</label></dt>
										<dd id="status-element">
										<label for="status-Active"><input type="radio" name="status" id="status-Active" value="Active" checked="checked">Active</label> <label for="status-Inactive"><input type="radio" name="status" id="status-Inactive" value="Inactive">Inactive</label></dd>


										<dt id="add-label">&nbsp;</dt><dd id="add-element">
										<input type="submit" name="add" id="add" value="Add" onclick="return Uservalidate();" class="submit"></dd></dl>
							</form>

								</td>
							</tr>
								</tbody>
							</table>
							
                        </div>
					</div>	
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->