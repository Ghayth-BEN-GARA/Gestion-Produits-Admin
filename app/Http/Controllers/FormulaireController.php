<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Formulaire;
    use App\Models\User;

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

        public function ouvrirFormulaire(Request $request){
            $formulaire = $this->getInformationsFormulaire($request->input("id_formulaire"));
            return view("Formulaires.formulaire", compact("formulaire"));
        }

        public function getInformationsFormulaire($id_formulaire){
            if(auth()->user()->role = "Super Admin"){
                return Formulaire::where("id_formulaire", "=", $id_formulaire)
                ->where("users.role", "=", "Client")
                ->join("users", "users.id_user", "=", "formulaires.id_client")
                ->join("produits", "produits.id_produit", "=", "formulaires.id_produit")
                ->first();
            }

            else{
                return Formulaire::where("id_formulaire", "=", $id_formulaire)
                ->where("users.role", "=", "Client")
                ->where("forumailre.id_admin", "=", auth()->user()->id_user)
                ->join("users", "users.id_user", "=", "formulaires.id_client")
                ->join("produits", "produits.id_produit", "=", "formulaires.id_produit")
                ->first();
            }
        }

        public static function getInformationsClient($id_admin){
           return User::where("id_user", "=", $id_admin)->first();
        }
    }
?>