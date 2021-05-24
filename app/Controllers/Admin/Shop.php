<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Shop extends BaseController
{
	public function index()
	{
		echo 'This is an Admin shop area';
	}

    public function product($type, $product_id)
    {
        echo '<h2>This is an admin product</h2>';
        // return view('product');
    }
}
