<?php

namespace PhpSagas\Common\Message;

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
    ): CommandMessage {
        return new CommandMessage($messageId, $payload, $sagaId, $sagaType, $commandType);
    }
}
