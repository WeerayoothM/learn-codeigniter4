<?php namespace App\Controllers;

class Form extends BaseController
{
	public function index()
	{
		$data = [];
		$data['categories']= [
			'Student',
			'Teacher',
			'Principle'
		];
		return view('form',$data);
	}

}
