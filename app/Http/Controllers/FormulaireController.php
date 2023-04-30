<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Formulaire;

    class FormulaireController extends Controller{
        public function ouvrirListeFormulaires(){
            return view("Formulaires.liste_formulaires");
        }

        public function gestionAffectAdmin(Request $request){
            if($this->affectAdmin($request->admin, $request->id_formulaire)){
                return back()->with("success", "Nous sommes très heureux de vous informer que vous avez terminé cette tâche avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas affecter un admin pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function affectAdmin($id_admin, $id_formulaire){
            return Formulaire::where("id_formulaire", "=", $id_formulaire)->update([
                "id_admin" => $id_admin
            ]);
        }
    }
?>