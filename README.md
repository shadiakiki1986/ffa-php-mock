# ffa-php-mock
Open-source package that behaves similarly to the closed-source `ffa-php-core`.
This package is used as a mock drop-in replacement for the development of
[ffa-php-cli](https://github.com/shadiakiki1986/ffa-php-cli)
as an open-source package.

# Installation
1. Install php 7
  - check [this SO answer](http://askubuntu.com/a/705893) for how to install in ubuntu 16.04 or older versions
2. Install [composer](https://getcomposer.org/download/)
3. Install package dependencies: `php composer.phar install`
  - At the time of this writing, the following pre-requisites are required (on linux):
  - `sudo apt-get install php7.0-xml php7.0-mbstring`

# Usage
Usage will be documented in [ffa-php-cli](https://github.com/shadiakiki1986/ffa-php-cli)
under the format of a comparison between the old vendor binaries and the new desired ones
