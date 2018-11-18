# TmpFile plugin for CakePHP

[![Latest Stable Version](https://img.shields.io/packagist/v/dmromanov/cakephp-tmpfile.svg?style=flat)](https://packagist.org/packages/dmromanov/cakephp-tmpfile)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.0-8892BF.svg?style=flat)](https://php.net/)
[![Build Status](https://travis-ci.org/dmromanov/cakephp-tmpfile.svg?branch=master)](https://travis-ci.org/dmromanov/cakephp-tmpfile)
[![codecov](https://codecov.io/gh/dmromanov/cakephp-tmpfile/branch/master/graph/badge.svg)](https://codecov.io/gh/dmromanov/cakephp-tmpfile)


This plugins provides class for creating temporary files, that are guaranteed to be deleted after program termination,
and is compatible with `CakePHP\Filesystem\File` API.

## Usage

Create unique temporary files:

```php
$tmpFile1 = new TmpFile();
$tmpFile2 = new TmpFile(
    'foo-',
    TMP . 'bar',
    0644
)
$tmpFile2->close();

// use as a regular CakePHP\Filesystem\File
$tmpfile->open()
$tmpfile->write($data);
$tmpfile->close();
```

After a program termination (regular or after a crash) the file will be deleted.

Constructor's parameters:

    string $prefix The prefix of the generated temporary filename.
    string $path The directory where the temporary filename will be created
    int $mode File permissions


## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require dmromanov/cakephp-tmpfile
```
