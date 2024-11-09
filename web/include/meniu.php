<?php
// Formuojamas meniu.
if (isset($session) && $session->logged_in) {
    $path = "";
    if (isset($_SESSION['path'])) {
        $path = $_SESSION['path'];
        unset($_SESSION['path']);
    }
    ?>
    <table width=100% border="0" cellspacing="1" cellpadding="3" class="meniu">
        <?php
        echo "<tr><td>";
        echo "Prisijungęs vartotojas: <b>$session->username</b> <br>";
        echo "</td></tr><tr><td>";
		if($session->isUser()){
		echo "[<a href=\"" . $path . "userinfo.php?user=$session->username\">Mano piešiniai</a>] &nbsp;&nbsp;";	
		}
        echo "[<a href=\"" . $path . "useredit.php\">Redaguoti paskyrą</a>] &nbsp;&nbsp;"
        . "[<a href=\"" . $path . "operacija2.php\">Galerija</a>] &nbsp;&nbsp;";
        if ($session->isUser()) {
            echo "[<a href=\"" . $path . "operacija1.php\">Piešinio įkėlimas</a>] &nbsp;&nbsp;";
            // Trečia operacija rodoma valdytojui ir administratoriui
		}
            if ($session->isManager() || $session->isAdmin()) {
                echo "[<a href=\"" . $path . "operacija3.php\">Vertinimas</a>] &nbsp;&nbsp;";
            }
            // Administratoriaus sąsaja rodoma tik administratoriui
            if ($session->isAdmin()) {
                echo "[<a href=\"" . $path . "admin/admin.php\">Administratoriaus sąsaja</a>] &nbsp;&nbsp;";
            }
            echo "[<a href=\"" . $path . "process.php\">Atsijungti</a>]";
            echo "</td></tr>";
        
    }
    ?>
    </table>

