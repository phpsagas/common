<?php

namespace PhpSagas\Common\AMQP;

/**
 * Enum representing the AMQP transport specific headers.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
interface AMQPCommandHeadersEnum
{
    /** @var string */
    public const REPLY_EXCHANGE = 'command_reply_exchange';
    /** @var string */
    public const REPLY_ROUTING_KEY = 'command_reply_routing_key';
}
