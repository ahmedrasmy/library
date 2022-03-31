<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $cats = Category::select(
            'id', 
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            )->get();
        return view(
            'components.navbar',
            compact('cats')
                    );
    }
}
