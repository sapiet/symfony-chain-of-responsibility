<?php

namespace App\Services;

class Parser
{
    /**
     * @var iterable
     */
    private $parsers;

    public function __construct(iterable $parsers)
    {
        $this->parsers = $parsers;
    }

    public function parse(string $path)
    {
        $file = new \SplFileObject($path);

        foreach ($this->parsers as $parser) {
            if ($parser->supports($file)) {
                return $parser->parse($file);
            }
        }

        throw new Exception('No parser found');
    }
}
