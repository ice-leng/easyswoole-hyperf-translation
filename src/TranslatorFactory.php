<?php
/**
 * Created by PhpStorm.
 * User:  ice
 * Email: xykxyk2008@163.com
 * Date:  2021/5/21
 * Time:  10:59 下午
 */

namespace EasySwoole\Hyperf\Translation;

use EasySwoole\EasySwoole\Config;
use Hyperf\Contract\TranslatorLoaderInterface;
use Hyperf\Translation\Translator;

class TranslatorFactory
{
    public function __invoke()
    {
        $locale = Config::getInstance()->getConf('translation.locale') ?? "zh_CN";
        $fallbackLocale = Config::getInstance()->getConf('translation.fallback_locale') ?? 'en';

        $loader = make(TranslatorLoaderInterface::class);
        $translator = make(Translator::class, compact('loader', 'locale'));
        $translator->setFallback((string) $fallbackLocale);

        return $translator;
    }
}
