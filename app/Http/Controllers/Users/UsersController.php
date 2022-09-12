<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Users\CreateUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class UsersController extends Controller
{
    public function index() {

        $breadcrumb = [
            'title' =>  __("Users lists"),
            'items' =>  [
                [
                    'title' =>  __("Users Lists"),
                    'url'   =>  '#!',
                ]
            ],
        ];
        $lists = User::orderBy('id', 'desc')->paginate();
        return view('pages.users.index',[
            'breadcrumb'=>$breadcrumb,
            'lists'     =>$lists,
        ]);
    }

    public function create() {
        $breadcrumb = [
            'title' =>  __("Create New User"),
            'items' =>  [
                [
                    'title' =>  __("Users Lists"),
                    'url'   => route('users.index'),
                ],
                [
                    'title' =>  __("Create New User"),
                    'url'   =>  '#!',
                ],
            ],
        ];

        return view('pages.users.create',[
            'breadcrumb'=>$breadcrumb
        ]);
    }

    public function store(CreateUsersRequest $request) {
        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        $data['email_verified_at'] = Carbon::now();
        $user = User::create($data);
        return redirect()->route('users.index')->with('success', __("This row has been created."));
    }
    
    public function edit(User $user) {
        if($user->id == \Auth::user()->id) {
            return redirect()->route('profile.index');
        }
        $breadcrumb = [
            'title' =>  __("Edit user"),
            'items' =>  [
                [
                    'title' =>  __("Users Lists"),
                    'url'   => route('users.index'),
                ],
                [
                    'title' =>  __("Edit user"),
                    'url'   =>  '#!',
                ],
            ],
        ];
        return view('pages.users.edit',[
            'breadcrumb'    =>  $breadcrumb,
            'user'         =>  $user,
        ]);
    }

    public function update(UpdateUsersRequest $request, User $user) {
        $data = $request->all();
        if(request()->has('password') && !is_null(request('password'))) {
            $data['password'] = Hash::make($request['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('users.index')->with('success', __("This row has been updated."));
    }

    public function destroy(Request $request,User $user) {
        $user->delete();
        return redirect()->route('users.index')->with('success', __("This row has been deleted."));
    }
}
