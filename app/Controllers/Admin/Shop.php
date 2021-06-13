<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Shop extends BaseController {
    public function index(){
        echo '<h2>This is my shop</h2>';
    }

    public function product ($name) {
        echo "<h2>Admin product</h2>";
    }
}