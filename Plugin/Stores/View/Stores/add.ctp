<div class="stores form">
<?php echo $this->Form->create('Store');?>
	<fieldset>
		<legend><?php echo __('Add Store'); ?></legend>
	<?php
		echo $this->Form->input('name', array(
			'label' => __('Name'),
			'error' => __('Field is required')
		));	
		echo $this->Form->input('address', array(
			'label' => __('Address'),
			'error' => __('Field is required')
		));	
		echo $this->Form->input('postal_code', array(
			'label' => __('Postal code'),
			'error' => __('Field is required')
		));	
		echo $this->Form->input('town', array(
			'label' => __('Town'),
			'error' => __('Field is required')
		));
		echo $this->Form->input('country', array(
			'label' => __('Town'),
			'error' => __('Field is required')
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
