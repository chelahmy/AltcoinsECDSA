<?php

require_once '../src/AltcoinsECDSA.php';

use AltcoinsECDSA\AltcoinsECDSA;

$altcoinECDSA = new AltcoinsECDSA('DNR');
$altcoinECDSA->generateRandomPrivateKey(); //generate new random private key
$address = $altcoinECDSA->getAddress(); //compressed Altcoin address
echo "Address: " . $address . PHP_EOL;

//Validate an address (Verify the checksum)
if($altcoinECDSA->validateAddress($address)) {
    echo "The address is valid" . PHP_EOL;
} else {
    echo "The address is invalid" . PHP_EOL;
}
