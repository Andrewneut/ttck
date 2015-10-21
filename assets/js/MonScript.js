$(document).ready(function(){
    
    // On resize le bloc principal
    $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    $(window).resize(function(){
        $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    });
    
    $("#Profil").hide();
    
    $("#pseudo").click(function(){
        $("#Profil").show();
    });
    
    $("#Profil").click(function(){
        $("#Profil").fadeOut();
    });
    
    // On affiche la fenêtre de connexion
    $('#connexionBtnConnect').click(function(){
        $('#logInPassword').val("");
        
        // Si il y a un nom d'utilisateur de sauvegardé 
        var remember = getCookie("remember");
        $('#logInUsername').val("" + remember);
        if (remember != "") {
            $('#rememberme').prop("checked", true);
        } else {
            $('#rememberme').prop("checked", false);
        }
        $("#logInPopupID").modal("show");
    });
    
    var menu = getCookie("menu");
    if ((menu == "") || (menu == "0")) {
    } else {
        $("#links li").each(function(){
            if ($(this).attr("index") == menu) {
                $(this).addClass("active");
            }
        });
    }
    
    $('#links li').unbind("click");
    $('#links li').click(function(){
        setCookie("menu", $(this).attr("index"), 60);
    });
    
    $('#resetMenu').unbind("click");
    $('#resetMenu').click(function(){
        setCookie("menu", "0", 60);
    });
    
    // quand on clique sur se connecter
    $('#logInButtonInModal').unbind("click");
    $('#logInButtonInModal').click(function(){
        // Si la checkbox est coché on stocke le nom d'utilisateur
        if ($("#rememberme").is(":checked") === true) {
            setCookie("remember", "" + $('#logInUsername').val(), 365);
        } else {
            deleteCookie("remember");
        } 
        
        $.ajax({
            type    :           "POST",
            url     :            "connexion.php",
            data    :            {
                "login":         $('#logInUsername').val(),
                "mdp":           $('#logInPassword').val()
            },
            timeout:             6000 // on met le timeout à 6 secondes
        })
                .success(function (texts) {
                    var json = JSON.parse(texts);
            
            if (json["result"] === true) {
                // La connexion à réussit
                location.reload();
            } else {
                // La connexion à echouée
                var val = "<span class='label label-danger'>Une erreur est survenue lors de la connexion</span>";
                $('#displayMsgError').fadeOut("fast", function(){
                    $('#displayMsgError').html(val);
                    $('#displayMsgError').fadeIn("slow");
                });
            }
            
        })
                .error(function(){
                    // La connexion à echouée
            var val = "<span class='label label-danger'>Une erreur est survenue lors de la connexion</span>";
            $('#displayMsgError').fadeOut("fast", function(){
                $('#displayMsgError').html(val);
                $('#displayMsgError').fadeIn("slow");
            });
        });
        
    });
    
    // click sur déconnexion
    $('#deconnexionBtn').click(function(){
        $.ajax({
            type    :           "POST",
            url     :            "includes/deconnexion.php",
            timeout:             6000 // on met le timeout à 6 secondes
        })
                .success(function (texts) {
                    var json = JSON.parse(texts);
            
            // reset le cookie
            setCookie("menu", "0", 60);
            document.location = "index.php";
            
        })
                .error(function(){
                    // La connexion à échouée
            setCookie("menu", "0", 60);
            document.location = "index.php";
            
        });
    });
    
    // Appuyer sur entrer fait se connecter
    $('#logInUsername').keydown(function(event) {
        if (event.keyCode == 13) {
            $('#logInButtonInModal').click();
            return (false);
        }
    });
    
    $('#logInPassword').keydown(function(event) {
        if (event.keyCode == 13) {
            $('#logInButtonInModal').click();
            return (false);
        }
    });
    
    $('#inscriptionBtn').click(function(){
        $('#inscriptionButtonInModal').fadeIn(function(){
            $('#inscriptionPopupID').modal('show');  
        });
    });
    
    function afficherMessageInscr(msg, c) {
        $('#displayMsgErrorInscription').fadeOut(function(){
            $('#displayMsgErrorInscription').html(msg);
            $('#displayMsgErrorInscription').removeClass("label-danger");
            $('#displayMsgErrorInscription').removeClass("label-primary");
            $('#displayMsgErrorInscription').removeClass("label-success");
            $('#displayMsgErrorInscription').removeClass("label-info");
            $('#displayMsgErrorInscription').removeClass("label-warning");
            $('#displayMsgErrorInscription').removeClass("label-default");
            $('#displayMsgErrorInscription').addClass(c);
            $('#displayMsgErrorInscription').fadeIn("slow");
        });
    }
    
    // On crée un compte
    $('#inscriptionButtonInModal').click(function(){
        
        var login = $('#loginInput').val(); // Obligatoire
        var nom = $('#nomInput').val(); // Obligatoire
        var prenom = $('#prenomInput').val(); // Obligatoire
        var ville = $('#villeInput').val();
        var age = $('#ageInput').val();
        var mdp = $('#passwordInput').val(); // Obligatoire
        
        // on verifie les valeurs!
        
        // vérifie le login
        if (login.length > 15 || login.length < 4) {
            // Erreur pas la bonne taille
            afficherMessageInscr("La taille du nom d'utilisateur doit être comprise entre 4 et 15 caractères", "label-warning");
            return;
        }
        if (nom.length == 0) {
            // Erreur pas la bonne taille
            afficherMessageInscr("Vous devez renseigner votre nom", "label-warning");
            return;
        }
        if (prenom.length == 0) {
            // Erreur pas la bonne taille
            afficherMessageInscr("Vous devez renseigner votre prénom", "label-warning");
            return;
        }
        if (isNaN(age) == true) {
            // Erreur pas la bonne taille
            afficherMessageInscr("Vous devez renseigner votre age", "label-warning");
            return;
        }
        if (mdp.length < 6) {
            // Erreur pas la bonne taille
            afficherMessageInscr("La taille du mot de passe doit être supérieur ou égale à 6 caractères", "label-warning");
            return;
        }
        
        $.ajax({
            type    :           "POST",
            url     :            "includes/inscription.php",
            timeout:             6000, // on met le timeout à 6 secondes
            data: {
                "login"  :   login,
                "nom"    :   nom,
                "prenom" :   prenom,
                "ville"  :   ville,
                "age"    :   age,
                "mdp"    :   mdp
            }
        })
                .success(function (texts) {
                    var json = JSON.parse(texts);
            if (json["ret"] == true) {
                afficherMessageInscr("Votre compte à bien été crée, vous pouvez vous connecter dès maintenant", "label-success");
                $('#inscriptionButtonInModal').fadeOut("slow");
            } else {
                afficherMessageInscr("Le nom d'utilisateur est déja utilisé", "label-danger");
            }
        })
                .error(function(){
                    afficherMessageInscr("Une erreur est survenue, veuillez réesayer", "label-danger");
        });
        
    });
    
    $('#lookclass').click(function(){
        $('#links li').eq(1).click();
        document.location = "classement.php";
    });

     $('#lookvideo').click(function(){
        $('#links li').eq(2).click();
        document.location = "video.php";
    });

      $('#lookactu').click(function(){
        $('#links li').eq(0).click();
        document.location = "actualite.php";
    });
    
    $('#lookinscription').click(function(){
        $('#inscriptionBtn').click();
    });
});