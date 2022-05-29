<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function userscreate()
    {
        return view('auth.usersregister');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    //メールとパスワードの登録で入力されている値を保持
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $inputs = $request->all();

         //ユーザ情報登録画面を表示するviewへ
        return view('auth.usersregister', [
            'request' => $inputs,
        ]);
    }

    //ユーザ情報登録で入力されている値を保持
    public function usersstore(Request $request)
    {
        if(!(strlen($request->phone_number) == 10 or 11)){
            Session::flash('flash_message', '電話番号はハイフンなしでのご入力をお願いします。');
            return view('auth.usersregister',compact('request'));
        };
        if(!(strlen($request->postal_code) == 7)){
            Session::flash('flash_message', '郵便番号はハイフンなしでの7桁にてご入力をお願いします。');
            return view('auth.usersregister',compact('request'));
        };

        $inputs = $request->all();

        //確認画面を表示するviewへ
        return view('auth.confirmregister',[
            'request' => $inputs,
        ]);
    }

    //ユーザ情報登録確認
    // public function confirm(Request $request)
    // {
    //     $inputs = $request->all();

    //     return view('auth.confirmregister',[
    //         'request' => $inputs,
    //     ]);
    // }

        //データベースにユーザ情報を保存
        public function save(Request $request)
    {
        // フォルダモデルのインスタンスを作成する
        $user = new User();
        // 入力値を代入する
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->nick_name = $request->nick_name;
        $user->phone_number = $request->phone_number;
        $user->postal_code = $request->postal_code;
        $user->address = $request->address;
        // dd($user);
        // インスタンスの状態をデータベースに書き込む
        $user->save();

        return redirect()->route('homepage', [
            'id' => $user->id,
        ]);
    }
}
