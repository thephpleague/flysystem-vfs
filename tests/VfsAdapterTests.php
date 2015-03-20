<?php
use League\Flysystem\Config;
use League\Flysystem\Vfs\VfsAdapter;
use VirtualFileSystem\FileSystem;

class VfsAdapterTests extends PHPUnit_Framework_TestCase
{
    public function adapterProvider()
    {
        return [
            [new VfsAdapter(new FileSystem())],
        ];
    }

    /**
     * @dataProvider adapterProvider
     */
    public function testCanWriteFile(VfsAdapter $adapter)
    {
        $adapter->write('foo.txt', 'foobar', new Config());

        $this->assertTrue($adapter->has('foo.txt'));
        $this->assertEquals('foobar', $adapter->read('foo.txt')['contents']);
    }

    /**
     * @dataProvider adapterProvider
     */
    public function testCanUpdateFile(VfsAdapter $adapter)
    {
        $adapter->write('foo.txt', 'foobar', new Config());
        $adapter->update('foo.txt', 'baz', new Config());

        $this->assertEquals('baz', $adapter->read('foo.txt')['contents']);
    }

    /**
     * @dataProvider adapterProvider
     */
    public function testCanCreateDirectory(VfsAdapter $adapter)
    {
        $adapter->createDir('foo', new Config());

        $this->assertTrue($adapter->has('foo'));
    }

    /**
     * @dataProvider adapterProvider
     */
    public function testCanRemoveDirectory(VfsAdapter $adapter)
    {
        $adapter->createDir('foo', new Config());
        $adapter->deleteDir('foo');

        $this->assertFalse($adapter->has('foo'));
    }

    /**
     * @dataProvider adapterProvider
     */
    public function testCanListContents(VfsAdapter $adapter)
    {
        $adapter->createDir('foo', new Config());
        $adapter->write('foo/foo.txt', 'foobar', new Config());
        $files = $adapter->listContents('foo');

        $this->assertEquals('foo.txt', basename($files[0]['path']));
    }
}
