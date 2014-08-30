<?php
App::uses('AppController', 'Controller');
/**
 * Jobtypes Controller
 *
 * @property Jobtype $Jobtype
 * @property PaginatorComponent $Paginator
 */
class JobtypesController extends AppController {

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
		$this->Jobtype->recursive = 0;
		$this->set('jobtypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Jobtype->exists($id)) {
			throw new NotFoundException(__('Invalid jobtype'));
		}
		$options = array('conditions' => array('Jobtype.' . $this->Jobtype->primaryKey => $id));
		$this->set('jobtype', $this->Jobtype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Jobtype->create();
			if ($this->Jobtype->save($this->request->data)) {
				$this->Session->setFlash(__('The jobtype has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobtype could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Jobtype->exists($id)) {
			throw new NotFoundException(__('Invalid jobtype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Jobtype->save($this->request->data)) {
				$this->Session->setFlash(__('The jobtype has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobtype could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Jobtype.' . $this->Jobtype->primaryKey => $id));
			$this->request->data = $this->Jobtype->find('first', $options);
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
		$this->Jobtype->id = $id;
		if (!$this->Jobtype->exists()) {
			throw new NotFoundException(__('Invalid jobtype'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Jobtype->delete()) {
			$this->Session->setFlash(__('The jobtype has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The jobtype could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
