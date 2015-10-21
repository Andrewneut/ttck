<?php 
include("includes/connexion_inc.php");
include("includes/verif_connexion.php");
include("includes/Haut_de_page.php");
    
    
$sql="SELECT * FROM utilisateurs where login='" . $pseudo . "'";
$query = mysql_query($sql) or die (mysql_error());
while($data = mysql_fetch_array($query))
	{
		$nom = $data['nom'];
		$prenom = $data['prenom'];
		$ville = $data['ville'];
		$age = $data['age'];
	}
            
 ?>

<link href="assets/css/index.css" rel="stylesheet">
<link href="assets/css/monProfil.css" rel="stylesheet">
<script type="text/javascript" src="assets/js/jquery-2.0.2.min.js"></script>
<script>
    $(function(){
        
        // On resize le bloc principal
        $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
        $(window).resize(function(){
            $('.container1').css({"height" : ($(window).height() - 52 - 20 - 50) + "px"});
        });
        
        var url = "monProfil.php";
        var croix = "<a href='#' id='croix' class='cacher_notif'>&times</a>";
        
        function setClickPencil() {
            $('.glyphicon-pencil').unbind("click");
            $('.glyphicon-pencil').click(function(){
                var attribut = $(this).attr('id');
                switch(attribut){
                    case "glypNom": // Dans le cas ou on modifie le nom
                        var oldname = $('#contentNom').children("span:first").html();
                        $('#contentNom').html("<input type='text' name='nom' value='" + oldname + "' class='nom' /><a href='#'><div class='glyphicon glyphicon-ok' id='valid'></div></a><a href='#'><div class='glyphicon glyphicon-remove' id='cancel'></div></a>");
                        $('.glyphicon-remove').click(function(){
                            $('#contentNom').html('<span>' + oldname + '</span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypNom" ></div></a>');
                        });
                        $('.glyphicon-ok').click(function(){
                            var contentNom = $('.nom').val();
                            $.post("Profil.php",{nom:contentNom}, function(data){
                                $('#contentNom').html('<span>' + contentNom + '</span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypNom" ></div></a>');
                                setClickPencil();
                            });
                        });
                        break;
                    case "glypPrenom": // Dans le cas ou on modifie le prenom
                        var oldname = $('#contentPrenom').children("span:first").html();
                        $('#contentPrenom').html("<input type='text' name='nom' value='" + oldname + "' class='prenom' /><a href='#'><div class='glyphicon glyphicon-ok' id='valid'></div></a><a href='#'><div class='glyphicon glyphicon-remove' id='cancel'></div></a>");
                        $('.glyphicon-remove').click(function(){
                            $('#contentPrenom').html('<span>' + oldname + '</span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypPrenom" ></div></a>');
                        });
                        $('.glyphicon-ok').click(function(){
                            var contentPrenom = $('.prenom').val();
                            $.post("Profil.php",{prenom:contentPrenom}, function(data){
                                $('#contentPrenom').html('<span>' + contentPrenom + '</span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypPrenom" ></div></a>');
                                setClickPencil();
                            });
                        });
                        break;
                    case "glypPassword":
                        try{
                            $('#contentPassword').html("<input type='password' name='nom' value='' class='password' /><a href='#'><div class='glyphicon glyphicon-ok' id='valid'></div></a><a href='#'><div class='glyphicon glyphicon-remove' id='cancel'></div></a>");
                            $('.glyphicon-remove').click(function(){
                                $('#contentPassword').html('<span>*****</span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypPassword" ></div></a>');
                            });
                            $('.glyphicon-ok').click(function(){
                                var contentPass = $('.password').val();
                                $.post("Profil.php",{password:contentPass}, function(data){
                                    if(data.result=="invalid_short")
                                    {
                                        
                                        $('#contentPassword').html("<p class='error'>Mot de passe trop court !"+croix+"</p> ");
                                        $('#croix').click(function(){
                                            $('body').load(url);
                                        });				
                                    }
                                    else
                                    {
                                        $('#contentPassword').html('<span>*****</span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypPassword" ></div></a>');
                                        setClickPencil();
                                    }
                                    
                                }, 'json');
                            });
                        }
                        catch(err){alert(err.message);}
                        break;

                    case "glypVille": // Dans le cas ou on modifie la ville
                        var oldname = $('#contentVille').children("span:first").html();
                        $('#contentVille').html("<input type='text' name='ville' value='" + oldname + "' class='ville' /><a href='#'><div class='glyphicon glyphicon-ok' id='valid'></div></a><a href='#'><div class='glyphicon glyphicon-remove' id='cancel'></div></a>");
                        $('.glyphicon-remove').click(function(){
                            $('#contentVille').html('<span>' + oldname + '</span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypVille" ></div></a>');
                        });
                        $('.glyphicon-ok').click(function(){
                            var contentVille = $('.ville').val();
                            $.post("Profil.php",{ville:contentVille}, function(data){
                                $('#contentVille').html('<span>' + contentVille + '</span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypVille" ></div></a>');
                                setClickPencil();
                                $('body').load(url);
                            });
                        });
                        break;
                        

                    case "glypAge": // Dans le cas ou on modifie la ville
                        var oldname = $('#contentAge').children("span:first").html();
                        $('#contentAge').html("<input type='text' name='age' value='" + oldname + "' class='age' /><a href='#'><div class='glyphicon glyphicon-ok' id='valid'></div></a><a href='#'><div class='glyphicon glyphicon-remove' id='cancel'></div></a>");
                        $('.glyphicon-remove').click(function(){
                            $('#contentAge').html('<span>' + oldname + '</span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypAge" ></div></a>');
                        });
                        $('.glyphicon-ok').click(function(){
                            var contentAge = $('.age').val();
                            $.post("Profil.php",{age:contentAge}, function(data){
                                $('#contentAge').html('<span>' + contentAge + '</span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypAge" ></div></a>');
                                setClickPencil();
                                $('body').load(url);
                            });
                        });
                        break;
                        
                    }
                });
            }
            setClickPencil();   
            
            
        });
        
</script>


<div class="panel panel-success">
    <div class="panel-heading">Votre espace membre :</div>
    <div class="panel-body">
        <div class="panel panel-primary">
            <div class="panel-heading">Votre nom :</div>
            <div class="panel-body" id="contentNom" >
                <span><?php echo $nom ?></span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypNom" ></div></a>
                
            </div>		
            
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading">Votre prenom :</div>
            <div class="panel-body" id="contentPrenom">
                <span><?php echo $prenom ?></span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypPrenom"></div></a>
                
            </div>		
            
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading">Votre mot de passe :</div>
            <div class="panel-body" id="contentPassword">
                <span>*****</span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypPassword"></div></a>
                
            </div>		
            
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading">Votre ville :</div>
            <div class="panel-body" id="contentVille">
                <span><?php echo $ville ?></span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypVille"></div></a>
                
            </div>		
            
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading">Votre Age :</div>
            <div class="panel-body" id="contentAge">
                <span><?php echo $age ?></span><a href="#"><div class="glyphicon glyphicon-pencil" id="glypAge"></div></a>
                
            </div>		
            
        </div>
        
    </div>		
    
</div>
    
<?php
    
include("includes/Bas_de_page.php");
    
?>