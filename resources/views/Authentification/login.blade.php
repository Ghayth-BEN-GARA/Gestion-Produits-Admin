<!DOCTYPE html>
<html lang="en">
    <head>
        @include("Layouts.head_auth")
        <title>Connexion | Gestion des produits</title>
    </head>
    <body>
        <div class="main">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-img">
                        <img src="{{asset('/Auth_files/images/signup-img.jpg')}}" alt="Login picture">
                    </div>
                    <div class="signup-form">
                        <form method="post" class="register-form" id="login-form" name = "login-form">
                            @csrf
                            <h2>Connexion des utilisateurs</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">Adresse email :</label>
                                    <input type="email" name="email" id="email" placeholder = "Entrez votre adresse email.." required/>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include("Layouts.script_auth")
    </body>
</html>