<?php

namespace App\Actions\Auth;

use Illuminate\Http\Response;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Me
{
    use AsAction;

   
    public function handle(ActionRequest $request)
    {
        return [
            'user' => auth()->user()
        ];
       
    }
}
