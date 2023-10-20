<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function index()
    {
        return view('adm.moderator.genders.index', ['genders' => Gender::all()]);
    }

    public function create()
    {
        return view('adm.moderator.genders.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'gender_kz' => 'required|max:255',
            'gender_ru' => 'required|max:255',
            'gender_en' => 'required|max:255',
        ]);
        Gender::create($validate);
        return redirect()->route('adm.genders.index')->with('message', 'gender saved');
    }

    public function show(Gender $gender)
    {
        return view('admin.moderator.genders.show', ['genders' => $gender]);
    }

    public function edit(Gender $gender)
    {
        return view('admin.moderator.genders.edit', ['genders' => $gender]);
    }

    public function update(Request $request, Gender $gender)
    {
        $validate = $request->validate([
            'gender_kz' => 'required|max:255',
            'gender_ru' => 'required|max:255',
            'gender_en' => 'required|max:255',
        ]);
        $gender->update($validate);
        return redirect()->route('adm.genders.index')->with('message', 'gender edited');
    }

    public function destroy(Gender $gender)
    {
        $gender->delete();
        return redirect()->route('adm.genders.index')->with('message', 'gender successfully deleted');
    }
}
