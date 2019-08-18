<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 配置模板路径
     * @return array
     */
    protected function getViewsConfig()
    {
        return [
            'theme'=>config('app.views_theme'),
            'prefix'=>'home.'.config('app.views_theme').'.',
            'css'=>'/assets/home/css/',
            'img'=>'/assets/home/images/',
            'js'=>'/assets/home/js/',
        ];
    }
}
