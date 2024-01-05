<?php

namespace App\Livewire\Backend\Admin\Shop;

use App\Models\Address;
use App\Models\City;
use App\Models\Shop;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $name = '';
    public $phone = '';
    public $number_of_stores = 0;
    public $social_link_facebook = '';
    public $social_link_instagram = '';
    public $social_link_twitter = '';
    public $statusses = [];
    public $address = '';
    public $cities = [];
    public $city_id;
    public $images = [];
    public $status = '';

    public function mount(){
        $this->cities = City::get();
        $this->statusses = \App\Enums\Shop\Status::getValues();
    }

    public function save(){
        $this->validate([
            'name' => 'required',
//            'phone' => 'required',
//            'number_of_stores' => 'required',
//            'social_link_facebook' => 'required',
//            'social_link_instagram' => 'required',
//            'social_link_twitter' => 'required',
//            'city_id' => 'required',
//            'status' => 'required',
//            'address' => 'required',
            'images' => 'required',
        ]);

        $shop = Shop::create([
            'name' => $this->name,
//            'phone' => $this->phone,
//            'number_of_stores' => $this->number_of_stores,
//            'social_link' => [
//                'facebook' => $this->social_link_facebook,
//                'instagram' => $this->social_link_instagram,
//                'twitter' => $this->social_link_twitter,
//            ],
//            'status' => $this->status,
//        ]);
//        $shop->address()->create([
//            'street' => $this->address,
//            'city_id' => $this->city_id,
        ]);

        foreach ($this->images as $image) {
            $shop->addMedia($image->getRealPath())
                ->toMediaCollection('shops');
        }

        session()->flash('success', 'Shop created successfully');

        return redirect()->route('admin.shops.index');
    }

    public function render()
    {
        return view('livewire.backend.admin.shop.create')->layout('layouts.admin');
    }
}
