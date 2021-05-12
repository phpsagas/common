<?php

namespace PhpSagas\Common\Message;

/**
 * Interface for Message ID generators.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
interface MessageIdGeneratorInterface
{
    /**
     * @return string
     */
    public function generateId(): string;
}
