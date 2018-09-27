<?php
/**
 * Created by PhpStorm.
 * User: storm 朱晓进 qhj1989@qq.com
 * Date: 2018/9/27
 * Time: 下午3:45
 */

namespace Zhuxiaojin\HolidayChina;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Holiday::class, function(){
            return new Holiday();
        });

        $this->app->alias(Holiday::class, 'holiday');
    }

    public function provides()
    {
        return [Holiday::class, 'holiday'];
    }
}