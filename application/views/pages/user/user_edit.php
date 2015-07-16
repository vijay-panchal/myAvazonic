<?php 

$LoginID = $this->session->userdata('LoginID');
if($LoginID == "")
{
	redirect(base_url()."admin.php");
}

$FirstName	= $u->first_name;
$LastName	= $u->last_name;
$UserName	= $u->username;
$Email		= $u->email;
$password	= $this->encrypt->decode($u->password);
$UserType	= $u->user_group;
$userStatus		= $u->status;


?>

<?php require_once APPPATH.'views/header.php';?>

 
<!-- ########### STARTS :: Main Content Area ############ -->

<table cellspacing="0" cellpadding="0" border="0" width="100%" class="main_content">
	<tr>
		<!-- ########### STARTS :: Left Panel ############ -->
		<?php require_once APPPATH.'views/left.php';?>
		<!-- ########### ENDS :: Left Panel ############ -->
		
		<!-- ########### STARTS :: Contents ############ -->		
		<td valign="top" align="left" class="menulinks1">

			<div id="content">
						
		<table width="100%" cellspacing="0" cellpadding="4" border="0" class="dashborder">
						<tbody>

						<tr style="height: 1em;">
							<td valign="top" align="left">
								<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody>
											<tr>
												<td bgcolor="#2c2c2c" class="smalltext" colspan="2"> 
													<table width="100%" cellspacing="0" cellpadding="4" border="0" class="dashborder"> 
														<tbody>
															<tr>
																<td valign="middle" align="center" style="background-color: rgb(64, 63, 49);" class="rowerror"> 
																	<b>	Users Manager >> Edit User </b>
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
																	<img height="1" width="1" src="<?php echo base_url();?>assets/admin/images/space.gif">
																</td>								
																<td valign="middle" align="center" class="menusection1">
																	<table>
																		<tbody>
																			<tr>
																				<td><img height="14px" width="14px" title=";P" alt=";)" src="<?php echo base_url();?>assets/admin/images/down.png"></td>
																				<td class="smalltext">
																					<b><a href="<?php echo base_url();?>admin.php/user/manage">List Users</a></b>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>														
																<td width="1" class="menudefbg">
																	<img height="21" width="1" src="<?php echo base_url();?>assets/admin/images/space.gif">
																</td> 
																<?php# if(in_array("Add CMS",$this->PERTERMS)) { ?>
																<td width="1" bgcolor="#414142">
																	<img height="1" width="1" src="<?php echo base_url();?>assets/admin/images/space.gif">
																</td>	
																
																<td valign="middle" align="center" class="menusection2">
																	<table>
																		<tbody>
																			<tr>
																				<td><img height="14px" width="14px" title=";P" alt=";)" src="<?php echo base_url();?>assets/admin/images/add.png"></td>
																				<td class="smalltext">
																					<b>
																					<a style="color: rgb(255, 255, 255)" href="<?php echo base_url();?>admin.php/user/add">Add New User</a>
																					</b>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
																
																<td width="1" class="menudefbg">
																	<img height="21" width="1" src="<?php echo base_url();?>assets/admin/images/space.gif">
																</td>
																<?php# } ?>
															</tr>
														</tbody>
													</table>
												</td> 
											</tr>				
										</tbody>
									</table>
									<br style="line-height: 6px;">
								</td>
							</tr>

					<tr style="height: 1em;">
								<td valign="top" align="left">

								
								
						<table width="100%"><tr><td align="left" class="infoElement" colspan="2">* Required Fields</td></tr></table>
						<div id="error"  class="infoElement" style="display:none;">
						</div>

						<?php if($this->session->userdata('UserError')!=''){ ?>
							<table width="100%"><tr> 
								<td class="infoElement"><?php echo $this->session->userdata('UserError');$this->session->unset_userdata('UserError')?>
								</td>
							</tr>
							</table>
						<?php } ?>

							<?php echo form_open('user/edit/'.$u->id,array('id'=>'UserForm'));?>

										<dl class="zend_form">
										<dt id="user_name-label"><label for="user_name" class="required">* First Name:</label></dt>
										<dd id="user_name-element">
										<input type="text" name="first_name" id="first_name" value="<?php echo $FirstName;?>" class="innerelement">
									</dd>

										<dt id="user_name-label"><label for="user_name" class="required">* Last Name:</label></dt>
										<dd id="user_name-element">
										<input type="text" name="last_name" id="last_name" value="<?php echo $LastName; ?>" class="innerelement"></dd>

										<dt id="user_name-label"><label for="user_name" class="required">* User Name:</label></dt>
										<dd id="user_name-element">
										<input type="text" name="user_name" id="user_name" value="<?php echo $UserName;?>" class="innerelement">
											<input type="hidden" name="hidden_user" value="<?php echo $UserName;?>">
										</dd>

										<dt id="password-label"><label for="password" class="required">* Password:</label></dt>
										<dd id="password-element">
										<input type="password" name="password" id="password" value="<?php echo $password;?>" class="innerelement"></dd>

										<dt id="confirm_password-label"><label for="confirm_password" class="required">* Confirm Password:</label></dt>
										<dd id="first_name-element">
										<input type="password" name="confirm_password" id="confirm_password" value="<?php echo $password;?>" class="innerelement"></dd>

										<dt id="email_id-label"><label for="email_id" class="required">* Email Id:</label></dt>
										<dd id="last_name-element">
										<input type="text" name="email_id" id="email_id" value="<?php echo $Email; ?>" class="innerelement"></dd>
                                                                     											
										<dt id="verification_code"><label class="required">* Verification Code:</label>
										<dd id="verification_code"><img height="20" width="130" alt="Verification" src="<?php echo base_url().'admin.php/user/captcha';?>"> 
										</dt>
										<input type="text" title="Enter the validation code" id="verification_code" name="verifcation_code" class="innerelement"></dd>

										<dt id="email_id-label"><label class="required">* Status</label></dt>
										<dd id="status-element">
										<label for="status-Active"><input  type="radio" name="status" id="status-Active" value="Active"  <?php if($userStatus=='Active') {echo 'Checked';}?>/>Active</label> <label for="status-Inactive"><input type="radio" name="status" id="status-Inactive" value="Inactive" <?php if($userStatus=='Inactive') {echo 'Checked';}?> />Inactive</label></dd>

										<dt id="add-label">&nbsp;</dt><dd id="add-element">
										<input type="submit" name="Edit" id="add" value="Edit" class="submit" onclick="return Uservalidate();"></dd></dl>
							</form>

								</td>
							</tr>
						</tbody>
					</table>	
			</div> 
		</td>
		<td width="8" valign="top" align="left" class="menulinks1">
			<img height="1" width="8" src="<?php echo base_url();?>assets/admin/images/space.gif">
		</td>
		<!-- ########### ENDS :: Contents ############ -->
	</tr>
</table>
<!-- ########### ENDS :: Main Content Area ############ -->

<?php require_once APPPATH.'views/footer.php';?>
