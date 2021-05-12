<?php

namespace PhpSagas\Common\Message;

/**
 * Factory used for command messages creation.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
interface CommandMessageFactoryInterface
{
    /**
     * @param string $messageId
     * @param string $sagaId
     * @param string $sagaType
     * @param string $commandType
     * @param string $payload
     *
     * @return CommandMessage
     */
    public function createCommandMessage(
        string $messageId,
        string $sagaId,
        string $sagaType,
        string $commandType,
        string $payload
    ): CommandMessage;
}
