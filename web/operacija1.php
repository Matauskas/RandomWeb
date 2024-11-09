<?php
include("include/session.php");
if ($session->isUser()) {
    ?>
    <html>
        <head>
            <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/>
            <title>Piešinio įkėlimas</title>
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
                include("include/meniu.php");
                ?>
                <table style="border-width: 2px; border-style: dotted;"><tr><td>
                    Atgal į [<a href="index.php">Pradžia</a>]
                </td></tr></table>
                <br>
                <div style="text-align: center;color:green">
                    <h1>Piešinio įkėlimas</h1>
                </div>
                <br>

                <!-- Combine the image upload and dropdown list into one form -->
<form action="process.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <label for="dropdown">Select an option:</label>
    <select name="dropdown" id="dropdown">
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
        <option value="option4">Option 4</option>
    </select>
    <input type="submit" name="subupload" value="Submit">
</form>


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