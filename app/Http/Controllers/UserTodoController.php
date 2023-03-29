<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveTodoRequest;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class UserTodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $todos = $user->todos()->with('user')->get();
        return view('main', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = $this->getTypes();
        $action = URL::route('users.todos.store', ['user' => Auth::id()]);
        return view('todo.create', compact('types', 'action'));
    }

    /**
     * @param  SaveTodoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, SaveTodoRequest $request)
    {
        $todo = new Todo();
        $todo->fill($request->validated());
        $todo = $user->todos()->save($todo);
        return redirect()->route('todo.edit', ['todo' => $todo->id, 'user' => $user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Todo $todo)
    {
        $todo->load(['items', 'user']);
        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Todo $todo)
    {
        $types = $this->getTypes();
        return view('todo.edit', compact('todo', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getTypes(): Collection
    {
        return collect([
            ['value' => Todo::PRIVATE_TYPE, 'label' => 'Private'],
            ['value' => Todo::PUBLIC_TYPE, 'label' => 'Public'],
        ]);
    }
}
