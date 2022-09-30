<?php
header('Content-Type: text/csv');
header('Content-Length: 1000000');
header('Content-Disposition: attachment; filename = "download.zip"');
for ($i=0; $i < 1000 ; $i++) { 
    echo str_repeat(".",1000);
    usleep(50000);
}
?>