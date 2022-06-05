<?php

declare (strict_types=1);
namespace EasyCI20220605;

use EasyCI20220605\Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use EasyCI20220605\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory;
use EasyCI20220605\Symplify\PackageBuilder\Parameter\ParameterProvider;
use EasyCI20220605\Symplify\PackageBuilder\Reflection\PrivatesAccessor;
use EasyCI20220605\Symplify\SmartFileSystem\FileSystemFilter;
use EasyCI20220605\Symplify\SmartFileSystem\FileSystemGuard;
use EasyCI20220605\Symplify\SmartFileSystem\Finder\FinderSanitizer;
use EasyCI20220605\Symplify\SmartFileSystem\Finder\SmartFinder;
use EasyCI20220605\Symplify\SmartFileSystem\SmartFileSystem;
use function EasyCI20220605\Symfony\Component\DependencyInjection\Loader\Configurator\service;
return static function (\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire();
    // symfony style
    $services->set(\EasyCI20220605\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory::class);
    $services->set(\EasyCI20220605\Symfony\Component\Console\Style\SymfonyStyle::class)->factory([\EasyCI20220605\Symfony\Component\DependencyInjection\Loader\Configurator\service(\EasyCI20220605\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory::class), 'create']);
    // filesystem
    $services->set(\EasyCI20220605\Symplify\SmartFileSystem\Finder\FinderSanitizer::class);
    $services->set(\EasyCI20220605\Symplify\SmartFileSystem\SmartFileSystem::class);
    $services->set(\EasyCI20220605\Symplify\SmartFileSystem\Finder\SmartFinder::class);
    $services->set(\EasyCI20220605\Symplify\SmartFileSystem\FileSystemGuard::class);
    $services->set(\EasyCI20220605\Symplify\SmartFileSystem\FileSystemFilter::class);
    $services->set(\EasyCI20220605\Symplify\PackageBuilder\Parameter\ParameterProvider::class)->args([\EasyCI20220605\Symfony\Component\DependencyInjection\Loader\Configurator\service('service_container')]);
    $services->set(\EasyCI20220605\Symplify\PackageBuilder\Reflection\PrivatesAccessor::class);
};
