<?php

namespace App\Providers;

use App\Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('pretorInput', 'components.form.input', ['params','errors']);
        \Form::component('pretorEmail', 'components.form.email', ['params','errors']);
        \Form::component('pretorSubmit', 'components.form.submit', ['label'=> null, 'attributes' => []]);      
    }
}
