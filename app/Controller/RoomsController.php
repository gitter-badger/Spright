<?php
App::uses('AppController', 'Controller');

/**
 * Rooms Controller
 *
 * @property Room $Room
 * @property PaginatorComponent $Paginator
 */
class RoomsController extends AppController {




/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Session','RequestHandler');


		public function getrooms() {


		if(isset($_GET['data']['Job']['building_id'])):
			
			$building_id = $this->request->query('data.Job.building_id');
		endif;


		$json = $this->Room->find('list', array(
			'conditions' => array('building_id' => $building_id),
			'recursive' => -1
			));

		if(sizeof($json)>=1){
	$json = array('0' => '--') + $json;
	$this->set('json', $json);
	$this->set('_serialize', 'json');			
		}


	}


/**
 * index method
 *
 * @return void
 */
	public function index() {


		$this->Room->recursive = 0;
		$this->set('rooms', $this->Paginator->paginate());
		$this->set('_serialize', array('rooms'));

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Room->exists($id)) {
			throw new NotFoundException(__('Invalid room'));
		}
		$options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
		$this->set('room', $this->Room->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Room->create();
			if ($this->Room->save($this->request->data)) {
				$this->Session->setFlash(__('The room has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The room could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$buildings = $this->Room->Building->find('list');
		$floors = $this->Room->Floor->find('list');
		$roomtypes = $this->Room->Roomtype->find('list');
		$this->set(compact('buildings', 'floors', 'roomtypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Room->exists($id)) {
			throw new NotFoundException(__('Invalid room'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Room->save($this->request->data)) {
				$this->Session->setFlash(__('The room has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The room could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
			$this->request->data = $this->Room->find('first', $options);
		}
		$buildings = $this->Room->Building->find('list');
		$floors = $this->Room->Floor->find('list');
		$roomtypes = $this->Room->Roomtype->find('list');
		$this->set(compact('buildings', 'floors', 'roomtypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Room->id = $id;
		if (!$this->Room->exists()) {
			throw new NotFoundException(__('Invalid room'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Room->delete()) {
			$this->Session->setFlash(__('The room has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The room could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
