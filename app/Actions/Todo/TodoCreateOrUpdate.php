<?php

namespace App\Actions\Todo;

use App\Models\Todo;
use App\Models\TodoItem;
use Lorisleiva\Actions\ActionRequest;
use App\Http\Resources\TodoItemResource;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Resources\TodoResource;
class TodoCreateOrUpdate
{
    use AsAction;

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'attachment'=>'array'
        ];
    }

    public function handle(ActionRequest $request, ?int $todoId = null)
    {
        
        $user = auth()->user();
        $todo = Todo::firstOrNew([
            'id' => $todoId,
            'user_id' => $user->id
        ]);
        $todo->fill($request->validated());
        $todo->save();
        return [
            'data' => Todo::find($todo->id)
        ];
       
    }
}
