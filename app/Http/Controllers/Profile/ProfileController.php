<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
;
class ProfileController extends Controller
{
    public function index() {
        $breadcrumb = [
            'title' =>  __("Profile information"),
            'items' =>  [
                [
                    'title' =>  __("Profile information"),
                    'url'   =>  '#!',
                ]
            ],
        ];
        $user = \Auth::user();
        return view('pages.profile.index',[
            'breadcrumb'=>$breadcrumb,
            'user'=>$user,
        ]);
    }

    public function store(UpdateProfileRequest $request) {
        $request = $request->all();
        if(request()->has('password') && !is_null(request('password'))) {
            $request['password'] = \Hash::make($request['password']);
        } else {
            unset($request['password']);
        }
        if(request()->has('avatar') && !is_null(request('avatar'))) {
            $request['avatar'] = imageUpload($request['avatar'],'users');
        } else {
            if (isset($request['avatar'])){
                unset($request['avatar']);
            }
        }   
        \Auth::user()->update($request);
        return redirect()->route('dashboard.profile.index')->with('success',__('Your profile has been updated'));
    }
}
