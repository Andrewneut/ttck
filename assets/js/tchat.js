var url = "tchatAjax.php";
var lastid=0;
var test =0;
var timer = setInterval(getMessage,5000);
var connectTimer = setInterval(getConnected,1000);

$(function(){
    $("#monTchat").submit(function(){
        var message = $("#monTchat textarea").val(); // Je récupère le contenus du textarea
        if (message == "") {
            return;
        }
        showLoader("#monTchat");
        clearInterval(timer); // Des qu'on post un message on démarre le timer
        
        $.post(url,{action:"addMessage",message:message},function(data){
            if(data.erreur=="ok"){
                test++;
                getMessage();
                $("#monTchat textarea").val("");
            } else
            {
                alert(data.erreur);
            }
            timer = setInterval(getMessage,5000);
            hideLoader();
        },'json');
        viderTchat();
        return false;
    });
});

function getMessage()
{
    $.post(url,{action:"getMessages",lastid:lastid},function(data){
        if(data.erreur=="ok"){
            $("#tchat").append(data.result);
            lastid = data.lastid;
        } else
        {
            alert(data.erreur);
        }
        
        hideLoader();
    },'json');
    return false;
}


function getConnected()
{
    $.post(url,{action:"getConnected"},function(data){
        if(data.erreur=="ok"){
            $("#connected").empty().append(data.result);
        } else
        {
            alert(data.erreur);
        }
    },'json');
    return false;
}


function showLoader(div)
{
    $(div).append('<div class="loader"><img src="Img/ajax-loader.gif"></div>');
    $(".loader").fadeTo(500,0.6);
    
}

function hideLoader()
{
    $("monTchat").show();
    $(".loader").fadeOut(500,function(){
        $(".loader").remove();
    });	
}

function viderTchat()
{
    
}

$(document).ready(function(){
    // On resize le bloc principal
    $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    $(window).resize(function(){
        $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
    });
    
    $('#textareamsg').keydown(function(event) {
        if (event.keyCode == 13) {
            $('#submit').click();
            return (false);
        }
    });
});