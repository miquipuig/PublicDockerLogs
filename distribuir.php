<?php

echo "Eliminando imagenes<br/>";
echo nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker rm -f intouch_web_1" ));
echo nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker rm -f intouch_db_1" ));
echo "Eliminando imagenes obsoletas:<br/>";
echo nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker volume rm $(ssh ubuntu@172.17.0.1 -i staging.pem docker volume ls -qf dangling=true)" ));
echo "Actualizando repositorio<br/>";
echo  nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem git -C /home/ubuntu/intouch/ pull" ));
echo "Compilando nuevas imágenes<br/>";
echo  nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker-compose -f /home/ubuntu/inTouch/docker-compose.yml build" ));

echo "Arrancando nuevas imagenes<br/>";
echo  nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker-compose -f /home/ubuntu/inTouch/docker-compose.yml up -d" ));
echo "Imagenes arrancadas";
?>
