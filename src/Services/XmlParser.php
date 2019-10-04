<?php

namespace App\Services;

class XmlParser implements ParserInterface
{
    public function supports(\SplFileObject $file): bool
    {
        return 'xml' === $file->getExtension();
    }

    public function parse(\SplFileObject $file): array
    {
        return array_map(function (\SimpleXMLElement $row) {
            return (array) $row;
        }, ((array) simplexml_load_string($file->fread($file->getSize())))['user']);
    }
}
