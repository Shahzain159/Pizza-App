<?php

namespace App\Http\Controllers;

use App\Models\cold_drinks;
use App\Models\crust_options;
use App\Models\pizza;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function dashboard(){
        return View('Admin.dashboard');
    }
    public function add_pizza(){
        return View('Admin.addpizza');
    }
    public function add_pizza_post(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path('pizza_images'), $myimage);

        $pizza = new pizza();
        $pizza->name = $validatedData['name'];
        $pizza->description = $validatedData['description'];
        $pizza->price = $validatedData['price'];
        $pizza->image = $myimage;
        $pizza->save();

        return redirect()->back()->with('success', 'Pizza added successfully!');
    }
    public function add_crust(){
        $crusts = crust_options::all();
        return View('Admin.crust_manage', ['crusts' => $crusts]);
    }
    public function add_crust_post(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path('crust_images'), $myimage);

        $crust = new crust_options();
        $crust->name = $validatedData['name'];
        $crust->price = $validatedData['price'];
        $crust->image = $myimage;
        $crust->save();

        return redirect()->back()->with('success', 'Crust added successfully!');
    }
    public function add_drink(){
        $coldDrinks = cold_drinks::all();
        return View('Admin.colddrink_manage', ['coldDrinks' => $coldDrinks]);
    }
    public function add_drink_post(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path('cold_drink_images'), $myimage);

        $coldDrink = new cold_drinks();
        $coldDrink->name = $validatedData['name'];
        $coldDrink->size = $validatedData['size'];
        $coldDrink->price = $validatedData['price'];
        $coldDrink->image = $myimage;
        $coldDrink->save();

        return redirect()->back()->with('success', 'Cold Drink added successfully!');
    }
    public function manage_pizzas(){
        $pizzas = pizza::all();
        return View('Admin.manage_pizza',['pizzas' => $pizzas]);
    }
}
