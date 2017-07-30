<?php 

class Model
{
	private $mail = array();
	private $options = array();
	private $warningPlaceholder = array('%errEmptyField%' => '',
							  '%errFullName%' => '',
							  '%errEmail%' => '',
							  '%errMessage%' => '',
							  '%errSubject%' => '',
							  '%formStatus%' => '');

	private $optionBlockPlaceholder = array('%options%' => '');

	private $formInputPlaceholders = array('%fullname%' => '',
										   '%email%' => '',
										   '%message%' =>'');

	private $globalPlaceholders = array('%TITLE%' => TITLE);

	
	
	public function getOptions(array $options)
	{
		$this->options = $options;
		return $this;
	}

   public function __construct(){}

	public function getOptionsBlock($subjId=null)
	{
		if(!empty($this->options))
		{
		$outputString ='';
		foreach ($this->options as $opt => $val)
		{
			if((isset($subjId)) && ($opt == ((int)$subjId)))
			{
				$outputString .= "<option selected value=".$opt.">"."$val"."</option>";
			}
			else
			{
			$outputString .= "<option value=".$opt.">"."$val"."</option>";
			}
		}
		$this->optionBlockPlaceholder['%options%'] = $outputString;
		}

	}


	public function getArray()
    {
		$renderArray = array();

		foreach ($this->globalPlaceholders as $placeHolder => $value)
		{
			$renderArray[$placeHolder] = $value;
		}
		foreach ($this->warningPlaceholder as $placeHolder => $value)
		{
			$renderArray[$placeHolder] = $value;
		}
		foreach($this->optionBlockPlaceholder as $placeHolder => $value)
		{
			$renderArray[$placeHolder] = $value;
		}
		foreach ($this->formInputPlaceholders as $placeHolder => $value)
		{
			$renderArray[$placeHolder] = $value;
		}
		return $renderArray;
	}

  
	/**
	 * 
	 * @param array $formData
	 * @return boolean true if all fields are valid, false otherwise
	 */
	public function checkForm(array $formData)
	{
		$success = 0;
		$this->checkName($formData['fullName'])?$success++:$success;
		$this->checkSubj($formData['subject'])?$success++:$success;
		$this->checkEmail($formData['email'])?$success++:$success;
		$this->checkMsg($formData['msg'])?$success++:$success;
		if($success === INPUT_CORRECT)
		{
			return true;
		}
		$this->warningPlaceholder['%errEmptyField%'] = FIELDS_REQUIRED;
		return false;
	}

		public function clearForm()
		{
			$this->getOptionsBlock();
			foreach($this->formInputPlaceholders as $placeholder => $value)
			{
				$this->formInputPlaceholders[$placeholder] = '';
			}
			foreach ($this->warningPlaceholder as $placeholder => $value)
			{
				$this->warningPlaceholder[$placeholder]= $value;
			}
			return $this;
		}
		
	private function createEMail($formData)
	{
		$arrMail[]= $formData['fullName'];
		$arrMail[]= $this->options[$formData['subject']];
		$arrMail[]= $formData['email'];
		$arrMail[]= $formData['msg'];
		$arrMail[]= CURR_DATE;
		$arrMail[]= $_SERVER['REMOTE_ADDR'];
		$mailTo = '<a href=mailto:'.$formData['email'].' target=_top>Reply</a>';
		$arrMail[]= $mailTo;
		$this->mail = $arrMail;
	}

	public function setStatusMsg($status)
	{
		$this->warningPlaceholder['%formStatus%'] = $status;
	}

	public function sendEmail($formData)
	{
		$this->createEMail($formData);
		if(mail(EMAIL, $formData['subject'], implode("\r\n", $this->mail)))
		{
			return true;
		}
		return false;
	}

	private function checkName($name)
	{
		if(Validator::validName($name))
		{
			$this->formInputPlaceholders['%fullname%'] = $name;
			return true;
		}
		else
		{
			$this->warningPlaceholder['%errFullName%'] = CHECK_FIELD;
			return false;
		}
	}

	private function checkEmail($email)
	{
		if(Validator::validEmail($email))
		{
			$this->formInputPlaceholders['%email%'] = $email;
			return true;
		}
		else
		{
			$this->warningPlaceholder['%errEmail%'] = CHECK_FIELD;
			return false;
		}

	}


	private function checkSubj($subjId)
	{
		if(Validator::ValidSubj($subjId))
		{
			$this->getOptionsBlock($subjId);
			return true;
		}
		else
		{
			$this->warningPlaceholder['%errSubj%'] = SELECT_FIELD;
			return false;
		}
	}

	private function checkMsg($msg)
	{
		if(Validator::ValidMsg($msg))
		{
			$this->formInputPlaceholders['%message%'] = $msg;
			return true;
		}
		else
		{
			$this->formInputPlaceholders['%message%'] = $msg;
			$this->warningPlaceholder['%errMessage%'] = TEXT_FIELD;
			return false;
		}
	}
}
