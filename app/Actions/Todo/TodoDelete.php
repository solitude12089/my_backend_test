<?php

namespace App\Actions\Todo;

use Illuminate\Http\Response;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
class TodoDelete
{
    use AsAction;

   
    public function handle(ActionRequest $request, int $todoId)
    {   
        $user  = auth()->user();
        $todo = Todo::with('items')
                ->where('id',$todoId)
                ->where('user_id',$user->id)
                ->firstOrFail();
        $todo ->delete();
        return true;
    }
}
