<?php
App::uses('AppController', 'Controller');
/**
 * Buildings Controller
 *
 * @property Building $Building
 * @property PaginatorComponent $Paginator
 */
class BuildingsController extends AppController {

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
		$this->Building->recursive = 0;
		$this->set('buildings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Building->exists($id)) {
			throw new NotFoundException(__('Invalid building'));
		}
		$options = array('conditions' => array('Building.' . $this->Building->primaryKey => $id));
		$this->set('building', $this->Building->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Building->create();
			if ($this->Building->save($this->request->data)) {
				$this->Session->setFlash(__('The building has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The building could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$departments = $this->Building->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Building->exists($id)) {
			throw new NotFoundException(__('Invalid building'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Building->save($this->request->data)) {
				$this->Session->setFlash(__('The building has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The building could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Building.' . $this->Building->primaryKey => $id));
			$this->request->data = $this->Building->find('first', $options);
		}
		$departments = $this->Building->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Building->id = $id;
		if (!$this->Building->exists()) {
			throw new NotFoundException(__('Invalid building'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Building->delete()) {
			$this->Session->setFlash(__('The building has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The building could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
