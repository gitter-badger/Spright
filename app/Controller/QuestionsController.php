<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */
class QuestionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');




		public function getquestion() {

		if(isset($_GET['data']['Job']['qs1'])):
			$question_id = $_GET['data']['Job']['qs1'];
		endif;

		if(isset($_GET['data']['Job']['qs2'])):
			$question_id = $_GET['data']['Job']['qs2'];
		endif;

		if(isset($_GET['data']['Job']['qs3'])):
			$question_id = $_GET['data']['Job']['qs3'];
		endif;

		if(isset($_GET['data']['Job']['qs4'])):
			$question_id = $_GET['data']['Job']['qs4'];
		endif;

		if(isset($_GET['data']['Job']['qs5'])):
			$question_id = $_GET['data']['Job']['qs5'];
		endif;


		$json = $this->Question->find('list', array(
			'conditions' => array('parent_id' => $question_id),
			'recursive' => -1
			));



		if(sizeof($json)>=1){
	$json = array('0' => '--') + $json;

	}

		$this->set('json', $json);
	$this->set('_serialize', 'json');

}

/**
 * index method
 *
 * @return void
 */
	function index() {
 $Questionlist = $this->Question->generateTreeList(null,null,null," - ");
 $this->set(compact('Questionlist'));
 }
 
 
 function buildQuestion(){
     
     
     
     if(isset($_GET['node'])):
         
                          $questions = $this->Question->find('all', array('conditions' => array('Question.parent_id' => $_GET['node']),
    'fields' => array('label', 'id', 'parent_id','load_on_demand'),
    'order' => array('lft ASC') 
));
         

         else:
             
                 $questions = $this->Question->find('all', array(
    'fields' => array('label', 'id', 'parent_id','load_on_demand'),
    'order' => array('lft ASC') 
));
endif;

         
   //$questions = Set::extract('/Question/.', $questions);
$results = Hash::extract($questions, '{n}.Question');

//First attempt
//$results = Hash::nest($results, ['idPath' => '{n}.id', 'parentPath' => '{n}.parent_id']);

//Second attempt
$results = Hash::nest($results, ['idPath' => '{n}.id', 'parentPath' => '{n}.parent_id', 'root' => '0']);



$results =	$this->set('json', $results);

$this->set('_serialize', 'json');
     
 }
 
 
function add() {
 if (!empty($this->data)) {
 $this->Question->save($this->data);
 $this->redirect(array('action'=>'index'));
 } else {
 $parents[0] = "[ No Parent ]";
 $Questionlist = $this->Question->generateTreeList(null,null,null," - ");
 if($Questionlist){
 foreach ($Questionlist as $key=>$value){
 $parents[$key] = $value;
 }
 $this->set(compact('parents'));
 }
 }
 }
 
function edit($id=null) {
 if (!empty($this->data)) {
 if($this->Question->save($this->data)==false)
 $this->Session->setFlash('Error saving Question.');
 $this->redirect(array('action'=>'index'));
 } else {
 if($id==null) die("No ID received");
 $this->data = $this->Question->read(null, $id);
 $parents[0] = "[ No Parent ]";
 $Questionlist = $this->Question->generatetreelist(null,null,null," - ");
 if($Questionlist)
 foreach ($Questionlist as $key=>$value)
 $parents[$key] = $value;
 $this->set(compact('parents'));
 }
 }
 
function delete($id=null) {
 if($id==null)
 die("No ID received");
 $this->Question->id=$id;
 if($this->Question->delete()==false)
 $this->Session->setFlash('The Question could not be deleted.');
 $this->redirect(array('action'=>'index'));
 }
 
function moveup($id=null) {
 if($id==null)
 die("No ID received");
 $this->Question->id=$id;
 if($this->Question->moveup()==false)
 $this->Session->setFlash('The Question could not be moved up.');
 $this->redirect(array('action'=>'index'));
 }
 
function movedown($id=null) {
 if($id==null)
 die("No ID received");
 $this->Question->id=$id;
 if($this->Question->movedown()==false)
 $this->Session->setFlash('The Question could not be moved down.');
 $this->redirect(array('action'=>'index'));
 }
 function removeNode($id=null){
 if($id==null)
 die("Nothing to Remove");
 if($this->Question->removeFromTree($id)==false)
 $this->Session->setFlash('The Question can\'t be removed.');
 $this->redirect(array('action'=>'index'));
 }
 
}
