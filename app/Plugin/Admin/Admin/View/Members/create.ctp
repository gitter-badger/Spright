<?php

$formOptions = array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'class' => 'form-control'
	)
);

$formFields = array(
	'name',
	'email',
	'password' => array('placeholder' => 'password'),
	'status' => array('value' => 1)
)

?>

<h1 class="page-header">Create Member</h1>
<?php echo $this->Form->create('Member', $formOptions); ?>
	<?php 
		foreach($formFields as $field => $options) {
			if( !is_array($options) ) {
				$field = $formFields[$field];
				$options = array();
			}
			echo $this->Form->input($field, $options);
		}
		echo $this->Form->submit('Create', array('class' => 'btn btn-primary'));
	?>
<?php echo $this->Form->end(); ?>