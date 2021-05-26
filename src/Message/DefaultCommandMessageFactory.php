<?php

namespace PhpSagas\Common\Message;

use PhpSagas\Contracts\CommandMessageFactoryInterface;
use PhpSagas\Contracts\CommandMessageInterface;

/**
 * Default factory implementation.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
class DefaultCommandMessageFactory implements CommandMessageFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createCommandMessage(
        string $messageId,
        string $sagaId,
        string $sagaType,
        string $commandType,
        string $payload
    ): CommandMessageInterface {
        return new CommandMessage($messageId, $payload, $sagaId, $sagaType, $commandType);
    }
}
