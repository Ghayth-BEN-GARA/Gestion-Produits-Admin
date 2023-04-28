<!DOCTYPE html>
<html lang="en">
    <head>
        @include("Layouts.head_auth")
        <title>Mot de passe oublié | Gestion des produits</title>
    </head>
    <body>
        <div class="main">
            <div class="">
                <div class="signup-content">
                    <div class="signup-img">
                        <img src="{{asset('/Auth_files/images/signup-img.jpg')}}" alt="Login picture">
                    </div>
                    <div class="signup-form">
                        <form method="post" class="register-form" id="forget-password-form" name = "forget-password-form" action = "{{url('/post-forget-password')}}">
                            @if(!Session()->has("email_sent"))
                                @csrf
                                <h2>Mot de passe oublié</h2>
                                <p class = "mb-4 text-muted">Entrez votre adresse email et nous vous enverrons un e-mail avec des instructions pour réinitialiser votre mot de passe.</p>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email">Adresse email :</label>
                                        <input type="email" name="email" id="email" placeholder = "Entrez votre adresse email.." required/>
                                        @if (session()->has('erreur_email'))
                                            <p class="text-danger mt-2 mb-2">{{session()->get('erreur_email')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-submit">
                                    <a href = "{{url('/')}}" class = "link_back">Retour à la page de connexion</a>
                                    <input type="submit" value="Réinitialiser" class="submit float-end" name="submit" id="submit" />
                                </div>
                            @else

                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include("Layouts.script_auth")
    </body>
</html>