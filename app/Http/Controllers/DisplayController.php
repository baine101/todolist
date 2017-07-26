<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class DisplayController extends Controller
{
    public function __construct() {

    }
	/**
	 * Show All tasks
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$tasks = Task::all();

		foreach ($tasks as $key => $task){
			$task['assignee'] = json_decode($task['assignee']);
		}

		return view('display', compact('tasks'));
	}
}
