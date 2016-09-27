<?php
/**
 * Client Data plugin handler
 */
class ClientDataController extends AppController 
{
	public function preAction() {
		$this->structure->setDefaultView(APPDIR);
		parent::preAction();

		// Override default view directory
		$this->view->view = "default";
		$this->orig_structure_view = $this->structure->view;
		$this->structure->view = "default";
	}
}