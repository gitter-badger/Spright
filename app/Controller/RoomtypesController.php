<?php
App::uses('AppController', 'Controller');
/**
 * Roomtypes Controller
 *
 * @property Roomtype $Roomtype
 * @property PaginatorComponent $Paginator
 */
class RoomtypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Roomtype->recursive = 0;
		$this->set('roomtypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Roomtype->exists($id)) {
			throw new NotFoundException(__('Invalid roomtype'));
		}
		$options = array('conditions' => array('Roomtype.' . $this->Roomtype->primaryKey => $id));
		$this->set('roomtype', $this->Roomtype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Roomtype->create();
			if ($this->Roomtype->save($this->request->data)) {
				$this->Session->setFlash(__('The roomtype has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The roomtype could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Roomtype->exists($id)) {
			throw new NotFoundException(__('Invalid roomtype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Roomtype->save($this->request->data)) {
				$this->Session->setFlash(__('The roomtype has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The roomtype could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Roomtype.' . $this->Roomtype->primaryKey => $id));
			$this->request->data = $this->Roomtype->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Roomtype->id = $id;
		if (!$this->Roomtype->exists()) {
			throw new NotFoundException(__('Invalid roomtype'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Roomtype->delete()) {
			$this->Session->setFlash(__('The roomtype has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The roomtype could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
