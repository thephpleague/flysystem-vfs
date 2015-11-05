# Flysystem Adapter for VFS

[![Latest Version](https://img.shields.io/github/release/thephpleague/flysystem-vfs.svg?style=flat-square)](https://github.com/thephpleague/flysystem-vfs/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/thephpleague/flysystem-vfs/master.svg?style=flat-square)](https://travis-ci.org/thephpleague/flysystem-vfs)
[![Total Downloads](https://img.shields.io/packagist/dt/league/flysystem-vfs.svg?style=flat-square)](https://packagist.org/packages/league/flysystem-vfs)

This is a [VFS](https://github.com/michael-donat/php-vfs) adapter for [Flysystem](http://flysystem.thephpleague.com/). It allows you to mount a virtual filesystem.

## Installation

```bash
composer require league/flysystem-vfs
```

## Usage

```php
use League\Flysystem\Vfs\VfsAdapter;
use League\Flysystem\Filesystem;
use VirtualFileSystem\FileSystem as Vfs;

$adapter = new VfsAdapter(new Vfs);
$filesystem = new Filesystem($adapter);
```
