<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Gift;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{
    //


    public function home()
    {
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        $gifts = Gift::latest()->take(6)->get();
        $partners = Partner::where('is_partner', true)->get();

        return view('contents.index', ['gifts' => $gifts,
            'categories' => $categories,
            'partners' => $partners
        ]);//,'categories'=>$categories

    }

    public function giftByCategory(Category $category)
    {
        $bool = false;
        foreach ($category->gifts as $gifts) {
            if ($gifts->id) {
                $bool = true;
            }
        }
        $gifts = null;
        if ($bool) {
            $gifts = $category->gifts;
        }
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        $genders = Gender::all();

        return view('gifts.index', [
            'AllGifts' => $gifts,
            'categories' => $categories,
            'genders' => $genders,

        ]);
    }

    public function giftByGender(Gender $gender)
    {
        $genders = Gender::with('categories.gifts')->get();
        return view('gifts.index', ['AllGifts' => $gender->categories->gifts, 'genders' => $genders]);
    }


    public function index(Request $request, Gift $allGift)
    {
        $request->validate([
            'category' => 'numeric|exists:categories,id',
            'sortBy' => 'numeric',
            'name' => 'required|max:255',
        ]);
        $gifts = null;
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        if ($request->category != null &&
            $request->from_price < $request->to_price &&
            $request->sortBy != null) {
            if ($request->sortBy == 1) {
                $gifts = Gift::orderBy('id', 'DESC')
                    ->where('price', '>=', $request->from_price)
                    ->where('price', '<=', $request->to_price)
                    ->where('category_id', '=', $request->category)
                    ->with('category')->get();
            }
            if ($request->sortBy == 2) {
                $gifts = Gift::orderBy('id', 'ASC')
                    ->where('price', '>=', $request->from_price)
                    ->where('price', '<=', $request->to_price)
                    ->where('category_id', '=', $request->category)
                    ->with('category')->get();
            }
            if ($request->sortBy == 3) {
                $gifts = Gift::orderBy('price', 'ASC')
                    ->where('price', '>=', $request->from_price)
                    ->where('price', '<=', $request->to_price)
                    ->where('category_id', '=', $request->category)
                    ->with('category')->get();
            }
            if ($request->sortBy == 4) {
                $gifts = Gift::orderBy('price', 'DESC')
                    ->where('price', '>=', $request->from_price)
                    ->where('price', '<=', $request->to_price)
                    ->where('category_id', '=', $request->category)
                    ->with('category')->get();
            }
        } elseif ($request->name) {
            $gifts = Gift::where('name_' . app()->getLocale(), 'LIKE', '%' . $request->name . '%')
                ->with('category')->get();
        } else {
            $gifts = Gift::with('category')->get();
        }
        $genders = Gender::all();
        return view('gifts.index', ['AllGifts' => $gifts, 'categories' => $categories, 'genders' => $genders]);//,'categories'=>$categories
    }


    public function create()
    {
        $this->authorize('create', Gift::class);
        $categories = Category::whereNull('parent_id')->with('categories')->get();
//        return view('gifts.create',['categories'=>$categories]);
        return view('gifts.create', ['categories' => $categories]);
    }

    public function store(Request $request, Gift $gift)
    {
        $validate = $request->validate([
            'name_en' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'name_kz' => 'required|max:255',
            'content_en' => 'required',
            'content_ru' => 'required',
            'content_kz' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);
        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('gifts', $fileName, 'public');
            $validate['image'] = '/storage/' . $image_path;
        }
        Auth::user()->gifts()->create($validate);
        return redirect()->route('adm.users.gifts')->with('message', __('session.gift saved'));
    }

    public function show(Gift $gift)
    {
        $genders = Gender::all();
        $myRating = 0;
        $giftLikee = false;
        if (Auth::check()) {
            $giftRated = Auth::user()->giftsRated()->where('gift_id', $gift->id)->first();
            $giftLike = Auth::user()->giftsLike()->where('gift_id', $gift->id)->first();
            if ($giftRated) {
                $myRating = $giftRated->pivot->rating;
            }
            if ($giftLike) {
                $giftLikee = $giftLike->pivot->like;
            }
        }
        $avgRating = 0;
        $sum = 0;
        $sumLike = 0;

        $ratedUsers = $gift->usersRated()->get();
        $LikeUsers = $gift->usersLike()->get();
        foreach ($ratedUsers as $ru) {
            $sum += $ru->pivot->rating;
        }
        foreach ($LikeUsers as $like) {
            if ($like->pivot->like) {
                $sumLike += 1;
            }
        }

        if (count($ratedUsers) > 0) {
            $avgRating = $sum / count($ratedUsers);
        }
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        $gfs = $gift->load('comments.user');
        return view('gifts.show', ['gift' => $gfs,
            'categories' => $categories,
            'myRating' => $myRating,
            'avg' => $avgRating,
            'like' => $giftLikee,
            'count' => $sumLike,
            'genders' => $genders]);
    }


    public function edit(Gift $gift)
    {
        $this->authorize('update', $gift);
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        $gfs = $gift->load('comments.user');
        return view('gifts.edit', ['gift' => $gfs, 'categories' => $categories]);
    }

    public function update(Request $request, Gift $gift)
    {
        $this->authorize('update', $gift);
        $validate = $request->validate([
            'name_en' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'name_kz' => 'required|max:255',
            'content_en' => 'required',
            'content_ru' => 'required',
            'content_kz' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);
        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('gifts', $fileName, 'public');
            $validate['image'] = '/storage/' . $image_path;
        }
        $gift->update($validate);
        return redirect()->route('gift.index')->with('message', __('session.gift successfully changed'));
    }

    public function destroy(Gift $gift)
    {
        $this->authorize('delete', $gift);
        $gift->delete();
        return redirect()->route('gift.index')->with('message', __('session.gift successfully deleted'));
    }

    public function rate(Request $request, Gift $gift)
    {
        $validate = $request->validate([
            'rating' => 'required|min:1|max:5'
        ]);
        $giftRated = Auth::user()->giftsRated()->where('gift_id', $gift->id)->first();

        if ($giftRated) {
            Auth::user()->giftsRated()->updateExistingPivot($gift->id, $validate);
        } else {
            Auth::user()->giftsRated()->attach($gift->id, $validate);

        }
        return back();
    }

    public function unrate(Gift $gift)
    {

        $giftRated = Auth::user()->giftsRated()->where('gift_id', $gift->id)->first();

        if ($giftRated) {
            Auth::user()->giftsRated()->detach($gift->id);
        }
        return back();
    }

    public function like(Request $request, Gift $gift)
    {
//        dd($request);
        $validate = $request->validate([
            'like' => 'required'
        ]);
        $giftLike = Auth::user()->giftsLike()->where('gift_id', $gift->id)->first();
        if ($giftLike) {
            Auth::user()->giftsLike()->updateExistingPivot($gift->id, $validate);
        } else {
            Auth::user()->giftsLike()->attach($gift->id, $validate);

        }
        return back();
    }

    public function selected()
    {
        $bool = false;
        $selecteds = Auth::user()->giftsLike()->where('like', true)->get();
        foreach ($selecteds as $selected) {
            if ($selected) {
                $bool = true;
            }
        }
        if ($bool) {
            return view('gifts.selected', ['selecteds' => $selecteds]);
        }
        return view('gifts.selected');
    }
}
