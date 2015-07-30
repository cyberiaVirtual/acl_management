<div class="policies view">
<h2><?php  __('Policy');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Policy', true), array('action' => 'edit', $policy['Policy'][''])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Policy', true), array('action' => 'delete', $policy['Policy']['']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policy['Policy'][''])); ?> </li>
		<li><?php echo $this->Html->link(__('List Policies', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policy', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
