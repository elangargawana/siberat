<?php

namespace App\Helpers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class MenuHelper
{
    public static function Menu()
    {
        if (auth()->check()) {
            $model_id = auth()->user()->id;
            // Sekarang, Anda bisa menggunakan $model_id dengan aman
            $user_role = DB::table('model_has_roles')->where('model_id', $model_id)->first();
        } else {
            // Penanganan jika pengguna belum login
            // Misalnya, redirect pengguna ke halaman login
            return redirect()->route('login');
        }
        
        $menu_roles = DB::table('role_has_menus')->where('role_id', $user_role->role_id)->get();
        $array_menu_roles = [];
        foreach ($menu_roles as  $value) {
            $array_menu_roles[] = $value->menu_id;
        }
        $menus = Menu::where('parent_id', 0)
            ->with('submenus', function ($query) use ($array_menu_roles) {
                $query->whereIn('id', $array_menu_roles);
                $query->with('submenus', function ($query) use ($array_menu_roles) {
                    $query->whereIn('id', $array_menu_roles);
                });
            })
            ->whereIn('id', $array_menu_roles)
            ->get();
        return json_encode($menus);
    }
}
