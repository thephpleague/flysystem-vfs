<?php
namespace League\Flysystem\Vfs;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Config;
use League\Flysystem\Util;
use VirtualFileSystem\FileSystem;

class VfsAdapter extends Local
{
    /**
     * @type FileSystem
     */
    private $vfs;

    /**
     * @param FileSystem $vfs
     */
    public function __construct(FileSystem $vfs)
    {
        $this->vfs = $vfs;
    }

    /**
     * Ensure the root directory exists.
     *
     * @param string $root root directory path
     *
     * @return string real path to root
     */
    protected function ensureDirectory($root)
    {
        $root = $this->wrapPath($root);

        return parent::ensureDirectory($root);
    }

    /**
     * {@inheritdoc}
     */
    public function write($path, $contents, Config $config)
    {
        $location = $this->applyPathPrefix($path);
        $this->ensureDirectory(dirname($location));

        if (($size = file_put_contents($location, $contents)) === false) {
            return false;
        }

        $type = 'file';
        $result = compact('contents', 'type', 'size', 'path');

        if ($visibility = $config->get('visibility')) {
            $result['visibility'] = $visibility;
            $this->setVisibility($path, $visibility);
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function update($path, $contents, Config $config)
    {
        $location = $this->applyPathPrefix($path);
        $mimetype = Util::guessMimeType($path, $contents);

        if (($size = file_put_contents($location, $contents)) === false) {
            return false;
        }

        return compact('path', 'size', 'contents', 'mimetype');
    }

    /**
     * {@inheritdoc}
     */
    public function getPathPrefix()
    {
        return $this->wrapPath(parent::getPathPrefix());
    }

    /**
     * {@inheritdoc}
     */
    public function removePathPrefix($path)
    {
        if ($this->getPathPrefix() === null) {
            return $path;
        }

        $length = strlen($this->getPathPrefix());

        return substr($path, $length);
    }

    /**
     * @param string $path
     *
     * @return string
     */
    protected function wrapPath($path)
    {
        $scheme = $this->vfs->scheme().'://';
        $path   = str_replace($scheme, null, $path);

        return $scheme.$path;
    }
}
