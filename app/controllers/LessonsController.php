<?php

class LessonsController extends BaseController {

	public function index(){

		return View::make('index');
	}

	public function create(){

		return View::make('create');
	}

	public function handleCreate(){

	}

	public function edit(Lesson $lesson){

		return View::make('edit');
	}

	public function handleEdit(){

	}
	public function edit(Lesson $lesson){
		return View::make('delete');
	}
	public function handleDelete(){

	}

}