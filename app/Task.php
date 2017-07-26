<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Task extends Model
{
	/**
	 * Fillable fields for task
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'desc',
		'author',
		'assignee',
		'due',
		'deleted'
	];


	public $timestamps = false;

	/**
	 * Fields to treat as a carbon instance (date)
	 *
	 * @var array
	 */
	protected $dates = ['due'];

	/**
	 *  Set the due date
	 *
	 * @param $date
	 */
	public function setDueDateAttribute($date)
	{
		$this->attributes['due'] = Carbon::parse($date);
	}
}
