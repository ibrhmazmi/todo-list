<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoList extends Model
{
    use SoftDeletes;

    protected $table = 'todo_list';
    protected $primaryKey = 'item_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'task_name',
        'item_completion'
    ];
    protected static function boot()
    {
        parent::boot();

        // Define a global query scope to filter by user_id
        static::addGlobalScope('user_id', function ($query) {
            $query->where('user_id', getId());
        });

    }

    public function getAllList()
    {
        // Use Eloquent to fetch all records from the 'todo_list' table
        return $this->select('item_id', 'task_name', 'item_completion')->get();
    }
}
