<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
$host = "127.0.0.1";
$port = 8080;
set_time_limit(0);

$sock = socket_create(AF_INET, SOCK_STREAM, 0) or die("could not create socket\n");
$result = socket_bind($sock, $host, $port) or die("could not bind to socket\n");

$result = socket_listen($sock, 3) or die("could not listen\n");

echo "Listenning for connections";

class Chat {
    function readline(){
        return rtrim(fgets(STDIN));
    }
}
do {
    $accept = socket_accept($sock) or die("coul not accept socket");
    $msj = socket_read($accept, 1024) or die("Could not read input");

    $msj = trim($msj);
    echo "Client says:\t";
    $reply = $line->readline();

    socket_write($accept, $reply, strlen($reply)) or die("could not reply");
}while (true); 
    socket_close($accept, $sock);

;?>

<?php

// server.php

$server = stream_socket_server("tcp://127.0.0.1:8080", $errno, $errorMessage);

if($server == false) {
    throw new Exception("Could not bind to socket: $errorMessage");

}

for(;;) {
    $client = @stream_socket_accept($server);

    if($client) {
        stream_copy_to_stream($client, $client);
        fclose($client);
    }
}