<?php


printf( nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker logs intouch_web_1" )))

//echo shell_exec ( "pwd" )


?>
