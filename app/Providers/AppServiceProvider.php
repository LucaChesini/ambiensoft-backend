<?php

namespace App\Providers;

use App\Models\Rua;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Validator::extend('combinacao_bairro_rua', function ($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();
            $bairroId = $data[$parameters[0]] ?? null;
            $ruaId = $value;

            return Rua::where('id', $ruaId)->where('bairro_id', $bairroId)->exists();
        });
    }
}
