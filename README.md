
# PHP CompatInfo

| Stable | Upcoming |
|:------:|:--------:|
| [![Latest Stable Version](https://img.shields.io/packagist/v/bartlett/php-compatinfo)](https://packagist.org/packages/bartlett/php-compatinfo) |   |
| [![Minimum PHP Version)](https://img.shields.io/packagist/php-v/bartlett/php-compatinfo)](https://php.net/) |   |

**PHP CompatInfo** is a library that
can find the minimum version and the extensions required for a piece of code to run.

Running on PHP greater than 7.1 for parsing source code in a format PHP 5.2 to PHP 7.4

## Requirements

* PHP 7.1.3 or greater
* PHPUnit 7 or greater (if you want to run unit tests)

## Installation

The recommended way to install this library is [through composer](http://getcomposer.org).
If you don't know yet what is composer, have a look [on introduction](http://getcomposer.org/doc/00-intro.md).

```bash
composer require bartlett/php-compatinfo
```

## Build PHAR distribution

To build PHAR distribution, you'll need to get a copy of this project https://github.com/humbug/box

**WARNING**: Don't forget to run following command (before compiling archive), if you want to have a PHAR manifest up-to-date !
```bash
php phar-manifest.php > manifest.txt
```

Run following command
```bash
box.phar compile
```

You should get output that look like
```
Box version 3.8.4@120b0a3 2019-12-13 17:22:43 UTC

 // Loading the configuration file "/shared/backups/bartlett/php-compat-info/box.json.dist".

🔨  Building the PHAR "/shared/backups/bartlett/php-compat-info/bin/phpcompatinfo.phar"

? Removing the existing PHAR "/shared/backups/bartlett/php-compat-info/bin/phpcompatinfo.phar"
? No compactor to register
? Adding main file: /shared/backups/bartlett/php-compat-info/bin/phpcompatinfo
? Adding requirements checker
? Adding binary files
    > No file found
? Auto-discover files? No
? Exclude dev files? No
? Adding files
    > 1129 file(s)
? Using stub file: /shared/backups/bartlett/php-compat-info/phar-stub.php
? Skipping dumping the Composer autoloader
? Removing the Composer dump artefacts
? Compressing with the algorithm "GZ"
    > Warning: the extension "zlib" will now be required to execute the PHAR
? Setting file permissions to 0755
* Done.

No recommendation found.
No warning found.

 // PHAR: 1155 files (1.65MB)
 // You can inspect the generated PHAR with the "info" command.

 // Memory usage: 25.54MB (peak: 26.54MB), time: 1sec
```

## Documentation

Full documentation is written in MarkDown format, and HTML export is possible with [Daux.io](https://github.com/dauxio/daux.io).
See output results at http://bartlett.laurent-laville.org/php-compatinfo/ or raw `*.md` files in `docs` folder.

**Table of Contents**

* **Features**
  - Parse source code in format PHP 5.2 to PHP 7.4
  - Detect PHP features for each Major/minor versions
  - Detect versions of all directives, constants, functions, classes, interfaces of 100 extensions and more
  - Display/Inspect list of extensions, and their versions supported

* **Components**
  - PHP-Parser [Node Visitors](docs/01_Components/01_PHP-Parser/Visitors.md)
  - [Profiler](docs/01_Components/02_Profiler/Collectors.md)
  - Collection of [Sniffs](docs/01_Components/03_Sniffs/Features.md)

* **Configurations**
  - Use of PSR11 containers to [configure](docs/02_Configs/README.md) application services.

## Contributors

* Laurent Laville (Lead Dev)
* Thanks to Nikita Popov who wrote a marvellous [PHP Parser](https://github.com/nikic/PHP-Parser).
* Thanks also to Remi Collet, a contributor of first hours.

[![](https://sourcerer.io/fame/llaville/llaville/php-compat-info/images/0)](https://sourcerer.io/fame/llaville/llaville/php-compat-info/links/0)
[![](https://sourcerer.io/fame/llaville/llaville/php-compat-info/images/1)](https://sourcerer.io/fame/llaville/llaville/php-compat-info/links/1)
[![](https://sourcerer.io/fame/llaville/llaville/php-compat-info/images/2)](https://sourcerer.io/fame/llaville/llaville/php-compat-info/links/2)
[![](https://sourcerer.io/fame/llaville/llaville/php-compat-info/images/3)](https://sourcerer.io/fame/llaville/llaville/php-compat-info/links/3)
[![](https://sourcerer.io/fame/llaville/llaville/php-compat-info/images/4)](https://sourcerer.io/fame/llaville/llaville/php-compat-info/links/4)
[![](https://sourcerer.io/fame/llaville/llaville/php-compat-info/images/5)](https://sourcerer.io/fame/llaville/llaville/php-compat-info/links/5)
[![](https://sourcerer.io/fame/llaville/llaville/php-compat-info/images/6)](https://sourcerer.io/fame/llaville/llaville/php-compat-info/links/6)
[![](https://sourcerer.io/fame/llaville/llaville/php-compat-info/images/7)](https://sourcerer.io/fame/llaville/llaville/php-compat-info/links/7)

## License

This project is licensed under the BSD-3-Clause License - see the [LICENSE](https://github.com/llaville/php-compat-info/blob/master/LICENSE) file for details
