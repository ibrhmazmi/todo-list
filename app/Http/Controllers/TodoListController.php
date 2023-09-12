<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoListController extends Controller
{

    public function add(Request $request)
    {
        $userid = getId();
        $task_name = $request->task_name;

        //validate
        if (!$userid) {
            return response()->json(['error' => 'Please Login']);
        }
        if (!$task_name) {
            return response()->json(['error' => 'Task name is required']);
        }

        $add_todo = new TodoList();
        $add_todo->task_name = $task_name;
        $add_todo->user_id = $userid;
        $add_todo->save();

        return response()->json(['message' => 'Task added successfully'], 200);
    }


    public function list_all()
    {
        $todoLists = new TodoList();
        $todoLists = $todoLists->getAllList();
        if ($todoLists->count() <= 0) {
            return response()->json(['message' => 'No new task']);
        }

        // Return the result as a JSON response
        return response()->json($todoLists);
    }


    public function mark_complete($id)
    {
        $userid = getId();
        // Find the task by item_id
        $task = TodoList::where([['item_id', $id],['user_id',$userid]])->first();

        // Check if the task exists
        if (!$task) {
            return response()->json(['message' => 'Task not found']);
        }

        // Update the task to mark it as complete
        $task->update([
            'item_completion' => 1,
            'updated_at' => now(),
        ]);

        // Return a success response
        return response()->json(['message' => 'Task marked as complete']);
    }



    public function delete($id)
    {
        $userid = getId();
        $task = TodoList::where([['item_id', $id],['user_id',$userid]])->first();

        if (!$task) {
            return response()->json(['message' => 'Task not found']);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
