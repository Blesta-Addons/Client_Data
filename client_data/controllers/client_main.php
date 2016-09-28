<?php
/**
 */
class CLientMain extends ClientDataController 
{
	
	/**
	 * Pre-action
	 */
	public function preAction() 
	{
		parent::preAction();
		// Get Client ID
		$this->client_id = $this->Session->read("blesta_client_id");
	}
	
	/**
	 * index
	 */
	public function index() 
	{
		// Normally Nothing		
		return false;
	}
	
	/**
	 * Get Tickets Count By Status
	 */
	public function count_tickets() 
	{
		// Ensure a valid Status
		if (isset($this->get[0])) {
			$status = $this->get[0];
		} else {
			$status = "open";
		}

		if ($this->isAjax()) {
			// Load Model Only When we Need it !!!
			$this->uses(["SupportManager.SupportManagerTickets"]);
			
			$response = $this->SupportManagerTickets->getStatusCount($status, null, $this->client_id);
			// JSON encode the AJAX response
			$this->outputAsJson($response);
			return false;		
		}
		
		return false;
	}
	
	/**
	 * Get Services Count
	 */
	public function count_services() 
	{
		// Ensure a valid Status
		if (isset($this->get[0])) {
			$status = $this->get[0];
		} else {
			$status = "active";
		}

		if ($this->isAjax()) {
			// Load Model Only When we Need it !!!	
			$this->uses(["Services"]);
			
			$response = $this->Services->getListCount($this->client_id, $status, false);
			// JSON encode the AJAX response			
			$this->outputAsJson($response);
			return false;		
		}
		
		return false;
	}
	
	/**
	 * Get Invoices Count
	 */
	public function count_invoices() 
	{
		// Ensure a valid Status
		if (isset($this->get[0])) {
			$status = $this->get[0];
		} else {
			$status = "open";
		}

		if ($this->isAjax()) {
			// Load Model Only When we Need it !!!	
			$this->uses(["Invoices"]);
			
			$response = $this->Invoices->getListCount($this->client_id, $status);
			// JSON encode the AJAX response			
			$this->outputAsJson($response);
			return false;		
		}
		
		return false;
	}		
}
