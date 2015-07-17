<?php //users?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active">
				<a href="#">Usuarios
					<span class="sr-only">(current)</span>
				</a>
			</li>
            <li>
				<?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?>
			</li>
            <li>
				<?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?>
			</li>
            <li>
				<?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?>
			</li>
          </ul>

          <ul class="nav nav-sidebar">
            <li>
				<?php echo $this->Html->link(__('List Posts', true), array('controller' => 'posts', 'action' => 'index')); ?>
			</li>
            <li>
				<?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add')); ?>
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?php __('Users');?></h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
					<th><?php echo $this->Paginator->sort('id');?></th>
					<th><?php echo $this->Paginator->sort('username');?></th>
					<th><?php echo $this->Paginator->sort('password');?></th>
					<th><?php echo $this->Paginator->sort('group_id');?></th>
					<th><?php echo $this->Paginator->sort('created');?></th>
<!-- 					<th><?php echo $this->Paginator->sort('modified');?></th> -->
<!-- 					<th><?php echo $this->Paginator->sort('status');?></th> -->
<!-- 					<th><?php echo $this->Paginator->sort('current_date_time');?></th> -->
					<th><?php echo $this->Paginator->sort('last_access');?></th>
					<th class="actions" colspan="3"><?php __('Actions');?></th>
                </tr>
              </thead>
              <tbody>
					<?php
					$i = 0;
					foreach ($users as $user):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="altrow"';
						}
					?>
					<tr<?php echo $class;?>>
						<td><?php echo $user['User']['id']; ?>&nbsp;</td>
						<td><?php echo $user['User']['username']; ?>&nbsp;</td>
						<td><?php echo $user['User']['password']; ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
						</td>
						<td><?php echo $user['User']['created']; ?>&nbsp;</td>
<!-- 						<td><?php echo $user['User']['modified']; ?>&nbsp;</td> -->
<!-- 						<td><?php echo $user['User']['status']; ?>&nbsp;</td> -->
<!-- 						<td><?php echo $user['User']['current_date_time']; ?>&nbsp;</td> -->
						<td><?php echo $user['User']['last_access']; ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
						</td>
					</tr>
					<?php endforeach; ?>
              </tbody>
            </table>

				<p>
					<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
					));
					?>	
				</p>

				<div class="paging">
					<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
					| 
					<?php echo $this->Paginator->numbers();?>
					<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
				</div>
          </div>
        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->