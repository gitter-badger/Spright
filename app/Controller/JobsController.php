<?php
App::uses('AppController', 'Controller');
/**
 * Jobs Controller
 *
 * @property Job $Job
 * @property PaginatorComponent $Paginator
 */
class JobsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');




/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Job->recursive = 0;
		
$this->Paginator->settings=array(
              'limit'=>10
       );
		
		
		
		$this->set('jobs', $this->Paginator->paginate());
	}


            public function getJobs() {



     $this->paginate = array(
        'fields' => array('Job.id','Job.fullname','Building.code','Room.code','Statustype.code'),
        'contain' => array('Room','Building','Statustype')
    );
     $this->DataTable->mDataProp = true;
    $this->set('response', $this->DataTable->getResponse());
    $this->set('_serialize','response');
 
    }




	public function dashboard() {
		$this->Job->recursive = 0;
		$this->set('jobs', $this->Paginator->paginate());
	}

public function workplanner() {
		$this->Job->recursive = 0;
		$this->set('jobs', $this->Paginator->paginate());
	}


public function schedule() {
	   $this->autoRender = false;

	   debug($_POST['sort']);

    if($this->RequestHandler->isAjax())
    {
      /*  foreach($_GET['item'] as $order => $id)
            $this->Feature->id = $id;
            $this->Feature->saveField('priority', $order);
        }*/
    }	}



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__('Invalid job'));
		}
		$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
		$this->set('job', $this->Job->find('first', $options));
	}
	
	
		public function getJob($id = null) {
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__('Invalid job'));
		}
		$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
		$this->set('job', $this->Job->find('first', $options));
		
		$this->set('_serialize','job');
	}
	
	

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
		    
		    
		    //Lets figure out what job template to use, I couldn't think of an elegant way to do this.

		   $qs1 = $this->request->data['Job']['qs1ID'];
		   $qs2 = $this->request->data['Job']['qs2ID'];
		   $qs3 = $this->request->data['Job']['qs3ID'];
		   $qs4 = $this->request->data['Job']['qs4ID'];
		   $qs5 = $this->request->data['Job']['qs5ID'];
		   
		    if ($qs5):
		        $templateID = $qs5;
		    elseif($qs4):
		        $templateID = $qs4;
		    elseif($qs3):
		        $templateID = $qs3;
		    elseif($qs2):
		        $templateID = $qs2;
		    else:
		        $templateID = $qs1;
		    endif;

		    echo "TemplateID = " .$templateID;

			$this->request->data['Job']['statustype_id'] = 1;
			$this->request->data['Job']['jobtype_id'] = 1;
			$this->Job->create();
		
			if ($this->Job->save($this->request->data)) {

/*
            $this->loadModel('Jobtemplate');
            $row = $this->Model->find('all', array('conditions' => array('jobtemplate_id' => 	$this->request->data['Job']['jobtype_id'] )));
            $this->Model->create(); // Create a new record
            $this->Model->save($row); // And save it*/ 

				$this->Session->setFlash(__('Your job has been raised'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$users = $this->Job->User->find('list');
		$jobtypes = $this->Job->Jobtype->find('list');
		$buildings = $this->Job->Building->find('list'); 
		$statustypes = $this->Job->Statustype->find('list');
		//$questions = $this->Job->Question->find('list',array('conditions' => array('parent_id' => 0),array(

          //          'fields'     => array('Question.code','Question.code'))));
		$this->set(compact('users', 'jobtypes', 'rooms', 'statustypes','buildings'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__('Invalid job'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__('The job has been saved.'), 'default', array('class' => 'alert alert-success'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
			$this->request->data = $this->Job->find('first', $options);
		}
		$users = $this->Job->User->find('list');
		$jobtypes = $this->Job->Jobtype->find('list');
		$rooms = $this->Job->Room->find('list');
		$buildings = $this->Job->Building->find('list');
		$statustypes = $this->Job->Statustype->find('list');
		$this->set(compact('users', 'jobtypes', 'rooms', 'statustypes','buildings'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Invalid job'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Job->delete()) {
			$this->Session->setFlash(__('The job has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The job could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
