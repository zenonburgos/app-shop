<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories')); // listado
    }

    public function create()
    {
    	return view('admin.categories.create'); // formulario de registro
    }

    public function store(Request $request)
    {

        $this->validate($request, Category::$rules, Category::$messages); //Mensajes y validación tomados del modelo Category

    	// registrar en la bd
        category::create($request->all()); // mass asignment

        return redirect('/admin/categories');
    }

    public function edit(Category $category) // Recibiendo como un modelo category - Diferente al parámetro recibido en productos
    {
        return view('admin.categories.edit')->with(compact('category')); // formulario de edición
    }

    public function update(Request $request, Category $category)
    {

        $this->validate($request, Category::$rules, Category::$messages); //Mensajes y validación tomados del modelo Category
        // registrar el nuevo producto en la bd
        $category->update($request->all());

        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete(); // DELETE
        return back();
    }
}
