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
							<div class="module">
							<div class="module-head">
								<h3>New Customer</h3>
							</div>
							<div class="module-body">
						 <div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Oh snap!</strong> Whats wrong with you? 
									</div>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Well done!</strong> Now you are listening me :) 
									</div>

									<br />

									<form class="form-horizontal row-fluid">
										<div class="control-group">
											<label class="control-label" for="basicinput">* First Name:</label>
											<div class="controls">
												<input type="text" name="first_name" id="first_name" value="<?php echo $FirstName;?>" class="innerelement">
												<span class="help-inline">Minimum 5 Characters</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">* Last Name:</label>
											<div class="controls">
												<input type="text" name="last_name" id="last_name" value="<?php echo $LastName; ?>" class="innerelement">
												<span class="help-inline">Minimum 5 Characters</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">* User Name:</label>
											<div class="controls">
												<input type="text" name="user_name" id="user_name" value="<?php echo $UserName;?>" class="innerelement">
												<span class="help-inline">Minimum 5 Characters</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">* Email Id:</label>
											<div class="controls">
												<input type="password" name="email_id" id="email_id" value="" class="innerelement">
												<span class="help-inline">Minimum 5 Characters</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">* Password:</label>
											<div class="controls">
												<input type="password" name="password" id="password" value="" class="innerelement">
												<span class="help-inline">Minimum 5 Characters</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">* Confirm Password:</label>
											<div class="controls">
												<input type="password" name="confirm_password" id="confirm_password" value="" class="innerelement">
												<span class="help-inline">Minimum 5 Characters</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">* Status:</label>
											<div class="controls">
												<label class="radio">
													<input type="radio" name="status" id="status-Active" value="Active" checked="checked">
													Active
												</label> 
												<label class="radio">
													<input type="radio" name="status" id="status-Inactive" value="Inactive">
													Inactive
												</label>
												
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="add" id="add" class="btn btn-primary">Add</button>
											</div>
										</div>
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