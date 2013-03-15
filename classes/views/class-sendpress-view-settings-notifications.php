<?php

// Prevent loading this file directly
if ( !defined('SENDPRESS_VERSION') ) {
	header('HTTP/1.0 403 Forbidden');
	die;
}

class SendPress_View_Settings_Notifications extends SendPress_View_Settings {
	
	function save($post, $sp){
		$options = SendPress_Option::get('notification_options');
		if(isset($_POST['toemail'])){
            $options['email'] = $_POST['toemail'];
        }

        if(isset($_POST['toname'])){
            $options['name'] = $_POST['toname'];
        }

        SendPress_Option::set('notification_options', $options );

        SendPress_View_Settings_Notifications::redirect();
	}

	function html($sp) {?>
		<form method="post" id="post">
			<div style="float:right;" >
				<a href="<?php echo SendPress_View_Settings_Notifications::link(); ?>" class="btn btn-large" ><i class="icon-remove"></i> <?php _e('Cancel','sendpress'); ?></a> <a href="#" id="save-update" class="btn btn-primary btn-large"><i class="icon-white icon-ok"></i> <?php _e('Save','sendpress'); ?></a>
			</div>
			<br class="clear">
			<?php 
				$options = SendPress_Option::get('notification_options'); 
				//print_r($options);
			?>
			<h3>Notification E-mail</h3>

			<div class="boxer form-box">
				<div style="float: right; width: 45%;">
					<h4 class="nomargin"><?php _e('E-mail','sendpress'); ?></h4>
					<input name="toemail" tabindex=2 type="text" id="toemail" value="<?php echo $options['email']; ?>" class="regular-text sp-text">
				</div>	
				<div style="width: 45%; margin-right: 10%">
					<h4 class="nomargin"><?php _e('Name','sendpress'); ?></h4>
					<input name="toname" tabindex=1 type="text" id="toname" value="<?php echo $options['name']; ?>" class="regular-text sp-text">
				</div>
			</div>
			<div class="well">
				<h4>Notification Settings</h4>
				
				<p>Select the notifications you'd like to receive and how often you'd like to receive them.</p>
				<p> 
				  <label for="enable-notifications">Enable Notifications</label> 
				  <input class="ibutton" type="checkbox" id="notifications-enable-subscribed"/> 
				</p>
				<p>
					<div>User Subscribed:</div>
					
				  	<label for="notifications-subscribed-daily">Daily</label> 
				  	<input class="ibutton" type="checkbox" id="notifications-subscribed-daily"/> 

				  	<label for="notifications-subscribed-weekly">Weekly</label> 
				  	<input class="ibutton" type="checkbox" id="notifications-subscribed-weekly"/> 

				  	<label for="notifications-subscribed-monthly">Monthly</label>
				  	<input class="ibutton" type="checkbox" id="notifications-subscribed-monthly"/>
				<p>
					<div>User Unsbscribed:</div>
					<label for="notifications-unsubscribed-daily">Daily</label> 
				  	<input class="ibutton" type="checkbox" id="notifications-unsubscribed-daily"/> 

				  	<label for="notifications-unsubscribed-weekly">Weekly</label> 
				  	<input class="ibutton" type="checkbox" id="notifications-unsubscribed-weekly"/> 

				  	<label for="notifications-unsubscribed-monthly">Monthly</label>
				  	<input class="ibutton" type="checkbox" id="notifications-unsubscribed-monthly"/> 
				</p>
			</div>
			<?php wp_nonce_field($sp->_nonce_value); ?>
		</form>
		<?php
	}

}