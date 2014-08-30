<?php
App::uses('AppController', 'Controller');
/**
 * JobsJobtemplates Controller
 *
 * @property JobsJobtemplate $JobsJobtemplate
 * @property PaginatorComponent $Paginator
 */
class JobsJobtemplatesController extends AppController {

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
		$this->JobsJobtemplate->recursive = 0;
		$this->set('jobsJobtemplates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->JobsJobtemplate->exists($id)) {
			throw new NotFoundException(__('Invalid jobs jobtemplate'));
		}
		$options = array('conditions' => array('JobsJobtemplate.' . $this->JobsJobtemplate->primaryKey => $id));
		$this->set('jobsJobtemplate', $this->JobsJobtemplate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->JobsJobtemplate->create();
			if ($this->JobsJobtemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The jobs jobtemplate has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobs jobtemplate could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$jobs = $this->JobsJobtemplate->Job->find('list');
		$jobtemplates = $this->JobsJobtemplate->Jobtemplate->find('list');
		$this->set(compact('jobs', 'jobtemplates'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->JobsJobtemplate->exists($id)) {
			throw new NotFoundException(__('Invalid jobs jobtemplate'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->JobsJobtemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The jobs jobtemplate has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobs jobtemplate could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('JobsJobtemplate.' . $this->JobsJobtemplate->primaryKey => $id));
			$this->request->data = $this->JobsJobtemplate->find('first', $options);
		}
		$jobs = $this->JobsJobtemplate->Job->find('list');
		$jobtemplates = $this->JobsJobtemplate->Jobtemplate->find('list');
		$this->set(compact('jobs', 'jobtemplates'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->JobsJobtemplate->id = $id;
		if (!$this->JobsJobtemplate->exists()) {
			throw new NotFoundException(__('Invalid jobs jobtemplate'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->JobsJobtemplate->delete()) {
			$this->Session->setFlash(__('The jobs jobtemplate has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The jobs jobtemplate could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
