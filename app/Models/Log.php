<?php namespace App\Model;

class Log extends \App\Model\BaseModel
{
	protected $table = 'logs';
	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable = array('log', 'created_at');

	protected $rules = array(
	);

}