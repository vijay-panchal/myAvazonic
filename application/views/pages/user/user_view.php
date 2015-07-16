<?php 
$LoginID = $this->session->userdata('LoginID');
if($LoginID == "")
{
	redirect(base_url()."admin.php");
}

require_once APPPATH.'views/header.php';?>

 
<!-- ########### STARTS :: Main Content Area ############ -->

<table cellspacing="0" cellpadding="0" border="0" width="100%" class="main_content">
	<tr>
		<!-- ########### STARTS :: Left Panel ############ -->
		<?php require_once APPPATH.'views/left.php';?>

		<!-- ########### ENDS :: Left Panel ############ -->
		
		<!-- ########### STARTS :: Contents ############ -->		
		<td valign="top" align="left" class="menulinks1">

			<div id="content">

				<?php //echo '<pre>'.print_r($this->datas,'/n').'</pre>'; ?>			

				<table width="100%" cellspacing="0" cellpadding="0" border="0" class="CentralBlock">
				<tbody>
					<tr>
						<td colspan="2"> 
							<table width="100%" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td bgcolor="#2c2c2c" class="smalltext" colspan="2"> 
											<table width="100%" cellspacing="0" cellpadding="4" border="0" class="dashborder"> 
												<tbody>
													<tr>
														<td valign="middle" align="center" style="background-color: rgb(64, 63, 49);" class="rowerror"> 
															<b>	User Manager >> View User</b>
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
															<img height="1" width="1" src="<?php echo base_url();?>public/admin/images/space.gif">
														</td>								
														<td valign="middle" align="center" class="menusection1">
															<table>
																<tbody>
																	<tr>
																		<td><img height="14px" width="14px" title=";P"  src="<?php echo base_url();?>public/admin/images/down.png"></td>
																		<td class="smalltext">
																			<b><a href="<?php echo base_url();?>admin.php/user/manage">List Users</a></b>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>														
														<td width="1" class="menudefbg">
															<img height="21" width="1" src="<?php echo base_url();?>public/admin/images/space.gif">
														</td> 
														
														<td width="1" bgcolor="#414142">
															<img height="1" width="1" src="<?php echo base_url();?>public/admin/images/space.gif">
														</td>	
														
														<td valign="middle" align="center" class="menusection2">
															<table>
																<tbody>
																	<tr>
																		<td><img height="14px" width="14px" title=";P" alt=";)" src="<?php echo base_url();?>public/admin/images/add.png"></td>
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
															<img height="21" width="1" src="<?php echo base_url();?>public/admin/images/space.gif">
														</td>
														
													</tr>
							 					</tbody>
											</table>
										</td> 
									</tr>				
								</tbody>
							</table>
							<br style="line-height: 6px;">	
							
<div id="tab_main" style="display: block;" class="tabcontent">
	<table width="100%" cellspacing="0" cellpadding="4" border="0" class="dashborder">
		<tbody>
			<tr style="height: 1em;">
				<td valign="top" align="left">

	<script language="javascript">
	

	function Back()
	{
		window.location="<?php echo base_url();?>admin.php/user/manage";
	}

	

</script>	
					<?php if($this->session->userdata('SuccessError')!=''){ ?>
					<table width="100%"><tr> 
						<td class="infoElement"><?php echo $this->session->userdata('SuccessError');$this->session->unset_userdata('SuccessError')?>
						</td>
					</tr>
					</table>
					<?php } ?>
						<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
										<tbody>
										<tr class="smalltext">
										<td class="smalltext"><B>First Name </B></td>
										<td class="smalltext">
										<?php echo $u->first_name; ?>
										</td>
										</tr>
                                        <tr class="smalltext">
										<td class="smalltext"><B>Last Name</B></td>
										<td class="smalltext">
										<?php echo $u->last_name; ?>
										</td>
										</tr>
					                    <tr class="smalltext">
										<td class="smalltext"><B>Username</B></td>
										<td class="smalltext">
										<?php echo $u->username; ?>
										</td>
										</tr> 
										<tr class="smalltext">
										<td class="smalltext"><B>Password</B></td>
										<td class="smalltext">
										<?php echo $this->encrypt->decode($u->password); ?>
										</td>
										</tr> 
										<tr class="smalltext">
										<td class="smalltext"><B>Email Id </B></td>
										<td class="smalltext">
										<?php echo $u->email; ?>
										</td>
										</tr>
										<tr class="smalltext">
										<td class="smalltext"><B>Status </B></td>
										<td class="smalltext">
										<?php echo $u->status; ?>
										</td>
										</tr>
										<tr>
										<td align="left" colspan="2"><input type="button" name="Go Back" id="back" onclick="	javascript:Back();" value="Back" class="submit"></td>
										</tr>
										
					

								
						</tbody>
					</table>		
							
							

				</td>
			</tr>
		</tbody>
	</table>	
</div>						
						
						</td>
					</tr>
				</tbody>
			</table>
				
			
<!-- ########### ENDS :: Main Content Area ############ -->
			</div> <!-- End content div -->
		</td>
		<td width="8" valign="top" align="left" class="menulinks1">
			<img height="1" width="8" src="<?php echo base_url();?>public/admin/images/space.gif">
		</td>
		<!-- ########### ENDS :: Contents ############ -->
	</tr>
</table>
<!-- ########### ENDS :: Main Content Area ############ -->

<?php require_once APPPATH.'views/footer.php';?>