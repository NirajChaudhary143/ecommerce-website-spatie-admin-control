<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function redirect(){
        $user = Auth::user();
        if($user->roles->contains('name','user')){
            return redirect('/');
        }
        elseif($user->roles->contains('name','admin')){
            return redirect('/admin-panel');
        }
        elseif($user->roles->contains('name','staff')){
            return redirect('/admin-panel');
        }
    }
}
