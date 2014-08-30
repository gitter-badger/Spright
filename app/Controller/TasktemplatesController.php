<?php
App::uses('AppController', 'Controller');
/**
 * Tasktemplates Controller
 *
 * @property Tasktemplate $Tasktemplate
 * @property PaginatorComponent $Paginator
 */
class TasktemplatesController extends AppController {

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
		$this->Tasktemplate->recursive = 0;
		$this->set('tasktemplates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tasktemplate->exists($id)) {
			throw new NotFoundException(__('Invalid tasktemplate'));
		}
		$options = array('conditions' => array('Tasktemplate.' . $this->Tasktemplate->primaryKey => $id));
		$this->set('tasktemplate', $this->Tasktemplate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tasktemplate->create();
			if ($this->Tasktemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The tasktemplate has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tasktemplate could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$jobtemplates = $this->Tasktemplate->Jobtemplate->find('list');
		$this->set(compact('jobtemplates'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tasktemplate->exists($id)) {
			throw new NotFoundException(__('Invalid tasktemplate'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tasktemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The tasktemplate has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tasktemplate could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Tasktemplate.' . $this->Tasktemplate->primaryKey => $id));
			$this->request->data = $this->Tasktemplate->find('first', $options);
		}
		$jobtemplates = $this->Tasktemplate->Jobtemplate->find('list');
		$this->set(compact('jobtemplates'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tasktemplate->id = $id;
		if (!$this->Tasktemplate->exists()) {
			throw new NotFoundException(__('Invalid tasktemplate'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tasktemplate->delete()) {
			$this->Session->setFlash(__('The tasktemplate has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The tasktemplate could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
