<?php
/**
 * Created by PhpStorm.
 * User:  ice
 * Email: xykxyk2008@163.com
 * Date:  2021/5/22
 * Time:  1:20 上午
 */

namespace EasySwoole\Hyperf\Translation;

use EasySwoole\EasySwoole\Config;
use \Hyperf\Translation\Translator as BaseTranslator;

class Translator extends BaseTranslator
{
    public function __construct()
    {
        $locale = Config::getInstance()->getConf('translation.locale') ?? 'zh_CN';
        $fallbackLocale = Config::getInstance()->getConf('translation.fallback_locale') ?? 'en';
        $loader = (new FileLoaderFactory)();
        parent::__construct($loader, $locale);
        $this->setFallback($fallbackLocale);
    }
}
