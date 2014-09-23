<?php
App::uses('AppController', 'Controller');
/**
 * Codes Controller
 *
 * @property Code $Code
 * @property PaginatorComponent $Paginator
 */
class CodesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Code->recursive = 0;
		$this->set('codes', $this->Paginator->paginate());
	}

	public function location() {
		//BLANK
	}

	/*
	 *
	 ** JSON FUNCTIONS
	 *
	 */

	public function viewLocations($id = null) {

		if ($id != null):
			if (!$this->Code->exists($id)) {
				throw new NotFoundException(__('Invalid code'));
			}
		endif;

		$this->Code->recursive = -1;
		$options               = array('conditions' => array('Code.id' => $id));
		$json                  = $this->Code->find('first', $options);
		$json                  = Set::extract('/Code/.', $json);
		$json                  = $this->set('json', $json);

		//	$json = Hash::extract($json, '{n}.Code');

		$this->set('_serialize', 'json');
	}

	function buildLocations() {

		$this->Code->recursive = -1;
		if (isset($_GET['node'])):

			$locations = $this->Code->find('all', array('conditions' => array('Code.parent_id' => $_GET['node']),
					'fields'                                                                         => array('code', 'id', 'parent_id', 'load_on_demand', 'description'),
					'order' => array('lft ASC')
				));
		else:

			$locations = $this->Code->find('all', array('conditions' => array('Code.parent_id' => 1),
					'fields'                                                                         => array('code', 'id', 'parent_id', 'load_on_demand'),
					'order' => array('lft ASC')
				));
		endif;

		$results = Hash::extract($locations, '{n}.Code');

		$results = Hash::nest($results, ['idPath' => '{n}.id', 'parentPath' => '{n}.parent_id', 'root' => '0']);

		$results = $this->set('json', $results);

		$this->set('_serialize', 'json');

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

		if ($id != null):
			if (!$this->Code->exists($id)) {
				throw new NotFoundException(__('Invalid code'));
			}
		endif;

		$options = array('conditions' => array('Code.' . $this->Code->primaryKey => $id));
		$this->set('code', $this->Code->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */

	public function saveCode() {

		$this->autoRender = false;

		//GET Variables
		$locationCode = $this->request->query['location'];
		$parent_id    = $this->request->query['parent_id'];

		$this->request->data['Code']['code']        = $locationCode;
		$this->request->data['Code']['parent_id']   = $parent_id;
		$this->request->data['Code']['codetype_id'] = 0;

		//Lets save it now but only if this request is via a GET request
		if ($this->request->is('get')) {

			$this->Code->save($this->request->data);

			echo $this->Code->getLastInsertID();

		}

	}

	public function deleteCode() {

		$this->autoRender = false;

		//GET Variables

		$node = $this->request->query['node'];

		//	if (!$this->Code->exists()) {
		//		throw new NotFoundException(__('Invalid code'));
		//	}

		//Lets save it now but only if this request is via a GET request
		if ($this->request->is('get')) {

			$this->Code->id = $node;
			$this->Code->delete();

		}

	}

	public function add($id = 0) {

		if ($id != null):
			if (!$this->Code->exists($id)) {
				throw new NotFoundException(__('Invalid code'));
			}
		endif;
		$this->request->data['Code']['parent_id'] = $id;

		if ($this->request->is('post')) {

			$this->Code->create();
			if ($this->Code->save($this->request->data)) {
				$this->Session->setFlash(__('The code has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect('/space');
			} else {
				$this->Session->setFlash(__('The code could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$codetypes = $this->Code->Codetype->find('list');
		$this->set(compact('parentCodes', 'codetypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Code->exists($id)) {
			throw new NotFoundException(__('Invalid code'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Code->save($this->request->data)) {
				$this->Session->setFlash(__('The code has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options             = array('conditions' => array('Code.' . $this->Code->primaryKey => $id));
			$this->request->data = $this->Code->find('first', $options);
		}
		$parentCodes = $this->Code->ParentCode->find('list');
		$codetypes   = $this->Code->Codetype->find('list');
		$this->set(compact('rooms', 'codetypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Code->id = $id;
		if (!$this->Code->exists()) {
			throw new NotFoundException(__('Invalid code'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Code->delete()) {
			$this->Session->setFlash(__('The code has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The code could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * Asset Management
	 *
	 */

	public function assetindex() {
		$this->Code->recursive = 0;

		$this->Paginator->settings = array(
			'limit' => 10, 'conditions' => array('Code.codetype_id' => 5));
		$this->set('codes', $this->Paginator->paginate());
	}

	public function assetcreate() {

		if ($this->request->is('post')) {

			$this->request->data['Code']['codetype_id'] = 5;
			$this->request->data['Code']['parent_id']   = $this->request->data['Code']['room_id'];
			debug($this->request->data);
			$this->Code->create();
			if ($this->Code->save($this->request->data)) {
				$this->Session->setFlash(__('Success! Asset created'), 'default', array('class' => 'alert alert-success'));

			} else {
				$this->Session->setFlash(__('The Asset could not be created. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

	public function assetview($id = null) {

		if ($id != null):
			if (!$this->Code->exists($id)) {
				throw new NotFoundException(__('Invalid code'));
			}
		endif;

		if ($this->request->is('post')) {
			debug($this->request->data);
			if ($this->Code->save($this->request->data)) {
				$this->Session->setFlash(__('The code has been saved.'), 'default', array('class' => 'alert alert-success'));
				//return $this->redirect(array('action' => 'assetview/' . $id));
			} else {
				$this->Session->setFlash(__('The code could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {

			$options             = array('conditions' => array('Code.' . $this->Code->primaryKey => $id));
			$this->request->data = $this->Code->find('first', $options);

		}

	}

	public function upload() {

		$this->autoRender = false;
		// A list of permitted file extensions
		$allowed = array('png', 'jpg', 'gif', 'pdf', 'jpeg');
		$temp    = explode(".", $_FILES["file"]["name"]);

		if (isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {

			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

			if (!in_array(strtolower($extension), $allowed)) {
				echo '{"status":"error"}';
				exit;
			}

			$renamed = $this->params['controller'] . "_" . $_POST['foreign_key'] . "_" . rand(1, 99999) . "." . $extension;

			if (move_uploaded_file($_FILES['upl']['tmp_name'], 'files/' . $renamed)) {

				$this->loadModel('Attachment');

				$this->request->data['Attachment']['model']       = $this->params['controller'];
				$this->request->data['Attachment']['foreign_key'] = $_POST['foreign_key'];
				$this->request->data['Attachment']['name']        = $_FILES['upl']['name'];
				$this->request->data['Attachment']['size']        = $_FILES['upl']['size'];
				$this->request->data['Attachment']['type']        = $_FILES['upl']['type'];
				$this->request->data['Attachment']['attachment']  = $renamed;

				$this->Attachment->save($this->request->data);

				echo '{"status":"success"}';
				exit;
			}
		}

		echo '{"status":"error"}';
	}

	function attachmentDelete($id = null) {

		if (!$this->Code->exists($id)) {
			throw new NotFoundException(__('Invalid ID'));
		} else {

			$this->Code->id = $id;
			$this->Code->delete();

		}

	}

	//JSON VALIDATION

	function validAsset() {

		$value = $this->request->data['Code']['code'];

		$conditions = array(
			'Code.code' => $value,
		);

		if ($this->Code->hasAny($conditions)) {
			$isAvailable = false;
		} else {
			$isAvailable = true;
		}

		$results = $this->set('json', array(
				'valid' => $isAvailable,
			));

		$this->set('_serialize', 'json');

	}

}
