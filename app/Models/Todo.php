<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static $unguarded = true;
    protected $guarded =['id'];
    protected $hidden = [
        'deleted_at'
    ];
    protected $casts = [
        'attachment' => 'array'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(TodoItem::class);
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($todo) {
            $todo->items()->each(function($item) {
                $item->delete();
            });
        });
    }
}
