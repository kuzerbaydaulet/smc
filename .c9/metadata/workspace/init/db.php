{"changed":false,"filter":false,"title":"db.php","tooltip":"/init/db.php","value":"<?php \n\n\t$connection = new mysqli(\"localhost\", \"root\", \"\", \"smc\");\n\n\tif( $connection->connect_error ){\n\t\tdie(\"Connection error!\");\n\t}\n\n ?>","undoManager":{"mark":-1,"position":-1,"stack":[]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":7,"column":0},"end":{"row":7,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1470138669307}