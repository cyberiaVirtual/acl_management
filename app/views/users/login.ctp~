<?php //Login?>
<!-- <h2>Login</h2> -->
  <div class="wrapper">
	
	<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' =>'login'),
								    'class'=>'form-signin')
								   );
	?>
      <h2 class="form-signin-heading"><?php e(languaje($languaje)['loginTitle']);?></h2>
		<?php
		    // use number_id too
			e($form->input('User.number_id',
					array(
						'type'=>'text',
						'label'=>false,
						'class'=>'form-control',
						'placeholder'=>(languaje($languaje)['loginUser']),
						'required'=>'',
						'autofocus'=>''
					)
				)
			);
		?>
		<?php
			e($form->input('User.password',
					array(
						'type'=>'password',
						'label'=>false,
						'class'=>'form-control',
						'placeholder'=>(languaje($languaje)['loginPassword']),
						'required'=>'',
						'autofocus'=>''
					)
				)
			);
		?>
      <p></p>
      <button class="btn btn-lg btn-primary btn-block" type="submit"><?php e(languaje($languaje)['loginButton']);?></button>
    </form>
  </div>

<?php echo $this->Session->flash('auth'); ?>