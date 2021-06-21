<?php
/**
 * Created by PhpStorm.
 * User:  ice
 * Email: xykxyk2008@163.com
 * Date:  2021/5/21
 * Time:  11:22 下午
 */

namespace EasySwoole\Hyperf\Translation;

use Hyperf\Translation\FileLoader;
use Hyperf\Utils\Filesystem\Filesystem;
use EasySwoole\EasySwoole\Config;

class FileLoaderFactory
{
    public function __invoke()
    {
        $files = make(Filesystem::class);
        $path = Config::getInstance()->getConf('translation.path') ?? EASYSWOOLE_ROOT . '/storage/languages';
        return make(FileLoader::class, compact('files', 'path'));
    }
}
