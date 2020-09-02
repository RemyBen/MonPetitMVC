<?php

echo "<p>Nombre de clients trouvés : ".count($clients) ."</p>";

foreach ($clients as $client){
    echo $client->getId() . " " . $client->getTitreCli() . " " . $client->getPrenomCli() . " " . $client->getNomCli() . "<br>";
}

