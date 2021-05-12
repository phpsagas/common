<?php

namespace PhpSagas\Common\Message;

/**
 * Factory used for reply messages creation.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
interface ReplyMessageFactoryInterface
{
    /**
     * @param string $sagaId
     * @param string $correlationId
     * @param string $payload
     *
     * @return ReplyMessage
     */
    public function makeSuccess(string $sagaId, string $correlationId, string $payload): ReplyMessage;

    /**
     * @param string $sagaId
     * @param string $correlationId
     * @param string $payload
     *
     * @return ReplyMessage
     */
    public function makeFailure(string $sagaId, string $correlationId, string $payload): ReplyMessage;
}
