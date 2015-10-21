function isNumber(obj) { return !isNaN(parseFloat(obj)) }

$(document).ready(function(){
    
    // On resize le bloc principal
    $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    $(window).resize(function(){
        $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    });
    
    $('.changementClassement').click(function(){
        // On récupère l'ID du user
        var iduser = $(this).attr("classementid");
        var nouveauclassement = $(this).parent().parent().children("input:first").val();
       
        if (isNumber(nouveauclassement) === false) {
            nouveauclassement = 0;
        }
       
        // changement le classement
       
        $.ajax({
            type    :           "POST",
            url     :            "includes/changementclassement.php",
            timeout:             6000, // on met le timeout à 6 secondes
            data:                {
                "iduser":                iduser,
                "nouveauclassement":     nouveauclassement
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

