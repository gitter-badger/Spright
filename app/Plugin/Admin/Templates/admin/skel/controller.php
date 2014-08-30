<?php echo "<?php\n\n";
echo "App::uses('AppController', 'Controller');\n\n";
?>
class <?php echo $plugin; ?>AppController extends AppController {
	
	public $uses = array('<?php echo $plugin; ?>.Member');
	
	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => '/<?php echo $plugin; ?>/dashboard',
			'logoutRedirect' => '/<?php echo $plugin; ?>/login',
			'loginAction' => '/<?php echo $plugin; ?>/login',
		)
	);
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->authenticate = array(
			AuthComponent::ALL => array(
				'userModel' => '<?php echo $plugin; ?>.Member', 
				'fields' => array('username' => 'email')
			),
			'Form'
		);
	}
	
	public function setFlash($message, $type = 'info') {
		if( $type === 'error' ) $type = 'danger';
		$this->Session->setFlash( $message, 'flash', array('type' => $type) );
	}
	
	public function index() {
		
	}
	
}