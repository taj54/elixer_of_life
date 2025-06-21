<?php

// app/bootstrap.php

use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Events\Dispatcher;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

// Define your view paths and cache path relative to this bootstrap file
$basePath = dirname(__DIR__); // This goes up to 'my-blade-app' directory

$viewsPath = $basePath . '/app/views';
$cachePath = $basePath . '/app/cache';

// Ensure the cache directory exists and is writable
if (!is_dir($cachePath)) {
    mkdir($cachePath, 0755, true);
}

// Set up the Illuminate Container (Service Container)
$container = new Container();
Container::setInstance($container); // Set the current container as the static instance

// Register filesystem and event dispatcher
$container->singleton('files', function () {
    return new Filesystem();
});

$container->singleton('events', function ($app) {
    return new Dispatcher($app);
});

// Register the Blade Compiler
$container->singleton('blade.compiler', function ($app) use ($cachePath) {
    return new BladeCompiler($app['files'], $cachePath);
});

// Register the Engine Resolver
$container->singleton('view.engine.resolver', function ($app) {
    $resolver = new EngineResolver();
    $resolver->register('php', function () use ($app) {
        return new PhpEngine($app['files']);
    });
    $resolver->register('blade', function () use ($app) {
        return new CompilerEngine($app['blade.compiler'], $app['files']);
    });
    return $resolver;
});

// Register the View Finder
$container->singleton('view.finder', function ($app) use ($viewsPath) {
    return new FileViewFinder($app['files'], [$viewsPath]);
});

// Register the View Factory (the core component)
$container->singleton('view', function ($app) {
    $factory = new Factory(
        $app['view.engine.resolver'],
        $app['view.finder'],
        $app['events']
    );
    return $factory;
});

// Return the configured ViewFactory instance
return $container->make('view');

