<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Register the form components
        Form::component('bsText', 'components.form.text', ['name', 'value' => null,'label' => null, 'attributes' => []]);
        Form::component('bsEmail', 'components.form.email', ['name', 'value' => null,'label' => null, 'attributes' => []]);
        Form::component('bsNumber', 'components.form.number', ['name', 'value' => null,'label' => null, 'attributes' => []]);
        Form::component('bsPassword', 'components.form.password', ['name','label' => null, 'attributes' => []]);
        Form::component('bsMultipleSelect', 'components.form.multiple_select', ['name','data','arr','label' => null, 'attributes' => []]);



    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
