<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Session;
    use Hash;
    use App\Models\User;

    class AuthentificationController extends Controller{
        public function ouvrirSignin(){
            return view("Authentification.login");
        }

        public function gestionLogin(Request $request){
            if(!$this->checkUserExist($request->email)){
                return back()->with("erreur_email", "Nous sommes désolés ! Nous n'avons pas trouvé votre compte.");
            }

            elseif($this->getInformationsUserWithEmail($request->email)->role != "Admin" && $this->getInformationsUserWithEmail($request->email)->role != "Super Admin"){
                return back()->with("erreur", "Nous sommes désolés de vous informer que vous n'êtes pas autorisé à utiliser cette application.");
            }

            elseif(!$this->checkEmailPasswordValide($request->email, $request->password)){
                return back()->with("erreur_password", "Une erreur s'est produite lors de la tentative de connexion. Vérifiez votre mot de passe et réessayez plus tard.");
            }

            else{
                $this->creerSessionUser($request->email);
                return redirect("/dashboard");
            }
        }

        public function checkUserExist($email){
            return User::where("email", "=", $email)->exists();
        }

        public function getInformationsUserWithEmail($email){
            return User::where("email", "=", $email)->first();
        }

        public function checkEmailPasswordValide($email, $password){
            $credentials = request(['email', 'password']);
            return Auth::attempt($credentials);
        }

        public function creerSessionUser($email){
            Session::put('email', $email);;
        }
    }
?>
