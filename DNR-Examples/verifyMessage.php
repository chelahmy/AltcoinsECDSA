<?php

require_once '../src/BitcoinPHP/BitcoinECDSA/BitcoinECDSA.php';

use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;

$bitcoinECDSA = new BitcoinECDSA('DNR');

//To verify a message like this one
$rawMessage = "-----BEGIN DENARIUS SIGNED MESSAGE-----
Hello world!
-----BEGIN SIGNATURE-----
D6EB81Yqu5AGZtggcHjgHsEDujhinUGU3C
II2jAYE/dz94gHOZt7iVmIU7RLnnXspjjLcdgg3cqnUW7fbUa/sNti8TvZasTlJ0WT401R4oUte9OFfZbftq0oQ=
-----END DENARIUS SIGNED MESSAGE-----";

if($bitcoinECDSA->checkSignatureForRawMessage($rawMessage)) {
    echo "Message verified" . PHP_EOL;
} else {
    echo "Couldn't verify message" . PHP_EOL;
}

// alternatively
$signature = "II2jAYE/dz94gHOZt7iVmIU7RLnnXspjjLcdgg3cqnUW7fbUa/sNti8TvZasTlJ0WT401R4oUte9OFfZbftq0oQ=";
$address = "D6EB81Yqu5AGZtggcHjgHsEDujhinUGU3C";
$message = "Hello world!";

if($bitcoinECDSA->checkSignatureForMessage($address, $signature, $message)) {
    echo "Message verified" . PHP_EOL;
} else {
    echo "Couldn't verify message" . PHP_EOL;
}
