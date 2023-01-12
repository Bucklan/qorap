<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Role;
use App\Models\User;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerContoller extends Controller
{
    public function index()
    {
        return view('admin.moderator.partners.mygifts', ['mygifts' => Auth::user()->gifts]);
    }

    public function create()
    {
        $partner = Auth::user();
        return view('admin.moderator.partners.create', ['user' => $partner]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $request->validate([
            'name_company' => 'required|max:255',
            'image' => 'required|mimes:png,jpg',
        ]);
        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('gifts', $fileName, 'public');
        }


        Auth::user()->partner()->create([
            'user_id' => $user_id,
            'name_company' => $request->input('name_company'),
            'image' => '/storage/' . $image_path,
        ]);
        return redirect()->route('gift.index')->with('message', 'Your request has been sent successfully');
    }

    public function update(Partner $partner)
    {
        if ($partner->is_partner) {
            return back();
        } else {
            $partner->update(['is_partner' => true]);
            Auth::user()->update(['role_id' => Role::where('name', 'PARTNER')->first()->id]);
        }
        return redirect()->route('/home');
    }

    public function destroy(Partner $partner)
    {
    $partner->delete();
    return back();
    }
}
