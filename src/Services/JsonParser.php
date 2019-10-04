<?php

namespace App\Services;

class JsonParser implements ParserInterface
{
    public function supports(\SplFileObject $file): bool
    {
        return 'json' === $file->getExtension();
    }

    public function parse(\SplFileObject $file): array
    {
        return json_decode($file->fread($file->getSize()));
    }
}
