<?php

declare(strict_types=1);

namespace EasySwoole\Hyperf\Translation;

use Hyperf\Contract\TranslatorInterface;
use Hyperf\Contract\TranslatorLoaderInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                TranslatorInterface::class => (new \EasySwoole\Hyperf\Translation\TranslatorFactory)(),
                TranslatorLoaderInterface::class => (new \EasySwoole\Hyperf\Translation\FileLoaderFactory)(),
            ],
            'publish' => [
                [
                    'id' => 'translation',
                    'description' => 'The config for translation.',
                    'source' => __DIR__ . '/Configs/translation.php',
                    'destination' => EASYSWOOLE_ROOT . '/App/Configs/translation.php',
                ],
                [
                    'id' => 'translation-en',
                    'description' => 'The config for translation en file.',
                    'source' => __DIR__ . '/Configs/en.php',
                    'destination' => EASYSWOOLE_ROOT . '/storage/languages/en/message.php',
                ],
                [
                    'id' => 'translation-zh_CN',
                    'description' => 'The config for translation zh_CN file.',
                    'source' => __DIR__ . '/Configs/zh_CN.php',
                    'destination' => EASYSWOOLE_ROOT . '/storage/languages/zh_CN/message.php',
                ],
            ],
        ];
    }
}
