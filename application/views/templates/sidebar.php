<div class="span3">
                        <div class="sidebar">
						<ul class="widget widget-menu unstyled">
							<li class="active"><a href="<?php echo base_url() ?>home"><i class="menu-icon icon-dashboard"></i>Dashboard
                            </a></li>
							<?php
								$role_id = $this->session->userdata('role_id');
								$params=array(
									'role_id' => $role_id
								);
								$nav_res=$this->usermodules->get($params);
								//print_r($res);
								foreach($nav_res as $nav):
							?>
                                <li class="active"><a href="<?php echo base_url().$nav->link ?>"><i class="menu-icon <?php echo $nav->icon_code ?>"></i><?php echo $nav->module_name ?>
                                </a></li>
							<?php
								endforeach;
							?>
								
								<!--
								<li class="active"><a href="<?php echo base_url(); ?>index.php/user/sp_manage"><i class="menu-icon icon-dashboard"></i>Service Professional Management
                                </a></li>
								<li class="active"><a href="index.html"><i class="menu-icon icon-dashboard"></i>Add Role
                                </a></li>
                                <li><a href="activity.html"><i class="menu-icon icon-file"></i>New Requirement </a>
                                </li>
                                <li><a href="message.html"><i class="menu-icon icon-legal"></i>Open Quote  </a></li>
                                <li><a href="task.html"><i class="menu-icon icon-truck"></i>Track Request   </a></li>-->
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <!--<li><a href="ui-button-icon.html"><i class="menu-icon icon-shopping-cart"></i> Track Order </a></li>
                                <li><a href="ui-typography.html"><i class="menu-icon icon-cog"></i>Installation Details </a></li>
                                <li><a href="form.html"><i class="menu-icon icon-exclamation-sign"></i>Notifications </a></li>
                                <li><a href="table.html"><i class="menu-icon icon-group"></i>Customer Desk </a></li>-->
                                <li><a href="<?php echo base_url() ?>myprofile"><i class="menu-icon icon-user"></i>View Profile </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->