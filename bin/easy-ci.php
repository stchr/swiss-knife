<?php

declare (strict_types=1);
namespace EasyCI20220115;

use EasyCI20220115\Symplify\EasyCI\Kernel\EasyCIKernel;
use EasyCI20220115\Symplify\SymplifyKernel\ValueObject\KernelBootAndApplicationRun;
$possibleAutoloadPaths = [
    // dependency
    __DIR__ . '/../../../autoload.php',
    // after split package
    __DIR__ . '/../vendor/autoload.php',
    // monorepo
    __DIR__ . '/../../../vendor/autoload.php',
];
foreach ($possibleAutoloadPaths as $possibleAutoloadPath) {
    if (\file_exists($possibleAutoloadPath)) {
        require_once $possibleAutoloadPath;
        break;
    }
}
$extraConfigs = [];
$easyCIFilePath = \getcwd() . \DIRECTORY_SEPARATOR . 'easy-ci.php';
if (\file_exists($easyCIFilePath)) {
    $extraConfigs[] = $easyCIFilePath;
}
$kernelBootAndApplicationRun = new \EasyCI20220115\Symplify\SymplifyKernel\ValueObject\KernelBootAndApplicationRun(\EasyCI20220115\Symplify\EasyCI\Kernel\EasyCIKernel::class, $extraConfigs);
$kernelBootAndApplicationRun->run();
