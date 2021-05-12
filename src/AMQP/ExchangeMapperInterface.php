<?php

namespace PhpSagas\Common\AMQP;

use PhpSagas\Common\Message\CommandMessage;

/**
 * Allows to transform exchange names based on command message information.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
interface ExchangeMapperInterface
{
    /**
     * @param CommandMessage $message
     *
     * @return string
     */
    public function transformExchange(CommandMessage $message): string;

    /**
     * @param CommandMessage $message
     *
     * @return string
     */
    public function transformReplyExchange(CommandMessage $message): string;
}
