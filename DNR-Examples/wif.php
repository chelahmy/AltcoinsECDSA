<?php

require_once '../src/AltcoinsECDSA.php';

use AltcoinsECDSA\AltcoinsECDSA;

$altcoinECDSA = new AltcoinsECDSA('DNR');
$altcoinECDSA->generateRandomPrivateKey(); //generate new random private key

$wif = $altcoinECDSA->getWif();
$address = $altcoinECDSA->getAddress();
echo "Address : " . $address . PHP_EOL;
echo "WIF : " . $wif . PHP_EOL;

unset($altcoinECDSA); //destroy instance

//import wif
$altcoinECDSA = new AltcoinsECDSA('DNR');
if($altcoinECDSA->validateWifKey($wif)) {
    $altcoinECDSA->setPrivateKeyWithWif($wif);
    $address = $altcoinECDSA->getAddress();
    echo "imported address : " . $address . PHP_EOL;
} else {
    echo "invalid WIF key" . PHP_EOL;
}
