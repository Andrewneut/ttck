
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

$(document).ready(function(){
    
    // On resize le bloc principal
    $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    $(window).resize(function(){
        $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
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
            $('#errDisplay').html("L'image est trop lourde > 5mo");
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
            $('#goodDisplay').html("L'actualité à bien été ajouté");
            $("#goodDisplay").show().css("display","inline-block");;  
        }
    }
    
    $('#ajoutActu').click(function(){
        $('#formaddactu').submit(); 
    });
    
    $('.deleteActu').click(function(){
        $.ajax({
            type    :           "POST",
            url     :            "includes/supprimeractu.php",
            timeout:             6000, // on met le timeout à 6 secondes
            data:                {
                "idactu":                $(this).attr("idactu"),
                "pathphoto":              $(this).attr("pathphoto"),
                "photo":                  $(this).attr("photo")
            }
        })
                .success(function (texts) {
                    window.location = window.location.pathname;
        })
                .error(function(){
                    // La connexion à échouée
            window.location = window.location.pathname;
        });
    });
    
});

