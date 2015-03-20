# Flysystem Adapter for VFS

This is a [VFS](https://github.com/adlawson/php-vfs) adapter for [Flysystem](http://flysystem.thephpleague.com/). It allows you to mount a virtual filesystem.

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
