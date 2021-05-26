<?php

namespace PhpSagas\Common\Message;

use PhpSagas\Contracts\MessageIdGeneratorInterface;
use PhpSagas\Contracts\ReplyMessageFactoryInterface;
use PhpSagas\Contracts\ReplyMessageInterface;

/**
 * Default factory implementation.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
class DefaultReplyMessageFactory implements ReplyMessageFactoryInterface
{
    /** @var MessageIdGeneratorInterface */
    private $messageIdGenerator;

    public function __construct(MessageIdGeneratorInterface $messageIdGenerator)
    {
        $this->messageIdGenerator = $messageIdGenerator;
    }

    public function makeSuccess(string $sagaId, string $correlationId, string $payload): ReplyMessageInterface
    {
        return ReplyMessage::makeSuccess($this->messageIdGenerator->generateId(), $payload, $sagaId, $correlationId);
    }

    public function makeFailure(string $sagaId, string $correlationId, string $payload): ReplyMessageInterface
    {
        return ReplyMessage::makeFailure($this->messageIdGenerator->generateId(), $payload, $sagaId, $correlationId);
    }
}
