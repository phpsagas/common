<?php

namespace PhpSagas\Common\AMQP;

use PhpSagas\Contracts\CommandMessageInterface;
use PhpSagas\Contracts\RoutingKeyMapperInterface;

/**
 * Transforms routing keys based on command type.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
class CommandTypeBasedRoutingKeyMapper implements RoutingKeyMapperInterface
{
    public function transformRoutingKey(CommandMessageInterface $message): string
    {
        return $message->getCommandType();
    }

    public function transformReplyRoutingKey(CommandMessageInterface $message): string
    {
        return 'command_reply';
    }
}
