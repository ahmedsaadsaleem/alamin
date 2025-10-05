<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        $pageComponents = [
            'pageTitle'     => 'التسجيل',
            'navElements' => [
                
            ]
        ];

        $this->settingDatabase();

        // Check if is exists super admin user

        if (User::where('group_id', 1)->get()->isEmpty()) {
            $defaultUserGroup = UserGroup::where('group_name', 'super admin')->value('id');
        } else {
            $defaultUserGroup = UserGroup::where('group_name', 'user')->value('id');
        }

        return view('auth.register',['defaultUserGroup' => $defaultUserGroup] , $pageComponents);
    }

    public function storeUser(Request $request)
    {
        $defaultUserGroup = UserGroup::where('group_name', 'user')->value('id');

        $user = new User();

        $user->username = $request->post('username');
        $user->password = Hash::make($request->post('password'));
        $user->email = $request->post('email');
        $user->phone = $request->post('phone');
        $user->first_name = $request->post('first_name');
        $user->last_name = $request->post('last_name');
        $user->group_id =  $request->post('group', $defaultUserGroup);

        $user->save();
        
        return view('auth.registeration-welcome', ['user_name'=>$user->first_name, 'pageTitle'=>'مرحباً']);
    }

    public function login(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        $pageComponents = [
            'pageTitle'     => 'تسجيل الدخول',
            'navElements' => [
                
            ]
        ];

        return view('auth.login', $pageComponents);
    }

    public function logout(): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home');
    }

    protected function authenticateExistingUser(User $user): RedirectResponse
    {
        if (Auth::login($user)) {
            session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return redirect()->route('auth.login')->withErrors([
            'username' => 'the provided credentals don`t mathes our records'
        ])->onlyInput('username');
    }

    private function settingDatabase(): void
    {
        if (DB::table('user_groups')->where('group_name', 'super admin')->get()->isEmpty()) {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            DB::table('user_groups')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
            DB::table('user_groups')->insert([
                'group_name' => 'super admin'
            ]);
        }

        if (DB::table('user_groups')->where('group_name', 'admin')->get()->isEmpty()) {
            DB::table('user_groups')->insert([
                'group_name' => 'admin'
            ]);
        }

        if (DB::table('user_groups')->where('group_name', 'user')->get()->isEmpty()) {
            DB::table('user_groups')->insert([
                'group_name' => 'user'
            ]);
        }
    }
}
