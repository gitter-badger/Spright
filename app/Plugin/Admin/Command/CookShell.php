<?php

class CookShell extends AppShell {
	
	public $tasks = array('Plugin', 'Model', 'Controller', 'View', 'Template', 'Bake');
	
	protected $availablePlugins = array('Admin', 'Api', 'Facebook');
	
	public function getOptionParser() {
		$parser = parent::getOptionParser();
		
		$parser->addArguments(array(
			'Plugin' => array('help' => 'Plugin name you want to Cook', 'required' => true, 'choices' => $this->availablePlugins),
			'Model' => array('help' => 'Model name to Cook'),
		));
		
		$parser->addOptions(array(
			'alias' => array('help' => 'Optional name for the resulting plugin', 'short' => 'a', 'default' => null)
		));
		
		return $parser;
	}
	
	public function main() {
		
		$this->out('CookShell :)');
		
		$plugin = $this->args[0];
		$alias = isset($this->params['alias']) ? $this->params['alias'] : $plugin;
		
		if( !isset($this->args[1]) ) {
			$this->_cookPlugin($plugin, $alias);
			return;
		}
		
		$model = $this->args[1];
		
		$this->_cookModel($plugin, $model, $alias);
	}
	
	private function _cookPlugin($plugin, $alias) {
		
		$this->out('Generate Plugin: ' . $alias);
		$this->hr();
		
		// Cook Plugin Skel
		$this->Plugin->args = array($alias);
		$this->Plugin->execute();
		return;
		
		// Cook Plugin Code
		$this->Template->set(array(
			'plugin' => $alias
		));
		
		$this->Bake->plugin = $alias;
		$contents = $this->Template->generate('skel', 'controller');
		$path = $this->Bake->getPath();
		$filename = $path . $plugin . 'AppController.php';
		$this->out('Generate in path: ' . $path . ' file: ' . $filename);
		$this->createFile($filename, $contents);
	}
	
	private function _cookModel($plugin, $model, $alias) {
		
		$this->out('Generate ' . $model . ' in plugin [' . $alias . ']');
		$this->out('Model: ' . $model);
		$this->hr();
		
		// Cook Model
		$this->Model->args = array($model);
		$this->Model->execute();
		
		// Cook Controller
		$this->Controller->args = array($model);
		$this->Controller->params = array('public' => true, 'admin' => false);
		$this->Controller->plugin = $alias;
		$this->Controller->execute();
		
		// Cook Views
		$this->View->args = array($model);
		$this->View->plugin = $alias;
		$this->View->execute();
	}
	
}