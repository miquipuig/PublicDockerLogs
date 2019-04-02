<?php
echo "<h2>Despliegue de nueva version</h2>";
echo "<b><a href='index.html'> <----Volver a la consola</a></b></br>";
echo "<h4>Eliminando imagenes:</h4>";
echo nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker rm -f intouch_web_1" ));
echo "<h4>Eliminando imagenes obsoletas:</h4>";
echo nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker volume rm $(ssh ubuntu@172.17.0.1 -i staging.pem docker volume ls -qf dangling=true)" ));
echo "<h4>Actualizando repositorio des de github:</h4>";
echo  nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem git -C /home/ubuntu/inTouch/ pull" ));
echo "<h4>Compilando nuevas imagenes:</h4>";
echo  nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker-compose -f /home/ubuntu/inTouch/docker-compose.yml build" ));
echo "<h4>Arrancando nuevas imagenes:</h4>";
echo  nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker-compose -f /home/ubuntu/inTouch/docker-compose.yml up -d" ));
echo "Imagenes arrancadas";
?>
