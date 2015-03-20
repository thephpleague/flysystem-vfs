# Flysystem Adapter for VFS

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
