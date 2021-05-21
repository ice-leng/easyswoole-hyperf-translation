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
// Container.php

```php

<?php
declare(strict_types=1);

namespace EasySwoole\HyperfOrm;

use EasySwoole\Component\Di;
use EasySwoole\Component\Singleton;
use Psr\Container\ContainerInterface;
use Throwable;

class Container implements ContainerInterface
{
    use Singleton;

    /**
     * @param string $id
     * @return callable|mixed|string|null
     * @throws Throwable
     */
    public function get($id)
    {
        return Di::getInstance()->get($id);
    }

    /**
     * @param string $id
     * @return callable|mixed|string|null
     * @throws Throwable
     */
    public function has($id)
    {
        return Di::getInstance()->get($id) != null;
    }

    /**
     * @param string $name
     * @param array  $parameters
     *
     * @return null
     * @throws Throwable
     */
    public function make(string $name, array $parameters = [])
    {
        $data = Di::getInstance($parameters)->get($name);
        if (is_null($data)) {
            $parameters = array_values($parameters);
            $data = new $name(...$parameters);
        }
        return $data;
    }
}
```

// EasySwooleEvent.php
```php
    use Hyperf\Contract\TranslatorInterface;
    use Hyperf\Contract\TranslatorLoaderInterface;
    use EasySwoole\Hyperf\Translation\TranslatorFactory;
    use EasySwoole\Hyperf\Translation\FileLoaderFactory;
    use EasySwoole\Component\Di;
    use Hyperf\Utils\ApplicationContext;
    use Psr\Container\ContainerInterface;
    
    Di::getInstance()->set(ContainerInterface::class, Container::class);
    ApplicationContext::setContainer(Di::getInstance()->get(ContainerInterface::class));
    Di::getInstance()->set(TranslatorInterface::class, TranslatorFactory::class);
    Di::getInstance()->set(TranslatorLoaderInterface::class,  FileLoaderFactory::class, []);
```

Use
------

```

    echo __("hello");
```

