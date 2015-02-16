<?php namespace App\Model;


class User extends \App\Model\BaseModel
{
	protected $table = 'users';
	protected $primaryKey = 'id';

	public $timestamps = true;

	protected $fillable = array('email', 'name', 'password');

	public $rules = [
		['name, email, password', 'required', '{label} is mandatory'],
		['email, password', 'minlength', 'min=5', '{label} must have at least {min} characters'],
	];

	public $labels = [
		'name' => 'Nome',
		'email' => 'E-mail',
		'password' => 'Password',
	];

}