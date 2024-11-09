<?php
include("include/session.php");
if ($session->logged_in) {
    ?>
    <html>
        <head>  
            <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/> 
            <title>Galerija</title>
            <link href="styles.css" rel="stylesheet" type="text/css" />
        </head>
        <body>
            <table class="center" ><tr><td>
            <center class="tekstas">Piešimo konkursas</center>
        </td></tr>
			<tr><td> 
				<center>Kompiuterių tinklai ir internetinės technologijos</center> <br><br><br>
				</td></tr><tr><td> 
                        <?php
                        //Jei vartotojas prisijungęs
                        ?>
                        <table style="border-width: 2px; border-style: dotted;"><tr><td>
                                    Atgal į [<a href="index.php">Pradžia</a>]
                                </td></tr></table>               
                        <br> 
                        <div style="text-align: center;color:green">                   
                            <h1>GAlerija.</h1>
                            Nerodomas meniu, rodoma nuoroda į pradžią.                   
                        </div> 
                        <br>  
                <tr><td>
                        <?php
                        include("include/footer.php");
                        ?>
                    </td></tr>      
            </table>
        </body>
    </html>
    <?php
    //Jei vartotojas neprisijungęs, užkraunamas pradinis puslapis  
} else {
    header("Location: index.php");
}
?>