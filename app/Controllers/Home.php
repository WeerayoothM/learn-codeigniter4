<?php namespace App\Controllers;

use App\Controllers\Admin\Shop as adminShop;
class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function validation(){
		$shop = new Shop();
		echo $shop->product('macbook');

		echo '<br>';

		$shop = new adminShop();
		echo $shop->product('macbook');

	}

}

// http://example.com/new/latest/10
// http://example.com/[controller-class]/[controller-method]/[arguments]