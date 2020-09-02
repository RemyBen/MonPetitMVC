<?php

echo "<p>Nombre de commandes trouvées : ".count($commandes) ."</p>";

foreach ($commandes as $commande){
    echo $commande->getId() . " - " . $commande->getDateCde() . " - " . $commande->getNoFacture() . " - " . $commande->getIdClient() . "<br>";
}
