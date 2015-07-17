<div class="policies form">
<?php echo $this->Form->create('Policy');?>
	<fieldset>
		<legend><?php __('Add Policy'); ?></legend>
	<?php
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Policies', true), array('action' => 'index'));?></li>
	</ul>
</div>