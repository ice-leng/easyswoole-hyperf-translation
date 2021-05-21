<?php
/**
 * Created by PhpStorm.
 * User:  ice
 * Email: xykxyk2008@163.com
 * Date:  2021/5/21
 * Time:  10:59 下午
 */

namespace EasySwoole\Hyperf\Translation;

use Hyperf\Contract\TranslatorLoaderInterface;
use Hyperf\Translation\Translator;
use Psr\Container\ContainerInterface;

class TranslatorFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $locale = config('translation.locale', 'zh_CN');
        $fallbackLocale = config('translation.fallback_locale', 'en');

        $loader = $container->get(TranslatorLoaderInterface::class);
        $translator = make(Translator::class, compact('loader', 'locale'));
        $translator->setFallback((string) $fallbackLocale);

        return $translator;
    }
}