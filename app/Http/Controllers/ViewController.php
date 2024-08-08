<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
class ViewController extends Controller
{

          /*
    |--------------------------------------------------------------------------
    | Public Function Default
    |--------------------------------------------------------------------------
    |
    */
    public function default($data)
    {
        // Defalut css
        $css =array(
            config('site-specific.fonts-googleapis-css'),
            config('site-specific.bootstrap.min'),
            config('site-specific.nice-select'),
            config('site-specific.font-awesome.min'),
            config('site-specific.icofont'),
            config('site-specific.slicknav.min'),
            config('site-specific.owl-carousel'),
            config('site-specific.datepicker'),
            config('site-specific.animate.min'),
            config('site-specific.magnific-popup'),
            config('site-specific.normalize'),
            config('site-specific.responsive'),
            config('site-specific.style'),
        );
        //Default script
        $script =array(
            config('site-specific.jquery-min'),
            config('site-specific.jquery-migrate-3'),
            config('site-specific.jquery-ui'),
            config('site-specific.easing'),
            config('site-specific.colors'),
            config('site-specific.popper-min'),
            config('site-specific.bootstrap-datepicker'),
            config('site-specific.jquery-nav'),
            config('site-specific.slicknav-min'),
            config('site-specific.jquery-scrollUp-min'),
            config('site-specific.niceselect-js'),
            config('site-specific.tilt-jquery-min-js'),
            config('site-specific.owl-carousel-js'),
            config('site-specific.jquery-counterup.-min-js'),
            config('site-specific.steller-js'),
            config('site-specific.wow-min-js'),
            config('site-specific.jquery-magnific-popup-min-js'),
            config('site-specific.cloudflare'),
            config('site-specific.bootstrap-min-js'),
            config('site-specific.main-js'),
        );

        if(isset($data['css'])){
            $data['css'] = array_merge($css,$data['css']);
        }else{
            $data['css'] = $css;
        }
        if(isset($data['script'])){
            $data['script'] = array_merge($script,$data['script']);
        }else{
            $data['script'] = $script;
        }


        return View::make('layout', $data);
    }
    
    /*
    |--------------------------------------------------------------------------
    | Public Function Dashboard
    |--------------------------------------------------------------------------
    |
    */
    public function dashboard(Request $request)
    {

            $data =array(
                'title'             => 'Dashboard',
                'view'              => '',
                // 'script'            => array(config('site-specific.dashborad-custom-int-js')),
            );

       return $this->default($data);
    }
}
