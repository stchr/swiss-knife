<?php

namespace Rector\SwissKnife\RobotLoader;

use SwissKnife202403\Nette\Loaders\RobotLoader;
final class PhpClassLoader
{
    /**
     * @param string[] $directories
     * @param string[] $excludedPaths
     * @return array<string, string>
     */
    public function load(array $directories, array $excludedPaths) : array
    {
        $robotLoader = new RobotLoader();
        $robotLoader->addDirectory(...$directories);
        $robotLoader->excludeDirectory(...$excludedPaths);
        $robotLoader->setTempDirectory(\sys_get_temp_dir() . '/multiple-classes');
        $robotLoader->rebuild();
        return $robotLoader->getIndexedClasses();
    }
}
