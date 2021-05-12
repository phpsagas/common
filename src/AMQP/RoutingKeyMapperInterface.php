<?php

namespace PhpSagas\Common\AMQP;

use PhpSagas\Common\Message\CommandMessage;

/**
 * Allows to transform routing keys based on command message information.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
interface RoutingKeyMapperInterface
{
    /**
     * @param CommandMessage $message
     *
     * @return string
     */
    public function transformRoutingKey(CommandMessage $message): string;

    /**
     * @param CommandMessage $message
     *
     * @return string
     */
    public function transformReplyRoutingKey(CommandMessage $message): string;
}
