<?php

class FileDoesntExistException extends Exception
{
    protected $code = 500;

    public function __construct($state)
    {
        parent::__construct(sprintf('File "%s" does not exist.', $state), $this->code);
    }
}
