<?php

declare (strict_types=1);
namespace EasyCI20220115\Symplify\EasyCI\Comments;

use EasyCI20220115\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see \Symplify\EasyCI\Tests\Comments\CommentedCodeAnalyzerTest
 */
final class CommentedCodeAnalyzer
{
    /**
     * @return int[]
     */
    public function process(\EasyCI20220115\Symplify\SmartFileSystem\SmartFileInfo $fileInfo, int $commentedLinesCountLimit) : array
    {
        $commentedLines = [];
        $fileLines = \explode(\PHP_EOL, $fileInfo->getContents());
        $commentLinesCount = 0;
        foreach ($fileLines as $key => $fileLine) {
            $isCommentLine = \strncmp(\trim($fileLine), '//', \strlen('//')) === 0;
            if ($isCommentLine) {
                ++$commentLinesCount;
            } else {
                // crossed the treshold?
                if ($commentLinesCount >= $commentedLinesCountLimit) {
                    $commentedLines[] = $key;
                }
                // reset counter
                $commentLinesCount = 0;
            }
        }
        return $commentedLines;
    }
}
