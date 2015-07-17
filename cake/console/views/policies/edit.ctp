<div class="policies form">
<?php echo $this->Form->create('Policy');?>
	<fieldset>
		<legend><?php __('Edit Policy'); ?></legend>
	<?php
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Policy.')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Policy.'))); ?></li>
		<li><?php echo $this->Html->link(__('List Policies', true), array('action' => 'index'));?></li>
	</ul>
</div>