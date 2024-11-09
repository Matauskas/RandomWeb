<style>
    .container {
        display: flex;
        align-items: center;
    }

    .image {
        flex: 1;
        padding: 10px;
    }

    .inputs {
        flex: 2;
        padding: 10px;
    }

    .input-container {
        margin-bottom: 10px;
    }

    .input-container input {
        display: block;
    }
</style>
<?php
include("include/session.php");
//Jei prisijunges Administratorius ar Valdytojas vykdomas operacija3 kodas
if ($session->logged_in && ($session->isAdmin() || $session->isManager())) {
    ?>

    <html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/>
        <title>Vertinimas</title>
        <link href="styles.css" rel="stylesheet" type="text/css"/>
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
                <table style="border-width: 2px; border-style: dotted;">
                    <tr>
                        <td>
                            Atgal į [<a href="index.php">Pradžia</a>]
                        </td>
                    </tr>
                </table>
                <br>
                <div style="text-align: center; color: green">
                    <h1>Piešinių vertinimas</h1>
                </div>
                <br>

                <!-- Display pictures and input boxes -->
                <?php
                // Connect to your database here
				$conn = mysqli_connect("localhost", "stud", "stud", "vartvalds");
$sql = "SELECT picture, theme, artist FROM Art";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pictureURL = $row["picture"];
        $theme = isset($row["theme"]) ? $row["theme"] : 'No Theme';
		$artist = $row["artist"];

        $pictureURLtemp = str_replace("contest.it/", "", $pictureURL);

        echo '<form method="post" action="process.php">';
echo '<div class="container">';
echo '<div class="image"><img src="'.$pictureURLtemp.'" width="100" height="100"></div>';
echo '<div class="inputs">';
echo '<label>Theme: '.$theme.'</label>';
echo '<label>Artist: '.$artist.'</label>';
echo '<div class="input-container"><input type="text" name="Composition" placeholder="Composition"></div>';
echo '<div class="input-container"><input type="text" name="Colorfulness" placeholder="Colorfulness"></div>';
echo '<div class="input-container"><input type="text" name="Style" placeholder="Style"></div>';
echo '<div class="input-container"><input type="text" name="ThemeScore" placeholder="Theme Score"></div>';
echo '<input type="hidden" name="pictureURL" value="'.$pictureURL.'">';
echo '<input type="submit" name="subscores" value="Submit">';
echo '</div>';
echo '</div>';
echo '</form>';

    }
}

                // Close the database connection here
                ?>
                <!-- End of display -->

                <tr>
                    <td>
                        <?php
                        include("include/footer.php");
                        ?>
                    </td>
                </tr>
            </td>
        </tr>
    </table>
    </body>
    </html>

    <?php
    //Jei vartotojas neprisijungęs arba prisijunges, bet ne Administratorius
    //ar ne Valdytojas - užkraunamas pradinis puslapis
} else {
    header("Location: index.php");
}
?>


