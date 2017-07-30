<?php

class Controller
{
	private $model;
	private $view;
		
	private $mArray = array();
	private $options = array();

	public function __construct()
	{
	    $this->model = new Model();
		$this->view = new View(TEMPLATE);
	}

	public function run()
	{
		/**
		*
		* @var type array
		* array with data to select options
		*/
		$this->options = array(0 => 'Just hello',
		  					   1 => 'Complaint',
							   2 => 'Proposition');

		$this->model->getOptions($this->options)->getOptionsBlock();
		
		if(isset($_POST['email']))
		{
			$formData = $_POST['email'];
			$this->pageSendMail($formData);
		}
		else
		{
			$this->pageDefault();
		}
		$this->view->templateRender();
	}

	private function pageSendMail($formData)
	{
		if($this->model->checkForm($formData) === true)
		{
			if($this->model->sendEmail($formData))
			{
				$this->model->clearForm();
				$this->model->setStatusMsg(SUCCESS_MAIL);
			}
			else
			{
				$this->model->setStatusMsg(FAILED_MAIL);
			}
		}
		$mArray = $this->model->getArray($this->options);
	    $this->view->addToReplace($mArray);	
	}	

	private function pageDefault()
		{   
		   $mArray = $this->model->getArray($this->options);
	       $this->view->addToReplace($mArray);			   
		}				
}
