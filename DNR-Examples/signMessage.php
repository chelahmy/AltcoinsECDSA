<?php

require_once '../src/BitcoinPHP/BitcoinECDSA/BitcoinECDSA.php';

use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;

$bitcoinECDSA = new BitcoinECDSA('DNR');
$bitcoinECDSA->generateRandomPrivateKey(); //generate new random private key

$message = "Test message";
$signedMessage = $bitcoinECDSA->signMessage($message);

echo "signed message:" . PHP_EOL;
echo $signedMessage . PHP_EOL;

/**
 * Will print something like this:

-----BEGIN DENARIUS SIGNED MESSAGE-----
Test message
-----BEGIN SIGNATURE-----
DD3yDAvvtgFbXVnNwV69b8gDGRLR4UghFi
IBbaxwHyUjLP2T50mIusMe3ATi2vA6JaI8l6V8Hnm4n2FmSxhtGwal4YFI+7xfPB/mDX5dmp17DJ84LclXPlgd4=
-----END DENARIUS SIGNED MESSAGE-----
 */


// If you only want the signature you can do this
$signature = $bitcoinECDSA->signMessage($message, true);

echo "signature:" . PHP_EOL;
echo $signature . PHP_EOL;
/**
 * Will print something like this:
IBbaxwHyUjLP2T50mIusMe3ATi2vA6JaI8l6V8Hnm4n2FmSxhtGwal4YFI+7xfPB/mDX5dmp17DJ84LclXPlgd4=
 */
