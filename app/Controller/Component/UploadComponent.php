<?php

App::uses('Component', 'Controller');
class UploadComponent extends Component {
	public function uploadOperation(Controller $controller) {

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

				$this->Attachment = ClassRegistry::init('Attachment');

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

}

?>