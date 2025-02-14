<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if (!function_exists('greetUser')) {

    function asset_url($asset = '', $hasLocale = false): string
    {
        return $hasLocale
            ? asset(sprintf('dash/assets/%s/%s', LaravelLocalization::getCurrentLocaleDirection(), trim($asset, '/')))
            : asset(sprintf('dash/assets/%s', trim($asset, '/')));
    }

    function asset_front_url($asset = '', $hasLocale = false): string
    {
        return $hasLocale
        ? asset(sprintf('frontend/dist/assets/%s/%s', LaravelLocalization::getCurrentLocaleDirection(), trim($asset, '/')))
        : asset(sprintf('frontend/dist/assets/%s', trim($asset, '/')));
    }



    function route_is($pattern = null, $success = '', $fail = '')
    {
        return $pattern
            ? (request()->routeIs($pattern) ? $success : $fail) : false;
    }

    function router($path, $parameters = [])
    {
        // Start with the locale parameter
        // $routeParams = ['locale' => getCurrentLocale()];
        // $routeParams = [];
        $routeParams = [];

        // Merge the additional parameters into $routeParams
        if ($parameters) {
            $routeParams = array_merge($routeParams, $parameters);
        }

        if( !empty($routeParams)){
        return route($path, $routeParams);
        }
        else{
        return route($path);
        }


    }

    function redirectLive($path)
    {
        return  redirect()->to( '/' . 'dash' . '/' . $path);

        // return  redirect()->to('/' . getCurrentLocale() . '/' . 'dash' . '/' . $path);
    }



    function uploadImage($model, $img, $collectshion)
    {
        // Check if there's an existing image, and delete it if it exists
        if ($model->hasMedia($collectshion)) {
            $model->getMedia($collectshion)->each(function ($media) {
                $media->delete();
            });
        }
        // Add the new image with its original name
        $model->addMedia($img->getRealPath())
            ->usingFileName($img->getClientOriginalName())
            ->toMediaCollection($collectshion);
    }

    function deleteImage($model,$collectshion)
    {
        // Check if there's an existing image, and delete it if it exists
        if ($model->hasMedia($collectshion)) {
            $model->getMedia($collectshion)->each(function ($media) {
                $media->delete();
            });
        }

    }

    function getCurrentLocale()
    {
    //   return LaravelLocalization::getCurrentLocale();
      return app()->getLocale() ?? 'en';
    }

        function isRtl() :bool
        {
            return LaravelLocalization::getCurrentLocaleDirection() === 'rtl';
        }
    
    
        function direction() :string
        {
            return !isRtl() ? 'right' : 'left';
        }

        function getDirection(){
          return  getCurrentLocale() == 'ar' ? 'rtl' : "ltr"  ;
        }

         function prepareLocalizedData($ar, $en)
        {
            return json_encode(['ar' => $ar, 'en' => $en], JSON_UNESCAPED_UNICODE);
        }
    

          function calcPrice($price, $discount=0){
            $totalTaxes = [];
            // Calculate all the taxes based on the provided tax percentages
            foreach (config('taxs_services') as $key => $taxes) {
                $totalTaxes[] = $price * ($taxes / 100);  // Calculate tax based on price
            }
        
            // Calculate total taxes
            $taxAmount = array_sum($totalTaxes);
        
            // Calculate total before applying discount
            $totalBeforeDiscount = $price + $taxAmount;
        
            // Calculate discount on the total amount (price + taxes)
            $discountAmount = $totalBeforeDiscount * ($discount / 100);
        
            // Calculate final total after discount
            $total = $totalBeforeDiscount - $discountAmount;
        
            return number_format($total, 2);  // Display final total with 2 decimal points
        }

    // function asset_url($path)
    // {
    //     return env('APP_URL') .'/'. $path;
    // }
}
