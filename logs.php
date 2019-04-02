<?php

echo "<h2>Logs Intouch</h2>";
echo "<b><a href='index.html'> <----Volver a la consola</a></b></br></br>";
printf( nl2br (shell_exec ( "ssh ubuntu@172.17.0.1 -i staging.pem docker logs intouch_web_1" )))
?>
<br><form action="logs.php" method="post" enctype="multipart/form-data">
    <input type="submit" value="Refresh" name="submit">
</form>



