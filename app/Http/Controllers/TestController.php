<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function __invoke(Request $request)
    {
        // DB::select('SELECT * FROM users WHERE active =  (CASE WHEN user 1 THEN 1 END)');
        
        // DB::insert('INSERT INTO users (username, password, email, phone, first_name, last_name, photo,group_id, active);
        //                             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)',
        //                             ['saad', 'asdfg', 'saad@gmail.com', '011224434', 'ahmed', 'saad', '', 1, 0]);
    
        // DB::insert('INSERT INTO users SET username = ?, password = ?, email = ?, phone = ?, first_name = ?, last_name = ?, group_id = ?, active = ?',
                                    // ['tamim', 'asdfg', 'tamim@gmail.com', '0117224434', 'ahmed', 'saad', 1, 0]);

        // DB::update('UPDATE users SET first_name = "besan" WHERE id = ?', [1]);

        // DB::statement('RENAME TABLE uss TO users');
        
        // DB::unprepared('CREATE TABLE test(
        //     id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        //     name VARCHAR(15)
        // )');
        
        // DB::connection()->getPdo();

        // DB::table('users')->first();

        // DB::table('users')->where('first_name', 'ahmed')->value('username');
    
        // DB::table('users')->find(2);

        // DB::table('users')->value('username');

        // DB::table('users')->pluck('username');

        // DB::table('users')->pluck('username', 'email');

        // DB::table('users')->orderBy('id')->chunk(3, function (Collection $users) {
        //     dd($users);
        // });
        
        // DB::table('customers')->where('user_id', '=', 1)->chunkById(3, function  (Collection $customers) {
        //     dd($customers);
        // });

        dd(
            DB::table('customers')->get()
        );
        
    }
}