# WordPress Salts Generator

A key and salts generator for WordPress that works with both wp-config and .env files.

- This library is for use with a composer setup of WordPress.
- Keys and salts are generated via the command line.

## Installation

To install this library either use the composer require command.

```
composer require rbdwllr/wordpress-salts-generator
```

Or add it straight to your `composer.json` file and run `composer update`.

```
require: {
    "rbdwllr/wordpress-salts-generator": "0.3.*"
}
```

## Commands

Their are two simple commands available for generating the keys and salts.

```
// Generates traditional WordPress 'define' keys and salts.
vendor/bin/wpsalts traditional

// Generates keys and salts that can be used in a .env file.
vendor/bin/wpsalts dotenv
```

If you don't add a command the `vendor/bin/wpsalts` command it will output the traditional WordPress salts and keys.

### Append to File

If you would like to append the keys directly to the end of an .env file you can use the `--clean` flag as follows.

```
vendor/bin/wpsalts dotenv --clean >> .env
```

The clean flag removes any messaging and formatting around the output, and the `>>` operator appends the output to the end of the .env file on a new line.

## Output Examples

### Traditional WordPress

```
Copy and paste these keys and salts into your wp-config.php file.

define('AUTH_KEY', '=mFFLjM:X!dxva7Y=`5nClz%UadDmXF9-J-,xO!bK0,5Fwu`uITB;5KD9Yu#7xG{');
define('SECURE_AUTH_KEY', 'o&07-T~"h3Jv8OV>)v-oyFvYWRT3b*[Az8(Jc;>DApYm[puqCQk^L(9V0N6:7+U~');
define('LOGGED_IN_KEY', '*7Sow*vcj,i(HYvv3r;[dQ#o7M#9+`@b}Qn-`8~Br6N:!w#$6w~[[^og0%~5|ao`');
define('NONCE_KEY', '<`C_:KN-{or&MSqVXlPC)}0~f0`_Y!8+VLm%fZ[7z7~c5R0By,%#hgoTJ1x%l_7`');
define('AUTH_SALT', 'pgAj7O<Cc_#`yq2%AP.Lp*]>+^WabfF-[Syd&2y6I2-:ZTj@:k>]Z`DE1r_<8E>B');
define('SECURE_AUTH_SALT', 'H>k`b{Zz`4!6GyyNs4?9Hk,`*x4)/LM(sFjAsUpc@":bf6G/JtVcjF/M?3Cp},tB');
define('LOGGED_IN_SALT', 'QM"&@}=%q9B&T,_8qlGA:DkUib/U(ar>:b)B|*SCJj_/2Et8k<D@mgLs@#7$r}lM');
define('NONCE_SALT', 'r6aQlOrKyEeG"?.l<]1f1WP#VPhti/Oa(abI6r:cAH>G:bWbp1j%|,&]v#sI,1<M');
```

### DotEnv

```
Copy and paste these keys and salts into your .env file.

AUTH_KEY='4<0s2LBv7dh3FT6q,+[D~2H}y{*l&ym!<DR8|{a.Jx5[OO^Zt9B0|BLc-j)fK!{Q'
SECURE_AUTH_KEY=',>x,3"l:+WRU;2YjAaZ%+-9EZLJ54gRM6ni.{ial!b:s~e9&%}{;*1K5DafS=QEl'
LOGGED_IN_KEY='WBi)>yy"C9v`}<Q!SbPelOk5DRnwh2Mm?gaLU5"8Wa|y"}-!M"vj#Fco8OlcKDOB'
NONCE_KEY='vZ<Ki/O^PE[6uKoPz@kQHHey4pU+0NM=$<!d[{G9yLNSh<o!6-2?Ys2]Na&_A+@W'
AUTH_SALT='Gr_`UQ+ZD4mLKm^J^r[GJzabUv?TLE>q?zssT~}9Q|9xuQ(JP/f*Mp6b1W1`7lpL'
SECURE_AUTH_SALT='>7|[N7Pc^K~G5sQ-<5_ia`Se^YD[=t0dgTUCs}|Y7^t-+4u4rVjW=PE%aDBC=}u`'
LOGGED_IN_SALT='g@-n~D=~OF6%]Kzv+ZtD),MeUxcN:sWX@3rOJX<CguK:=GY/WL4.(xg?jH"gs;D5'
NONCE_SALT='hv/:PhxAL-[m@<,^&y5wRj9>dl<VeAtR"o}qu0.;!njy_LPn>W_>~HBGQn?Pcf[C'
```

## Author

Rob Waller [@RobDWaller](https://twitter.com/RobDWaller)
