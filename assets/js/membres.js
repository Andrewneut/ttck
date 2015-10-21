function isNumber(obj) { return !isNaN(parseFloat(obj)) }

$(document).ready(function(){
    
    // On resize le bloc principal
    $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    $(window).resize(function(){
        $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    });
    
    $('.removeMembre').unbind("click");
    $('.removeMembre').click(function(){
        var userid = $(this).attr("userid");
        $('#checkPopupID').modal("show");
        $('#yesDelete').unbind('click');
        $('#yesDelete').click(function(){
            $.ajax({
                type    :           "POST",
                url     :            "includes/supprimercompte.php",
                timeout:             6000, // on met le timeout à 6 secondes
                data:                {
                    "id":                userid
                }
            })
                    .success(function (texts) {
           
                        location.reload();
           
            })
                    .error(function(){
                        // La connexion à échouée
           
                location.reload();
           
            });
        });
    });
    
    $('.initPasswordMembre').unbind('click');
    $('.initPasswordMembre').click(function(){
        var userid = $(this).attr("userid");
        $('#checkReinitPopupID').modal("show");
        $('#yesDelete2').unbind('click');
        $('#yesDelete2').click(function(){
            $('#checkReinitPopupID').modal("hide");
            $.ajax({
                type    :           "POST",
                url     :            "includes/reinitialisermdp.php",
                timeout:             6000, // on met le timeout à 6 secondes
                data:                {
                    "id":                userid
                }
            })
                    .success(function (texts) {
                        
                    var json = JSON.parse(texts);
                        if (json["ret"] == false) {
                            $('#errorChangePassword').modal("show");
                        } else {
                            // On affiche le nouveau mot de passe
                            $('#successNewPassword').html(json["newMdp"]);
                            $('#successChangePassword').modal("show");
                        }
                    })
                    .error(function(){
                        // La connexion à échouée
                        // On affiche une erreur
                        $('#errorChangePassword').modal("show");
                    });
        });
    });
    
    
});

