<?php

use Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration;

$container = $app->getContainer();

$container['db'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $applicationMode = $c->get('settings')['env'];

    $cache = new \Doctrine\Common\Cache\ArrayCache;

    $config = new Configuration;
    $config->setMetadataCacheImpl($cache);
    $driverImpl = $config->newDefaultAnnotationDriver($settings['path']);
    $config->setMetadataDriverImpl($driverImpl);
    $config->setQueryCacheImpl($cache);
    $config->setProxyDir($settings['cacheProxies']);
    $config->setProxyNamespace('App\Proxies');

    if ($applicationMode == "development") {
        $config->setAutoGenerateProxyClasses(\Doctrine\Common\Proxy\AbstractProxyFactory::AUTOGENERATE_ALWAYS);
    } else {
        $config->setAutoGenerateProxyClasses(\Doctrine\Common\Proxy\AbstractProxyFactory::AUTOGENERATE_NEVER);
    }

    return EntityManager::create($settings['dbParams'], $config);
};

$container['App\Action\HomeAction'] = function ($c) {
    return new App\Action\HomeAction($c->get('db'));
};
