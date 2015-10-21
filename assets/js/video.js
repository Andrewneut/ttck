
$(document).ready(function(){
    
    // On resize le bloc principal
    $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    $(window).resize(function(){
        $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
        setSizeVideo();
    });
    
    // On modifie la taille de la vidéo pour rendre le visuel joli
    // 320 * 240
    // 640 * 480

    function setSizeVideo() {
        var h = $('.daddyvideo3:first').height();
        var w = $('.daddyvideo3:first').width();
        
        if (w >= 640 && h >= 480) {
            $('.daddyvideo4').css({"height" : "480px", "width" : "640px"});
        } else if (w >= 320 && h >= 240) {
            $('.daddyvideo4').css({"height" : "240px", "width" : "320px"});
        } else {
            $('.daddyvideo4').css({"height" : "100%", "width" : "100%"});
        }
    }
    
    setSizeVideo();
    
    $('#ajoutVideo').click(function(){
        var link = $('#inputvideo').val();
        var titre = $('#titrevideo').val();
        if (link == "") {
            // error
            alert("Il faut un lien youtube ou dailymotion pour la vidéo");
        } else {
            
            // On modifie le lien pour y mettre du embed
            // De https://youtu.be/SIdzJ1KZBlc
            // à https://www.youtube.com/embed/SIdzJ1KZBlc
            // De http://dai.ly/x2miij7
            // à http://www.dailymotion.com/embed/video/x2miij7
            
            link = link.replace("youtu.be", "www.youtube.com/embed");
            link = link.replace("dai.ly", "www.dailymotion.com/embed/video");
        
            // On essaye d'ajouter la vidéo en ajax
            $.ajax({
                type    :           "POST",
                url     :            "includes/addvideo.php",
                timeout:             6000, // on met le timeout à 6 secondes
                data:                {
                    "titre":        titre,
                    "link":         link
                }
            })
                    .success(function (texts) {
                        location.reload();
            })
                    .error(function(){
                        alert("Une erreur est survenue, veuillez réesayer");
            });

        }
        
    });
    
    $('.deleteVideo').click(function(){
        $.ajax({
            type    :           "POST",
            url     :            "includes/supprimervideo.php",
            timeout:             6000, // on met le timeout à 6 secondes
            data:                {
                "idvideo":                $(this).attr("idvideo")
            }
        })
                .success(function (texts) {
                    location.reload();
        })
                .error(function(){
                    alert('Une erreur est survenue, veuillez réesayer');
        });
    });
});

