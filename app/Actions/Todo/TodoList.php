<?php

namespace App\Actions\Todo;

use Illuminate\Http\Response;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
class TodoList
{
    use AsAction;

   
    public function handle(ActionRequest $request)
    {   $user  = auth()->user();
        $data = TodoResource::collection(Todo::with('items')->where('user_id',$user->id)->get());
        return [
            'data' => $data
        ];
       
       
    }
}
