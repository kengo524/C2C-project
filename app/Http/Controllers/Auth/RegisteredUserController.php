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
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // $email = $request->email;
        // $password = $request->password;

        $inputs = $request->all();
        // dd($inputs);
        // $user = User::create([
        //     // 'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);

         //ユーザ情報登録画面を表示するviewへ
        return view('auth.usersregister', [
            'request' => $inputs,
        ]);
    }

    //ユーザ情報登録で入力されている値を保持
    public function usersstore(Request $request)
    {
        // $request->validate([
        //     // 'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $inputs = $request->all();
        // dd($inputs);

        // $user = User::create([
        //     // 'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        //確認画面を表示するviewへ
        return view('auth.confirmregister',[
            'request' => $inputs,
        ]);
    }

    //ユーザ情報登録確認
    public function confirm(Request $request)
    {
        // // Bladeで使う変数
        // $hash = array(
        //     'request' => $request,
        //     'email' => 'email',
        //     'password' => 'password',
        //     'name' => 'name',
        //     'nickname' => 'nickname',
        //     'postalcode' => 'postalcode',
        //     'address' => 'address',
        // );
        // return view('confirm')->with($hash);
        $inputs = $request->all();

        return view('auth.confirmregister',[
            'request' => $inputs,
        ]);
    }

        //データベースにユーザ情報を保存
        public function save(Request $request)
    {
        // フォルダモデルのインスタンスを作成する
        $user = new User();
        // 入力値を代入する
        $user->email = $request->email;
        $user->password = $request->password;
        $user->name = $request->name;
        $user->nick_name = $request->nick_name;
        $user->phone_number = $request->phone_number;
        $user->postal_code = $request->postal_code;
        $user->address = $request->address;
        // dd($user);
        // インスタンスの状態をデータベースに書き込む
        $user->save();

        return redirect()->route('items', [
            'id' => $user->id,
        ]);
    }
}
