<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
//use http\Url;
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
        $bool = true;
        $gg = Partner::get();
        foreach ($gg as $ggs) {
            if ($ggs->user_id == Auth::user()->id) {
                $bool = false;
            }
        }
        $request->validate([
            'name_company' => 'required|max:255',
            'image' => 'required|mimes:png,jpg',
        ]);
        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('gifts', $fileName, 'public');
        }

        if ($bool==true) {
            Auth::user()->partner()->create([
                'user_id' => Auth::user()->id,
                'name_company' => $request->input('name_company'),
                'image' => '/storage/' . $image_path,
            ]);
            return redirect()->route('gift.index')->with('message', 'Your request has been sent successfully');
        }
        return back()->withErrors('Sizde uzhe market bar!');
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
