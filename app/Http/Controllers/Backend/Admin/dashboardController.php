<?php
/**
 * Created by PhpStorm.
 * User: Chandra
 * Date: 2/11/2018
 * Time: 2:27 PM
 */

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\User;
use App\Permission;

class dashboardController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');

    }

    public function index(){
        $users=User::whereRoleIs(['b2b','customer','kei'])->get();
        return view('Backend.Admin.dashboard',['users'=>$users]);
    }
}