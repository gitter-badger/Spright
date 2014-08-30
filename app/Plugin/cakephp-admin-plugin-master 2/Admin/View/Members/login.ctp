<?php
$formOptions = array(
	'class' => 'form-signin',
	'role' => 'form',
	'inputDefaults' => array(
		'div' => false,
		'label' => false,
		'class' => 'form-control'
	)
);
?>

<?php echo $this->Form->create('Member', $formOptions); ?>
	<?php print $this->Session->flash('flash'); ?>
	<h2 class="form-signin-heading">Please sign in</h2>
	<?php 
		echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'user@example.com', 'required', 'autofocus'));
		echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required'));
	?>
	<label class="checkbox">
		<input type="checkbox" value="remember-me"> Remember me
	</label>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<?php echo $this->Form->end(); ?>