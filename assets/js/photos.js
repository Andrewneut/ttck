
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

function addHidden(theForm, key, value) {
    // Create a hidden input element, and append it to the form:
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = key;'name-as-seen-at-the-server';
    input.value = value;
    theForm.appendChild(input);
}

$(document).ready(function(){
    
    // On resize le bloc principal
    $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    $(window).resize(function(){
        $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    });
    $('#ajoutPhoto').click(function(){
        var theForm = document.forms['formaddphotoname'];
        if (typeof getUrlVars()["tournoi"] !== "undefined"){
            addHidden(theForm, 'tournoi', getUrlVars()["tournoi"]);
        }
        $('#formaddphoto').submit(); 
    });
    
    var err_code = getUrlVars()["result"];
    if (typeof err_code !== "undefined") {
        err_code = parseInt(err_code);
        if (err_code === 1) {
            // File is not an image
            $('#errDisplay').html("Le fichier n'est pas une image");
            $("#errDisplay").show().css("display","inline-block");;
        } else if (err_code === 2) {
            // Sorry, your file is too large
            $('#errDisplay').html("Le fichier est trop lourd > 5mo");
            $("#errDisplay").show().css("display","inline-block");;
        } else if (err_code === 3) {
            // Sorry, only JPG, JPEG, PNG & GIF files are allowed
            $('#errDisplay').html("L'image dois être au format jpg, jpeg, png ou gif");
            $("#errDisplay").show().css("display","inline-block");;
        } else if (err_code === 4) {
            // Sorry, there was an error uploading your file
            $('#errDisplay').html("Une erreur est survenue durant le téléchargement de l'image");
            $("#errDisplay").show().css("display","inline-block");;
        } else if (err_code === 666) {
            $('#errDisplay').html("Vous devez être connecté pour télécharger une image");
            $("#errDisplay").show().css("display","inline-block");;
        } else {
            $('#goodDisplay').html("L'image à été téléchargée avec succès");
            $("#goodDisplay").show().css("display","inline-block");;  
        }
    }
    
    $('.deletePhoto').click(function(){
        $.ajax({
            type    :           "POST",
            url     :            "includes/supprimerphoto.php",
            timeout:             6000, // on met le timeout à 6 secondes
            data:                {
                "idphoto":                $(this).attr("idphoto"),
                "pathphoto":              $(this).attr("pathphoto")
            }
        })
                .success(function (texts) {
                    var tournoi = 0;
            if (typeof getUrlVars()["tournoi"] !== "undefined"){
                tournoi = getUrlVars()["tournoi"];
            }
           
            var old = window.location;
            window.location = window.location.pathname + "?tournoi=" + tournoi;
            if (old == window.location) {
                location.reload();
            }
        })
                .error(function(){
                    // La connexion à échouée
                    var tournoi = 0;
            if (typeof getUrlVars()["tournoi"] !== "undefined"){
                tournoi = getUrlVars()["tournoi"];
            }
            var old = window.location;
            window.location = window.location.pathname + "?tournoi=" + tournoi;
            if (old == window.location) {
                location.reload();
            }
        });
    });
});

