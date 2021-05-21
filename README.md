<p align="center">
    <a href="https://www.easyswoole.com/" target="_blank">
        <img src="https://raw.githubusercontent.com/easy-swoole/easyswoole/3.x/easyswoole.png" height="100px">
    </a>
    <h1 align="center">EasySwoole Hyperf Orm Permission </h1>
    <br>
</p>

Install
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require easyswoole-tool/hyperf-translation dev-master
```

or add

```
"easyswoole-tool/hyperf-translation": "dev-master"
```
to the require section of your `composer.json` file.


Config
------------
// dev.php
```php
    <?php
    
    return [
        'locale' => 'zh_CN',
        'fallback_locale' => 'en',
        'path' => EASYSWOOLE_ROOT . '/storage/languages',
    ];

```

DI
------------
// EasySwooleEvent.php
```php
    use Hyperf\Contract\TranslatorInterface;
    use Hyperf\Contract\TranslatorLoaderInterface;
    use EasySwoole\Hyperf\Translation\TranslatorFactory;
    use EasySwoole\Hyperf\Translation\FileLoaderFactory;
    use EasySwoole\Component\Di;
    
    Di::getInstance()->set(TranslatorInterface::class, TranslatorFactory::class);
    Di::getInstance()->set(TranslatorLoaderInterface::class,  FileLoaderFactory::class, []);
```
Use
------

```

    echo __("hello");
```

