<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\User;

    class ProfilController extends Controller{
        public function ouvrirProfil(){
            return view("Profils.profil");
        }

        public function ouvrirEditProfil(){
            return view("Profils.edit_photo_profil");
        }

        public function gestionUpdatePhotoDeProfil(Request $request){
            if($this->updatePhotoProfil($request, auth()->user()->id_user)){
                return back()->with("success", "Nous sommes très heureux de vous informer que votre photo de profil a été modifiée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier votre photo de profil pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function updatePhotoProfil($request, $id_user){
            $filename = time().$request->file('file')->getClientOriginalName();
            $path = $request->file->move('Profils_pictures/'.$id_user, $filename);

            return User::where('id_user', '=', $id_user)->update([
                'image' => $path
            ]);
        }
    }
?>
