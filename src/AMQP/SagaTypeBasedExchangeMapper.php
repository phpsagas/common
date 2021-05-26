<?php

namespace PhpSagas\Common\AMQP;

use PhpSagas\Contracts\CommandMessageInterface;
use PhpSagas\Contracts\ExchangeMapperInterface;

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
    public function transformExchange(CommandMessageInterface $message): string
    {
        return $message->getSagaType();
    }

    /**
     * @inheritDoc
     */
    public function transformReplyExchange(CommandMessageInterface $message): string
    {
        return $message->getSagaType();
    }
}
