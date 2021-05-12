<?php

namespace PhpSagas\Common\AMQP;

use PhpSagas\Common\Message\CommandMessage;

/**
 * Transforms routing keys based on command type.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
class CommandTypeBasedRoutingKeyMapper implements RoutingKeyMapperInterface
{
    public function transformRoutingKey(CommandMessage $message): string
    {
        return $message->getCommandType();
    }

    public function transformReplyRoutingKey(CommandMessage $message): string
    {
        return 'command_reply';
    }
}
