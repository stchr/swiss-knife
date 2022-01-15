<?php

declare (strict_types=1);
namespace EasyCI20220115\Symplify\EasyCI\ValueObject;

final class ConfigFileSuffixes
{
    /**
     * @var string[]
     */
    public const SUFFIXES = ['yml', 'yaml', 'neon'];
    public static function provideRegex() : string
    {
        return '#(' . \implode('|', self::SUFFIXES) . ')$#';
    }
}
