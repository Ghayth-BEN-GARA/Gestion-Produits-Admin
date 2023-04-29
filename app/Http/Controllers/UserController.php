<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class UserController extends Controller{
        public function ouvrirCreateUser(){
            return view("Users.create_user");
        }
    }
?>