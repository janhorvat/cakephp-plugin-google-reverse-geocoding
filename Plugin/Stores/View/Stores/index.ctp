<div class="stores index">
	<h2><?php echo __('Stores');?></h2>
	
	<?php $this->Paginator->options(array('url' => array_merge(array('action' => 'index'), $filter_options))); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id', __('ID'));?></th>
		<th><?php echo $this->Paginator->sort('name', __('Name'));?></th>
		<th><?php echo $this->Paginator->sort('address', __('Address'));?></th>
		<th><?php echo $this->Paginator->sort('postal_code', __('Postal code'));?></th>
		<th><?php echo $this->Paginator->sort('town', __('Town'));?></th>
		<th><?php echo $this->Paginator->sort('country', __('Country'));?></th>
		<th>&nbsp;</th>
	</tr>

	<?php
	foreach ($stores as $store): ?>
	<tr>
		<td><?php echo h($store['Store']['id']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['name']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['address']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['postal_code']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['town']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['country']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link('Edit', array('plugin' => 'stores', 'controller' => 'stores', 'action' => 'edit', $store['Store']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('plugin' => 'stores', 'controller' => 'stores', 'action' => 'delete', $store['Store']['id']), __('Are you sure you want to delete: # %s?', $store['Store']['name'])); ?>		
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->Filter->end(); ?> 
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
