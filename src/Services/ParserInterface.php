<?php

namespace App\Services;

interface ParserInterface
{
    public function supports(\SplFileObject $file): bool;

    public function parse(\SplFileObject $file): array;
}
