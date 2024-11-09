<style>
    /* Container for the picture and labels */
    .container {
        display: flex;
        align-items: flex-start;
    }

    /* Style for the picture */
    .image {
        padding: 10px;
    }

    /* Style for the labels */
    .labels {
        padding: 10px;
    }

    /* Style for each label (vertical layout) */
    .labels label {
        display: block; /* Display each label on a separate line */
        margin-bottom: 10px; /* Spacing between labels */
    }
</style>



<?php
include("include/session.php");
//Jei prisijunges Administratorius ar Valdytojas vykdomas operacija3 kodas
if ($session->logged_in &&$session->isUser()) {
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
                    <h1>Įkelti piešiniai</h1>
                </div>
                <br>

                <!-- Display pictures and input boxes -->
                <?php
                // Connect to your database here
        $conn = mysqli_connect("localhost", "stud", "stud", "vartvalds");

        if ($conn) {
            // Perform a SELECT query to retrieve data from your table
            $query = "SELECT picture, composition, style, colorfulness, themeScore, finalScore, theme FROM Art WHERE artist = '$session->username'";
            $result = mysqli_query($conn, $query);

            // Check if there are rows in the result set
            if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pictureURL = $row["picture"];
        $label1 = $row["theme"];
        $label2 = $row["composition"];
        $label3 = $row["colorfulness"];
        $label4 = $row["style"];
        $label5 = $row["themeScore"];
        $label6 = $row["finalScore"];

        $pictureURL = str_replace("contest.it/", "", $pictureURL);

        echo '<div class="container">';
        echo '<div class="image"><img src="' . $pictureURL . '" alt="Image" width="300" height="300" /></div>';
        echo '<div class="labels">';
        echo '<label>Tema: ' . $label1 . '</label>';
        echo '<label>Kompozicija: ' . $label2 . '</label>';
        echo '<label>Spalvingumas: ' . $label3 . '</label>';
        echo '<label>Stilius: ' . $label4 . '</label>';
        echo '<label>Temos atitikimas: ' . $label5 . '</label>';
        echo '<label>GalutinisBalas: ' . $label6 . '</label>';
        echo '</div>';
        echo '</div>';
                }
            } else {
                echo 'No data found.';
            }

            mysqli_close($conn);
        } else {
            echo 'Unable to connect to the database.';
        }
        ?>

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