<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{


    public function index(Category $category)
    {
        $categories = Category::whereNull('parent_id')->with('categories')->get();

        return view('admin.moderator.categories.index', ['category' => $categories]);
    }


    public function create(){
        return view('admin.moderator.categories.create');
    }

    public function store(Request $request)
    {


        $validate = $request->validate([
            'name_kz' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'name_en' => 'required|max:255',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
            'gender_id' => 'required|numeric|exists:genders,id',
        ]);
        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('gifts', $fileName, 'public');
            $validate['image'] = '/storage/' . $image_path;
        }
        Category::create($validate);
        return redirect()->route('adm.categories.index')->with('message', 'category saved');
    }

    public function show(Category $category)
    {
        return view('admin.moderator.categories.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('admin.moderator.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $validate = $request->validate([
            'name_kz' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'name_en' => 'required|max:255',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
            'gender_id' => 'required|numeric|exists:genders,id',
        ]);
        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('gifts', $fileName, 'public');
            $validate['image'] = '/storage/' . $image_path;
        }
        $category->update($validate);
        return redirect()->route('adm.categories.index')->with('message', 'category successfully changed');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('adm.categories.index')->with('message', 'category successfully deleted');
    }

}
