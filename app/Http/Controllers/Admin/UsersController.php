<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.users.index', ['users' => $users]);
    }

    public function addRequestUser(Request $request)
    {
        $isAdmin = boolval($request->has('isAdmin'));
        $objUser = new User();
        $objUser = $objUser->create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'isAdmin' => $isAdmin
        ]);

        if ($objUser) {
            return redirect()->route('users.edit', $objUser->id)->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Запись не добавлена');
    }

    public function addUser()
    {

        return view('admin.users.add');
    }

    public function editUser(int $id)
    {
        $user = User::find($id);

        if(!$user) {
            return redirect()->route('users')->with('error', 'Страница не найдена');
        }

        return view('admin.users.edit', ['user' => $user]);
    }

    public function editRequestUser(Request $request, int $id)
    {
        //$news = News::find($id);
        $isAdmin = boolval($request->has('isAdmin'));
        $user = User::find($id);

        if (User::where('id', $id)->update([
            'email' => $request->input('email'),
            'password' => $request->input('password') ? Hash::make($request->input('password')) : $user->password,
            'isAdmin' => $isAdmin
        ])) {
            return redirect()->route('users')->with('success', 'Запись обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    public function deleteNews (Request $request)
    {
        if ($request->ajax()) {
            $id = (int) $request->input('id');
            User::where('id',$id)->delete();
        }
    }
}
