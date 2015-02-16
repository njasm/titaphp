<?php namespace App\Model;

use \Illuminate\Database\Eloquent\Model;
use \Sirius\Validation\Validator;
use \Sirius\Validation\ErrorMessage;

class BaseModel extends Model
{

	protected $autoValidate = true;
	protected $errors;

	public function label($field)
	{
		return \I18n::translate($this->labels[$field]);
	}

	public function validate($rules = null)
	{
		$validator = new Validator();
		foreach ($this->rules as $rule) {
			$fields = explode(',', str_replace(' ', '', $rule[0]));
			foreach ($fields as $field) {
				count($rule) == 4 ?
					// field, rule, options, message, label
					$validator->add($field, $rule[1], $rule[2], \I18n::translate($rule[3]), $this->label($field)) :
					// field, rule, message, label
					$validator->add($field, $rule[1], [], \I18n::translate($rule[2]), $this->label($field));
			}
		}
		if (!$validator->validate($this->getAttributes())) {
			$messages = $validator->getMessages();
			foreach ($messages as $message){
				foreach ($message as $error) $this->errors[] = (string)$error;
			}
			return false;
		}
		return true;
	}

	public function errors()
	{
		return $this->errors;
	}

	public function save(array $options = array())
	{
		if ($this->autoValidate && !$this->validate()){
			return false;
		}
		return parent::save($options);
	}

}