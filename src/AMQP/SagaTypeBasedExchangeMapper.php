<?php

namespace PhpSagas\Common\AMQP;

use PhpSagas\Common\Message\CommandMessage;

/**
 * Transforms exchange names based on saga type.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
class SagaTypeBasedExchangeMapper implements ExchangeMapperInterface
{
    /**
     * @inheritDoc
     */
    public function transformExchange(CommandMessage $message): string
    {
        return $message->getSagaType();
    }

    /**
     * @inheritDoc
     */
    public function transformReplyExchange(CommandMessage $message): string
    {
        return $message->getSagaType();
    }
}
