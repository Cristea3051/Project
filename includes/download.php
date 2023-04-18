<?php
$file_id = $_GET['file_id'];

// obține calea către fișierul PDF din baza de date
$sql = "SELECT post_image FROM posts WHERE id = $file_id";
// restul codului pentru interogarea bazei de date

if (file_exists($file_path)) {
    // trimite fișierul PDF către browser pentru a fi descărcat
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
    readfile($file_path);
} else {
    echo "Fișierul nu a fost găsit.";
}


?>