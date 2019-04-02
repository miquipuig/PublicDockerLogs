<?php
echo "<h2>Resetear imagen base de datos</h2>";
echo "<b><a href='index.html'> <----Volver a la consola</a></b></br>";

echo "<h4>Eliminando imagenes:</h4>";
echo nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker rm -f intouch_db_1" ));
echo nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker rm -f intouch_web_1" ));
echo "<h4>Eliminando imagenes obsoletas:</h4>";
echo nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker volume rm $(ssh ubuntu@172.17.0.1 -i staging.pem docker volume ls -qf dangling=true)" ));
echo "<h4>Arrancando nuevas imagenes:</h4>";
echo  nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker-compose -f /home/ubuntu/inTouch/docker-compose.yml up -d" ));
echo "Imagenes arrancadas";
echo "<br><br><b><a href='index.html'> <----Volver a la consola</a></b>";

?>

