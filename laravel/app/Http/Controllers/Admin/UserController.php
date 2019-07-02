<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

    class UserController extends Controller{

        public function index(){
            echo '列表界面';
        }
        public function add(){
            echo '添加用户界面';
        }
        public function delete($id){
            echo '删除用户id为'.$id;
        }
    }
