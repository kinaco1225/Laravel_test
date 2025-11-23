<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // --- 登録画面表示 ---
    

    // --- 登録処理 ---
    /* public function storeRegister(UserRequest $request)
    {
        $user = $request-> only(['name', 'email', 'password']);
        User::create($user);
        //return $user;
        return redirect('/login')->with('success', 'ユーザー登録が完了しました！ログインしてください。'); 
    } */


    // --- ログイン画面 ---
    /* public function showLogin()
    {
        return view('auth.login');
    } */


    // --- ログイン処理 ---
    /* public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
 */
        /* if (Auth::attempt($credentials)) {
            return redirect('/admin'); // 管理画面へ
        } */

        /* return back()->withErrors([
            'login_error' => 'メールまたはパスワードが違います。',
        ]);
    } */
}
