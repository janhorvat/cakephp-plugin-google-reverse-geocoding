<?php

class StoresController extends StoresAppController {	

	public function index() {	
		$this->set('stores', $this->paginate(null, $this->Filter->process()));
	}
	
	public function view($id = null) {
		$this->Store->id = $id;
		if (!$this->Store->exists()) {
			throw new NotFoundException(__('Invalid store'));
		}
		
		$this->Store->recursive = 0;
		$store = $this->Store->read(null, $id);
		$this->set('store', $store);
	}
	
	public function map() {		
		$this->set('center_map', '46.0556, 14.5083'); //this value is for Ljubljana, Slovenia
		$this->set('zoom_level', '15'); 
		$this->set('marker_icon', 'http://labs.google.com/ridefinder/images/mm_20_blue.png');
		$this->set('stores', $this->Store->find('all'));
	}	
		
	public function add() {
		if ($this->request->is('post')) {
			$this->Store->create();
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store could not be saved. Please, try again.'), 'flash_error');
			}
		}
	}
	
	public function edit($id = null) {
		$this->Store->id = $id;
		if (!$this->Store->exists()) {
			throw new NotFoundException(__('Invalid store'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$this->request->data = $this->Store->read(null, $id);
		}
	}
	
	public function delete($id = null) {
		$this->Store->id = $id;
		if (!$this->Store->exists()) {
			throw new NotFoundException(__('Invalid store'));
		}
		if ($this->Store->delete()) {
			$this->Session->setFlash(__('Store deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Store was not deleted'), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		if(isset($this->FrontAuth)) {
			$this->FrontAuth->allow(array('index', 'view', 'map', 'add', 'edit', 'delete'));
		}
	}
	
}
