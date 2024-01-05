<?php

namespace App\Livewire\Backend\Admin\Product;

use App\Models as Models;
use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $categories;
    public $colors;
    public $name = '';
    public $description = '';
    public $short_description = '';
    public $price;
    public $quantity;
    public $type;
    public $productCategories = [];
    public $productColors = [];
    public $images = [];
    public $currentStep = 0;

    const STEP_GENERAL = 0;
    const STEP_CATEGORY_INFO = 1;
    const STEP_IMAGES = 2;

    protected $listeners = [
        'nextStep',
        'previousStep',
        'submitStep',
        'submitStepCategories',
        'submitStepImages',
    ];

    public $steps = [
        [
            'index' => self::STEP_GENERAL,
            'title' => 'General',
        ],
        [
            'index' => self::STEP_CATEGORY_INFO,
            'title' => 'Category Info',
        ],
        [
            'index' => self::STEP_IMAGES,
            'title' => 'Images',
        ],
    ];

    public function previousStep(): void
    {
        $this->currentStep--;
    }

    public function mount(): void
    {
        $this->categories = Models\Category::tree()->get()->toTree();
        $this->colors = Models\Color::query()->get();
    }

    public function stepPage($index): void
    {
        $this->currentStep = $index;
    }

    public function submitStep(): void
    {
        $this->validate($this->rulesForStep(self::STEP_GENERAL));
        $this->currentStep++;
    }

    public function submitStepCategories(): void
    {
        $this->validate($this->rulesForStep(self::STEP_CATEGORY_INFO));
        $this->currentStep++;
    }

    public function submitStepImages(): void
    {
        $this->validate($this->rulesForStep(self::STEP_IMAGES));
        $this->nextStep();
    }

    public function nextStep()
    {
        $this->currentStep++;
        if ($this->currentStep >= count($this->steps)) {
            $this->createProduct();
        }
        return redirect()->route('admin.products.index');
    }

    private function createProduct(): void
    {
        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'type' => $this->type
        ]);
        $product->shop()->associate(auth()->user()->shop)->save();
        $product->categories()->sync($this->productCategories);
        $product->colors()->sync($this->productColors);
        foreach ($this->images as $image) {
            $product->addMedia($image->getRealPath())
                ->toMediaCollection('products');
        }
    }

    private function rulesForStep($step): array
    {
        return match ($step) {
            self::STEP_GENERAL => [
                'name' => 'required|string|min:3|max:255',
                'description' => 'required|string|min:3|max:255',
                'short_description' => 'required|string|min:3|max:255',
            ],
            self::STEP_CATEGORY_INFO => [
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|numeric|min:0',
                'type' => 'required|numeric|min:0',
                'productCategories' => 'required|array|min:1',
                'productCategories.*' => 'required|numeric|exists:categories,id',
                'productColors' => 'required|array|min:1',
                'productColors.*' => 'required|exists:colors,id',
            ],
            self::STEP_IMAGES => [
                'images' => 'required|array|min:1',
                'images.*' => 'required|mimes:jpeg,jpg,png,gif'
            ],
        };
        }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.backend.admin.products.create')
            ->layout('layouts.admin');
    }
}