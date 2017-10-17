WARNING
===============

This piece of software is provided without warranty of any kind, use it at your own risk.

Bitcoin, Denarius and Altcoins Digital Signing
============================================================

Bitcoin digital signing is the other big thing apart from the blockchain. Every digital wallet has the capability to sign arbitary messages using a private key embedded secretly in the wallet. And anyone with the Bitcoin address paired to the private key can verify the signed messages. This is also true with [Denarius](https://denarius.io/) and Bitcoin-based Altcoins.

A Bitcoin address is derived from the public key of the private-public key pair generated within the wallet. Only those who own the private key can sign the message. Thus, a verification will proof that the owner of the address had signed the message.

The verification of the signed messages doesn't have to be done within the wallet. This PHP code implements the algorithm to verify digitally signed messages by Bitcoin, Denarius and Bitcoin-based Altcoins. Denarius is a Bitcoin-based Altcoin.

Here is another one in C++ https://github.com/chelahmy/dnrverify

REQUIREMENTS
===============

*php 5.4.0* or newer.

*php5-gmp* needs to be installed.

If you want to launch the test file you need to be under a unix system with libbitcoin intalled on it.

USAGE
===============

**Instantiation**

```php
use AltcoinsECDSA\AltcoinsECDSA;
require_once("src/AltcoinsECDSA.php");
$altcoinECDSA = new AltcoinsECDSA();
```
for Denarius
```php
$altcoinECDSA = new AltcoinsECDSA('DNR');
```


**Set a private key**

```php
$altcoinECDSA->setPrivateKey($k);
```
examples of private keys :

4C28FCA386C7A227600B2FE50B7CAE11EC86D3BF1FBE471BE89827E19D72AA1D
00FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFEFFFFFC

**Generate a random private key**

```php
$altcoinECDSA->generateRandomPrivateKey($nonce);
```

The nonce is optional, typically the nonce is a chunck of random data you get from the user. This can be mouse coordinates.
Using a nonce adds randomness, which means the generated private key is stronger.

**Get the private key**

```php
$altcoinECDSA->getPrivateKey();
```

Returns the private key.

**Get the Wif**

```php
$altcoinECDSA->getWif();
```

returns the private key under the Wallet Import Format


**Get the Public Key**

```php
$altcoinECDSA->getPubKey();
```
Returns the compressed public key.
The compressed PubKey starts with 0x02 if it's y coordinate is even and 0x03 if it's odd, the next 32 bytes corresponds to the x coordinates.

Example : 0226c50013603b085fbc26411d5d7e564b252d88964eedc4e01251d2d495e92c29

**Get the Uncompressed Public Key**

```php
$altcoinECDSA->getUncompressedPubKey();
```

Returns the The uncompressed PubKey.
The uncompressed PubKey starts with 0x04, the next 32 bytes are the x coordinates, the last 32 bytes are the y coordinates.

Example : 04c80e8af3f1b7816a18aa24f242fc0740e9c4027d67c76dacf4ce32d2e5aace241c426fd288a9976ca750f1b192d3acd89dfbeca07ef27f3e5eb5d482354c4249

**Get the coordinates of the Public Key**

```php
$altcoinECDSA->getPubKeyPoints();
```

Returns an array containing the x and y coordinates of the public key

Example :
Array ( [x] => a69243f3c4c047aba38d7ac3660317629c957ab1f89ea42343aee186538a34f8 [y] => b6d862f39819060378542a3bb43ff76b5d7bb23fc012f09c3cd2724bebe0b0bd ) 

**Get the Address**

```php
$altcoinECDSA->getAddress();
```

Returns the compressed Bitcoin Address.

**Get the uncompressed Address**

```php
$altcoinECDSA->getUncompressedAddress();
```

Returns the uncompressed Bitcoin Address.


**Validate an address**

```php
$altcoinECDSA->validateAddress($address);
```
Returns true if the address is valid and false if it isn't


**Validate a Wif key**

```php
$altcoinECDSA->validateWifKey($wif);
```
Returns true if the WIF key is valid and false if it isn't


Signatures
===============

**Sign a message**

```php
$altcoinECDSA->signMessage('message');
```

Returns a satoshi client standard signed message.


**verify a message**

```php
$altcoinECDSA->checkSignatureForRawMessage($signedMessage);
```

Returns true if the signature is matching the address and false if it isn't.


**sign a sha256 hash**

```php
$altcoinECDSA->signHash($hash);
```

Returns a DER encoded hexadecimal signature.


**verify a signature**

```php
$altcoinECDSA->checkDerSignature($pubKey, $signature, $hash)
```

Returns true if the signature is matching the public key and false if it isn't.

Bitcoin Examples
=================
 - [Generate an address](https://github.com/chelahmy/AltcoinECDSA/blob/master/Examples/generateAddress.php)
 - [Sign a message](https://github.com/chelahmy/AltcoinECDSA/blob/master/Examples/signMessage.php)
 - [Verify a message](https://github.com/chelahmy/AltcoinECDSA/blob/master/Examples/verifyMessage.php)
 - [Import or export a private key using WIF](https://github.com/chelahmy/AltcoinECDSA/blob/master/Examples/wif.php)

Denarius Examples
=================
 - [Generate an address](https://github.com/chelahmy/AltcoinECDSA/blob/master/DNR-Examples/generateAddress.php)
 - [Sign a message](https://github.com/chelahmy/AltcoinECDSA/blob/master/DNR-Examples/signMessage.php)
 - [Verify a message](https://github.com/chelahmy/AltcoinECDSA/blob/master/DNR-Examples/verifyMessage.php)
 - [Import or export a private key using WIF](https://github.com/chelahmy/AltcoinECDSA/blob/master/DNR-Examples/wif.php)

License
===============
This is free and unencumbered software released into the public domain.

Anyone is free to copy, modify, publish, use, compile, sell, or
distribute this software, either in source code form or as a compiled
binary, for any purpose, commercial or non-commercial, and by any
means.

In jurisdictions that recognize copyright laws, the author or authors
of this software dedicate any and all copyright interest in the
software to the public domain. We make this dedication for the benefit
of the public at large and to the detriment of our heirs and
successors. We intend this dedication to be an overt act of
relinquishment in perpetuity of all present and future rights to this
software under copyright law.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.

For more information, please refer to <http://unlicense.org/>
