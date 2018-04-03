# WordPress Salts Generator

A key and salts generator for WordPress that works with both wp-config and .env files.

- This library is for use with a composer setup of WordPress.
- Keys and salts are generated via the command line.

## Commands

Their are two simple commands available for generating the keys and salts.

```shell
// Generates traditional WordPress 'define' keys and salts.
vendor/bin/wpsalts traditional

// Generates keys and salts that can be used in a .env file.
vendor/bin/wpsalts dotenv
```

If you don't add a flag after the `vendor/bin/wpsalts` command it will output the traditional WordPress salts and keys.

## Output Examples

### Tradition WordPress

```php
define('AUTH_KEY', 'dva\uhm"cDc<$U5E> )euW<UzK{ WQ7tt;j:paBPyY16<&f;b|n]|pj9%|=xRA;'');
define('SECURE_AUTH_KEY', 'Q)hZ.Hp]meJI.X-:s+Cp2o4:wafkbxO}mfyp??e">bqHRC)|o(sB)9G-n4O2VJ;!');
define('LOGGED_IN_KEY', 'kOq )c"=0>E} c;?PwD;lt0(N9N>%,#OS"]3>,!@[&]]i>G90ucaBxz2\hh]}I@Z');
define('NONCE_KEY', 't>ZZepdu/(8>4|3k5covc7R'":*rhyY>{eZjK4HB:@i5l/d8XTTc(P.v(H|Q/mg4');
define('AUTH_SALT', '{B>CWa$zjM+KN(,(-4yD(pFfdeF 07mPp1xOMkL bDm!X>}p){~(J4\~-AO+0-ZV');
define('SECURE_AUTH_SALT', 'lr'_2T^{O/<LK v<:fa^Sw-i]5\t yt.:I#?kSa(l 8A7H%/!E(c1dzX(r[}3YpB');
define('LOGGED_IN_SALT', '%^]P]dVVJ"Pgd[tW-.}mMvx..yRW+99E7yCVb:PYA-k1[2W0LHM^fG'XtPsuGF"y');
define('NONCE_SALT', ' 6quTRjx9eQ"6:$QrV]!q"8%38#NGh>ODwU:tw8&nU^Ci}_[`ItiWK]e|n t<f /');
```

### DotEnv

```php
AUTH_KEY = 'EXOxcC~nqA{m{B?pw$$G^kIll&j@7K~\+rGaD!84>J^C2H.w"U\Ut<55\&W[ IdS'
SECURE_AUTH_KEY = 'z =Q9?I),/%7`E0jEM(#5VV'S NdLFYL<e2-jSyQoV*Jzxbs3`oIs;pZHcEH"2L&'
LOGGED_IN_KEY = 'H #u*_!('^[s>=4?$.s3?yo9KJk8Lv-Dn O6,ZCE>aFh-5KaXbBzV9#^t9rJuTgt'
NONCE_KEY = 'bdt.I)jh6Nz/e,|S-QepePTSd@93E$vk%oX1yd"A,DNExX+v&;>2>^Ni$G%l&YC9'
AUTH_SALT = '$81GB@i@ 0qW@~<<M$j`>yxQ )Q56PyJ6ukOnH]@_:}x-/BAm-Io]=CyJU^T(|7%'
SECURE_AUTH_SALT = '/k4O1L)q@7wJ^~;b`"U6X9s,~7iRAc8v-ypMOM|X.yN=0"gVh|x~$V +Mw(eZ33T'
LOGGED_IN_SALT = '_o_jpvW#iq}l-'Kc&vU}Tht\w,-:462z8=;!x3 =1NyD&[>k^EAZjm(F#=X+T(G''
NONCE_SALT = '.e1j7;9aWlqoBRdLEe?Vh9{m8V7:<PlAFa@,,(2o5En)^%x*[i\6sq[=*b#+-A0='
```

## Author

Rob Waller [@RobDWaller](https://twitter.com/RobDWaller)
