<?php

namespace App\Actions\Todo\Item;

use App\Models\Todo;
use App\Models\TodoItem;
use Lorisleiva\Actions\ActionRequest;
use App\Http\Resources\TodoItemResource;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteItem
{
    use AsAction;


    public function handle(ActionRequest $request, int $todoId, int $itemId)
    {
        $user = auth()->user();

        $item = TodoItem::where('id',$itemId)
                        ->where('todo_id',$todoId)
                        ->firstOrFail();
        $item->delete();

        return true;
        
    }
}
