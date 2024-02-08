<?php

class InvalidFileException extends Exception
{
    protected $code = 404;

    public function __construct($state)
    {
        parent::__construct(sprintf('The file "%s" is invalid.', $state), $this->code);
    }
}
