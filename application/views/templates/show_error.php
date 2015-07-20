<?php 
$custom_error=$this->session->flashdata('custom_error');
$custom_msg=$this->session->flashdata('custom_msg');
if($custom_error!='')
{
?>
<div class="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Warning!</strong> <?php echo $custom_error?>
</div>
<?php
}
?>
<?php
if($custom_msg!=''){
?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Success!</strong> <?php echo $custom_msg?>
</div>
<?php
}
?>