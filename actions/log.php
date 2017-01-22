<?php

echo file_put_contents('logs/log.txt', $text.PHP_EOL , FILE_APPEND | LOCK_EX);
