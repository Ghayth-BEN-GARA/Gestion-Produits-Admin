<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class FormulaireController extends Controller{
        public function ouvrirListeFormulaires(){
            return view("Formulaires.liste_formulaires");
        }
    }
?>