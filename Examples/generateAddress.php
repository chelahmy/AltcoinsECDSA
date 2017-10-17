<?php

require_once '../src/AltcoinsECDSA.php';

use AltcoinsECDSA\AltcoinsECDSA;

$bitcoinECDSA = new AltcoinsECDSA();
$bitcoinECDSA->generateRandomPrivateKey(); //generate new random private key
$address = $bitcoinECDSA->getAddress(); //compressed Bitcoin address
echo "Address: " . $address . PHP_EOL;

//Validate an address (Verify the checksum)
if($bitcoinECDSA->validateAddress($address)) {
    echo "The address is valid" . PHP_EOL;
} else {
    echo "The address is invalid" . PHP_EOL;
}
