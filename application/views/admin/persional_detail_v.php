<style>
#settingForm label
{
	width:100%;
}

.desc {
	font-style:italic;
	color:#996600;
	font-size:11px;
}
.field{
	padding-left: 20px;
}
</style>
<?php global_message();?>

<?php echo form_open('admin/personal'); ?>

<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
	
	<tr>
    	<th width="13%">
        	<label>Full Name</label>	  </th>
		<td width="24%">
            <div class="field">
			<?php
			$full_name= set_value('fullname');
			if(isset($details->name))
			{$full_name = $details->name;}

			echo form_input(array("name"=>'fullname',"class"=>"inp-form","value"=>$full_name));?>
            </div>	  </td>
		<td width="63%">
            <div class="desc"> <?php echo form_error('fullname'); ?></div>      </td>
    </tr>
	<tr>
    	<th width="13%">
        	<label>Email</label>	  </th>
		<td width="24%">
            <div class="field">
			<?php 
			$emails= set_value('email');
			if(isset($details->email))
			{$emails = $details->email;}
			echo form_input(array("name"=>'email',"class"=>"inp-form","value"=>$emails));?>
            </div>	  </td>
		<td width="63%">
            <div class="desc"> <?php echo form_error('email'); ?></div>      </td>
    </tr>
	<tr>
    	<th width="13%">
        	<label>New Password</label>	  </th>
		<td width="24%">
            <div class="field">

				<?php echo form_password(array("name"=>'password', "class"=>"inp-form"));?>
            </div>	  </td>
		<td width="63%">
            <div class="desc"><?php echo form_error('password'); ?></div>      </td>
    </tr>
	
	<tr>
    	<th width="13%">
        	<label>Conform Password</label>	  </th>
		<td width="24%">
            <div class="field">
		<?php echo form_password(array("name"=>'confrompassword', "class"=>"inp-form"));?>
            	
            </div>	  </td>
		<td width="63%">
            <div class="desc"><?php echo form_error('confrompassword'); ?></div>      </td>
    </tr>

	<tr>
	  <th><input type="submit" name="submit_detail" value="submitdetail" class="form-submit" /></th>
	  <td valign="top">&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
</table>
<?php form_close();?>
