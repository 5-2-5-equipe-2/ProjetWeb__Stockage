<?php

$connection = ftp_connect($server);

$login = ftp_login($connection, $ftp_user_name, $ftp_user_pass);

if (!$connection || !$login) { die('Connection attempt failed!'); }

$upload = ftp_put($connection, $dest, $source, $mode);

if (!$upload) { echo 'FTP upload failed!'; }

ftp_close($connection);