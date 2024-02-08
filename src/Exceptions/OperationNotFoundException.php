<?php

class OperationNotFoundException extends Exception
{
    protected $code = 404;

    public function __construct($state)
    {
        parent::__construct(sprintf('Operation "%s" not found.', $state), $this->code);
    }
}
