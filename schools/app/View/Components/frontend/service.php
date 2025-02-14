<?php

namespace App\View\Components\frontend;

use Closure;
use App\Models\Services;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class service extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $services = Services::with(
            'blog','pricingPlans.pricingPlan',
            )->get();

        return view('components.frontend.service',compact('services'));
    }
}
