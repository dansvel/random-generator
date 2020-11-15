# PHP random string generator, readable and not

This random generator can generate string for human readable or indecipherable.

## Installation

You can install the package via composer:

```bash
composer require dansvel/random-generator
```

## Usage

``` php
use dansvel\RandomGenerator\Random;
```

### Human readable

It will generate a word using combination of vowels and consonants

```php
$composition = [
    3 => ['cvc'],
    4 => ['cvcv', 'vccv', 'vcvc'],
    5 => ['cvcvc', 'cvccv', 'vccvc', 'vcvcv'],
    6 => ['cvcvcv', 'cvccvc', 'vcvcvc', 'vccvcv']
];
```

Example :

```php
echo Random::humane(3); // yuk
echo Random::humane(4); // exem
echo Random::humane(5); // idova
echo Random::humane(6); // juplis
```

### Inhumane, indecipherable

It will generate random characters according to the type you want.

Example :

```php
echo Random::inhumane(16,'0'); // 5370719465476519
echo Random::inhumane(16,'a'); // kaqotdyeyfauztls
echo Random::inhumane(16,'A'); // IWJLLMBWSTTLCMFM
echo Random::inhumane(16,'aA'); // soMSTjnaiBHkczhx
echo Random::inhumane(16,'0A'); // WQT4I4O2BWHCUAVJ
echo Random::inhumane(16,'0aA'); // aa9LyynlVmfjA4Ht
// you can use combination of 0 a and A in unordered
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
