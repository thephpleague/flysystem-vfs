# Flysystem Adapter for VFS

[![Latest Version](https://img.shields.io/github/release/anahkiasen/flysystem-vfs.svg?style=flat-square)](https://github.com/anahkiasen/flysystem-vfs/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/anahkiasen/flysystem-vfs/master.svg?style=flat-square)](https://travis-ci.org/anahkiasen/flysystem-vfs)
[![Total Downloads](https://img.shields.io/packagist/dt/league/flysystem-vfs.svg?style=flat-square)](https://packagist.org/packages/league/flysystem-vfs)

This is a [VFS](https://github.com/adlawson/php-vfs) adapter for [Flysystem](http://flysystem.anahkiasen.com/). It allows you to mount a virtual filesystem.

## Installation

```bash
composer require anahkiasen/flysystem-vfs
```

## Usage

```php
use League\Flysystem\Vfs\VfsAdapter;
use League\Flysystem\Filesystem;
use VirtualFileSystem\FileSystem as Vfs;

$adapter = new VfsAdapter(new Vfs);
$filesystem = new Filesystem($adapter);
```
