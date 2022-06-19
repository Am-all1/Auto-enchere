<?php 
/*  si le verbe http est different de POST*/
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    die();
}
    ?>