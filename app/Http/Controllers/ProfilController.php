<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class ProfilController extends Controller{
        public function ouvrirProfil(){
            return view("Profils.profil");
        }
    }
?>
