<?php namespace App\Controllers;

class Shop extends BaseController {
    public function index(){
        echo '<h2>This is my shop</h2>';
    }

    public function product ($name) {
        echo "<h2>The product name is $name</h2>";
    }
}