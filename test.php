<?php

set_time_limit(0);

use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;

require_once("src/BitcoinPHP/BitcoinECDSA/BitcoinECDSA.php");

$bitcoinECDSA = new BitcoinECDSA();

$k ="0C28FCA386C7A227600B2FE50B7CAE11EC86D3BF1FBE471BE89827E19D72AA1D";
$k ="00FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFEFFFFFC";
$k ="f2831dbca97e8fda6ffe2cd3d0c1c0296b23f9f115d8d7cbf4c94e3da4f6e3bb";

$bitcoinECDSA->setPrivateKey($k);



for($i = 0; $i<100; $i++) {

	$bitcoinECDSA->generateRandomPrivateKey();

	//$bitcoinECDSA->setPrivateKey('4e5be7d3cd7685eb456e45a3c27352623bcf82fa195e77482a2297425e36e7cf');
/*
    $myPubKey = $bitcoinECDSA->getPubKeyPoints();
    echo $bitcoinECDSA->calculateYWithX($myPubKey['x'])."<br/>";
    echo gmp_strval(gmp_mod(gmp_pow(gmp_init($myPubKey['y'],16),2),gmp_init("FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFEFFFFFC2F",16)),16)."<br/>";
*/
	$privKey = $bitcoinECDSA->getPrivateKey();
	$sxPubKey = exec("echo -n \"$privKey\" | sx pubkey",$output,$retval);

	if($bitcoinECDSA->getPubKey() != $sxPubKey) {
		throw new Exception('Something went wrong for privateKey : ' . $bitcoinECDSA->getPrivateKey() . ', please report us the issue');
	}

	$sxAddr =  exec("echo -n \"$privKey\" | sx addr");
    $addr   = $bitcoinECDSA->getAddress();
	//echo "<i>".$sxAddr."</i><br/>";
	//echo "<b>".$bitcoinECDSA->getAddress()."</b><br/>";
	if($addr != $sxAddr) {
		throw new Exception('Something went wrong for privateKey : ' . $bitcoinECDSA->getPrivateKey() . ', please report us the issue');
	}

    if(!$bitcoinECDSA->validateAddress($addr)) {
        throw new Exception('Something went wrong while validating address : ' . $addr . ' with private key : ' . $bitcoinECDSA->getPrivateKey() . ', please report us the issue');
    }

    if(!$bitcoinECDSA->validateWifKey($bitcoinECDSA->getWif())) {
        throw new Exception('Something went wrong while validating Wif key : ' . $bitcoinECDSA->getWif() . ' with private key : ' . $bitcoinECDSA->getPrivateKey() . ', please report us the issue');
    }

	$ucSxPubKey = exec("echo -n \"$privKey\" | sx pubkey false",$output,$retval);
	//uncompressed address and pubkey
	if($bitcoinECDSA->getUncompressedPubKey() != $ucSxPubKey) {
		throw new Exception('Something went wrong for privateKey : ' . $bitcoinECDSA->getPrivateKey() . ', please report us the issue');
	}

	$ucSxAddr = exec("echo -n \"$privKey\" | sx pubkey false | sx addr",$output,$retval);
	//uncompressed address and pubkey
	if($bitcoinECDSA->getUncompressedAddress() != $ucSxAddr) {
		throw new Exception('Something went wrong for privateKey : ' . $bitcoinECDSA->getPrivateKey() . ', please report us the issue');
	}

}

echo "Tests ended successfully";

/*
print_r($bitcoinECDSA->getPrivateKey());

echo "<br/>";

print_r($bitcoinECDSA->getWif());

echo "<br/>";

print_r($bitcoinECDSA->getPubKey());

echo "<br/>";

print_r($bitcoinECDSA->getAddress());
*/
?>
