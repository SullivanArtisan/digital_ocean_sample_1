<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use App\Models\Product;

class ManuController extends Controller
{
	public function create_data()
	{
	    Manufacturer::create([
	    'name' => 'ABC Trade',
	    'address' => '34, Mirpur, Dhaka',
	    'phone' => '01878562323'
	    ]);

	    Manufacturer::create([
	    'name' => 'Rahim Afroze',
	    'address' => '123, Dhanmondi, Dhaka',
	    'phone' => '01878562900'
	    ]);

	    echo "Manufacturer data inserted";
	}

	public function select_data()
	{

	    $manufacturers= Manufacturer::all();
	    foreach ($manufacturers as $manu) {
	        $products= Product::where('manufacturer_id', $manu->id)->get();
	        echo "<b>Manufacturer: $manu->name</b><br/>";
	        foreach ($products as $pro)
	        {
	            echo "<p style='padding-left:20px'>Product Name:$pro->name</p>";
	            echo "<p style='padding-left:20px'>Product Price:$pro->price</p><br/>";
	        }
	    }
	}

	public function update_data()
	{
	    $product= Product::find(2);
	    echo "Product details before update:<br/>";
	    echo "<p style='padding-left:20px'>Product Name:$product->name</p>";
	    echo "<p style='padding-left:20px'>Product Price:$product->price</p><br/>";
	   
	    $product->name = 'Walton Blender';
	    $product->price = 1000;
	    $product->save();

	    echo "Product details after update:<br/>";
	    echo "<p style='padding-left:20px'>Product Name:$product->name</p>";
	    echo "<p style='padding-left:20px'>Product Price:$product->price</p><br/>";
	}

	public function delete_data(){

	    //Delete multiple data
	    Product::destroy([1, 2]);

	    //Delete single data
	    Manufacturer::destroy(1);

	    echo "Data are deleted.";
	}
}
