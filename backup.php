<?php
 
/* 
 * This script only works on linux.
 * It keeps only 31 backups of past 31 days, and backups of each 1st day of past months.
 */
 
define('DB_HOST', 'localhost');
define('DB_NAME', 'delhipolice');
define('DB_USER', 'root');
define('DB_PASSWORD', 'ghHYGb46889.gh');
define('BACKUP_SAVE_TO', '/var/www/html/backup'); // without trailing slash
 
$time = time();
$day = date('j', $time);
if ($day == 1) {
    $date = date('Y-m-d', $time);
} else {
    $date = $day;
}
 
$backupFile = BACKUP_SAVE_TO . '/' . DB_NAME . '_' . $date . '.gz';
if (file_exists($backupFile)) {
    unlink($backupFile);
}
$command = 'mysqldump --opt -h ' . DB_HOST . ' -u ' . DB_USER . ' -p\'' . DB_PASSWORD . '\' ' . DB_NAME . ' | gzip > ' . $backupFile;
if(system($command)){
    echo "success";
}else echo "failed".$command;
 
?>