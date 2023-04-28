<!DOCTYPE html>
<html lang="en">
    <head>
        @include("Layouts.head_site")
        <title>Dashboard | Assistance Bot</title>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="header">
                @include("Layouts.top_navbar")
            </div>
            <div class="sidebar" id="sidebar">
                @include("Layouts.left_navbar")
            </div>
            <div class="page-wrapper">
                <div class="content container-fluid mt-3">
                    <div class="page-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title">Profil</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{url('/dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Profil</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-header">
                                <div class="row align-items-center">
                                    <div class="col-auto profile-image">
                                        <a href="javascript:void(0)">
                                            <img class="rounded-circle" alt="Photo de profil" src="{{URL::asset(auth()->user()->image)}}">
                                        </a>
                                    </div>
                                    <div class="col ms-md-n2 profile-user-info">
                                        <h4 class="user-name mb-0">{{auth()->user()->prenom}} {{auth()->user()->nom}}</h4>
                                        <h6 class="text-muted">{{auth()->user()->role}}</h6>
                                        <div class="user-Location">
                                            <i class="fa fa-mobile"></i>
                                            {{substr(auth()->user()->mobile, 0, 2)." ".substr(auth()->user()->mobile, 2, 3)." ".substr(auth()->user()->mobile, 5, 3)}}
                                        </div>
                                        <div class="about-text text-capitalize"><?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(auth()->user()->date_time_creation_user))))?></div>
                                    </div>
                                    <div class="col-auto profile-btn">
                                        <a href="" class="btn btn-primary">
                                            Modifier
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-menu">
                                <ul class="nav nav-tabs nav-tabs-solid">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">À propos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Modifier le mot de passe</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#infos_tab">Modifier les informations</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content profile-tab-cont">
                                <div class="tab-pane fade show active" id="per_details_tab">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Informations Personnelles</span>
                                                        <a class="edit-link" href="">
                                                            <i class="far fa-edit me-1"></i>
                                                            Modifier
                                                        </a>
                                                    </h5>
                                                    <div class="row">
                                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Nom :</p>
                                                        <p class="col-sm-9">{{auth()->user()->nom}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Prenom :</p>
                                                        <p class="col-sm-9">{{auth()->user()->prenom}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Adresse email :</p>
                                                        <p class="col-sm-9">{{auth()->user()->email}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Genre :</p>
                                                        <p class="col-sm-9">{{auth()->user()->genre}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Rôle :</p>
                                                        <p class="col-sm-9">{{auth()->user()->role}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Numéro Mobile :</p>
                                                        <p class="col-sm-9">+216 {{substr(auth()->user()->mobile, 0, 2)." ".substr(auth()->user()->mobile, 2, 3)." ".substr(auth()->user()->mobile, 5, 3)}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Horaire De Création :</p>
                                                        <p class="col-sm-9"><?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(auth()->user()->date_time_creation_user))))?> à {{date("H:i", strtotime(auth()->user()->date_time_creation_user))}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Status De Compte</span>
                                                        @if(auth()->user()->status_compte == true)
                                                            <a class="edit-link" href="">
                                                                <i class="far fa-edit me-1"></i>
                                                                Désactiver
                                                            </a>
                                                        @else
                                                            <a class="edit-link" href="">
                                                                <i class="far fa-edit me-1"></i>
                                                                Activer
                                                            </a>
                                                        @endif
                                                    </h5>
                                                    @if(auth()->user()->status_compte == true)
                                                        <button class="btn btn-success" type="button">
                                                            <i class="fe fe-check-verified"></i> 
                                                            Activé
                                                        </button>
                                                    @else
                                                        <button class="btn btn-danger" type="button">
                                                            <i class="fe fe-check-verified"></i> 
                                                            Désactivé
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Autorisations </span>
                                                    </h5>
                                                    <div class="skill-tags">
                                                        @if(auth()->user()->role == "Super Admin")
                                                            <span>Authentification</span>
                                                            <span>Gestion de profil</span>
                                                            <span>Gestion des utilisateurs</span>
                                                            <span>Gestion des formulaires</span>
                                                            <span>Gestion des produits</span>
                                                        @elseif(auth()->user()->role == "Admin")
                                                            <span>Authentification</span>
                                                            <span>Gestion de profil</span>
                                                            <span>Gestion des formulaires</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="password_tab" class="tab-pane fade">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Mot De Passe</h5>
                                            <div class="row">
                                                <div class="col-md-10 col-lg-6">
                                                    <form>
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Ancien Mot De Passe</label>
                                                            <input type="password" class="form-control" name = "old_password" id = "old_password" placeholder = "Entrez votre ancien mot de passe.." required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nouveau Mot De Passe</label>
                                                            <input type="password" class="form-control" name = "new_password" id = "new_password" placeholder = "Entrez votre nouveau mot de passe.." required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirmez Le Nouveau Mot De Passe</label>
                                                            <input type="password" class="form-control" name = "confirm_new_password" id = "confirm_new_password" placeholder = "Confirmez votre nouveau mot de passe.." required>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Sauvegarder les modifications</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="infos_tab" class="tab-pane fade">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Informations</h5>
                                            <div class="row">
                                                <div class="col-md-10 col-lg-12">
                                                    <form>
                                                        @csrf
                                                        <div class = "row">
                                                            <div class = "col-md-6">
                                                                <div class="form-group">
                                                                    <label>Nom</label>
                                                                    <input type="text" class="form-control" name = "nom" id = "nom" placeholder = "Entrez votre nom.." value = "{{auth()->user()->nom}}" required>
                                                                </div>
                                                            </div>
                                                            <div class = "col-md-6">
                                                                <div class="form-group">
                                                                    <label>Prénom</label>
                                                                    <input type="text" class="form-control" name = "prenom" id = "prenom" placeholder = "Entrez votre prénom.." value = "{{auth()->user()->prenom}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class = "row">
                                                            <div class = "col-md-6">
                                                                <div class="form-group">
                                                                    <label>Adresse Email</label>
                                                                    <input type="email" class="form-control" name = "email" id = "email" placeholder = "Entrez votre adresse email.." value = "{{auth()->user()->email}}" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class = "col-md-6">
                                                                <div class="form-group">
                                                                    <label>Genre</label>
                                                                    <select class = "form-control" name = "genre" id = "genre" required>
                                                                        <option value = "#" selected disabled>Sélectionnez votre genre..</option>
                                                                        <option value = "Femme" <?php echo !auth()->user()->genre == null && auth()->user()->genre == 'Femme' ? 'selected' : '' ?>>Femme</option>
                                                                        <option value = "Homme" <?php echo !auth()->user()->genre == null && auth()->user()->genre == 'Homme' ? 'selected' : '' ?>>Homme</option>
                                                                        <option value = "Non spécifié" <?php echo !auth()->user()->genre == null && auth()->user()->genre == 'Non spécifié' ? 'selected' : ''; ?>>Non spécifié</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class = "row">
                                                            <div class = "col-md-12">
                                                                <div class="form-group">
                                                                    <label>Numéro Mobile</label>
                                                                    <input type="text" class="form-control" name = "mobile" id = "mobile" placeholder = "Entrez votre numéro mobile.." value = "{{auth()->user()->mobile}}" onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Sauvegarder les modifications</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            @include("Layouts.footer")
        </div>
        @include("Layouts.script_site")
    </body>
</html>