<?php

namespace App\Services;

class CsvParser implements ParserInterface
{
    public function supports(\SplFileObject $file): bool
    {
        return 'csv' === $file->getExtension();
    }

    public function parse(\SplFileObject $file): array
    {
        $rows = [];
        $header = $file->fgetcsv(';');

        while ($row = $file->fgetcsv(';')) {
            if (count($header) === count($row)) {
                $rows[] = array_combine($header, $row);
            }
        }

        return $rows;
    }
}
