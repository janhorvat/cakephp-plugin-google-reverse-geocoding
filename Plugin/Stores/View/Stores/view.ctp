<div class="stores view">
<h2><?php  echo __('Store');?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($store['Store']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($store['Store']['name']); ?>
			&nbsp;
		</dd>	
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($store['Store']['address']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Postal code'); ?></dt>
		<dd>
			<?php echo h($store['Store']['postal_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Town'); ?></dt>
		<dd>
			<?php echo h($store['Store']['town']); ?>
			&nbsp;
		</dd>	
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($store['Store']['country']); ?>
			&nbsp;
		</dd>
		<?php if (isset($store['Store']['latitude']) && isset($store['Store']['longitude'])) : ?>
			<dt><?php echo __('Latitude'); ?></dt>
			<dd>
				<?php echo h($store['Store']['latitude']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Longitude'); ?></dt>
			<dd>
				<?php echo h($store['Store']['longitude']); ?>
				&nbsp;
			</dd>
		<?php endif; ?>		
	</dl>
</div>

<?php if (!empty($store['Store']['latitude']) && !empty($store['Store']['longitude'])) : ?>
	<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo h($store['Store']['latitude']); ?>,<?php echo h($store['Store']['longitude']); ?>&amp;aq=&amp;sll=<?php echo h($store['Store']['latitude']); ?>,<?php echo h($store['Store']['longitude']); ?>&amp;sspn=0.010245,0.026157&amp;t=h&amp;g=<?php echo h($store['Store']['latitude']); ?>,<?php echo h($store['Store']['longitude']); ?>&amp;ie=UTF8&amp;ll=<?php echo h($store['Store']['latitude']); ?>,<?php echo h($store['Store']['longitude']); ?>&amp;spn=0.002561,0.006539&amp;z=14&amp;output=embed"></iframe>
<?php endif; ?>
