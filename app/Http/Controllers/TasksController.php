<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Auth;
use App\Task;
use App\User;
use Carbon\Carbon;

class TasksController extends Controller
{


	/**
	 * Check if authenticated
	 *
	 * TasksController constructor.
	 */
	public function __construct()
	{
	//	$this->middleware(['auth','user'], ['only' => ['create','edit']]);

	}

	/**
	 * Gets users for assignee select list
	 *
	 * @return mixed
	 */
	public function users(){
		$users = User::all();

		return View::make('addTask', array('users' => $users));
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

	/**
	 * Creates a task record in the DB
	 *
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function store(Request $request){

		$this->validate($request, [
			'title' => 'required|unique:posts|max:255',
			'desc' => 'required',
			'assignee' => 'required',
			'due' => 'required',
		]);


		// Get post data
		$request = $request->all();

		// Make a SQL formatted date
		$date = new Carbon($request->due);
		$request['due'] = $date;

		// Encode the array of assignees
		$request['assignee'] = json_encode($request['assignee']);

		// Get and store the author of the task
		$request['author'] = Auth::user();
		$request['author'] = $request['author']->name;

		Task::create($request);

		return redirect('display');
	}

	/**
	 * Show single Tasks
	 *
	 * @param Task $task
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View (task)
	 *
	 */
	public function show(Task $task)
	{
		$task['assignee'] = json_decode($task['assignee']);
		return view('task', compact('task'));
	}

	/**
	 *  Deletes a task
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function destroy(Request $request){

		Task::destroy($request->taskId);

		return view('display', compact('delMsg'));
	}

	/**
	 *
	 * Update the article DB record
	 *
	 * @param Task $task
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(Task $task, Request $request)
	{

		$task->update($request->all());

		return redirect('display');
	}

}
