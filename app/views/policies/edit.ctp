<div class="policies form">
<?php echo $this->Form->create('Policy');?>
	<fieldset>
		<legend><?php __('Edit Policy'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('group_id');
		echo $this->Form->input('empresa_id');
		echo $this->Form->input('policies_path');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('status');
		echo $this->Form->input('current_date_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Policy.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Policy.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Policies', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>