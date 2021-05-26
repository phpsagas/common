<?php

namespace PhpSagas\Common\Message;

use PhpSagas\Contracts\ReplyMessageInterface;

/**
 * Reply message returning after remote command execution finished.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
class ReplyMessage implements ReplyMessageInterface
{
    /** @var string */
    private const SUCCESS = 'SUCCESS';
    /** @var string */
    private const FAILURE = 'FAILURE';

    /** @var string */
    protected $id;
    /** @var string */
    protected $sagaId;
    /** @var string */
    protected $correlationId;
    /** @var string */
    protected $outcome;
    /** @var string */
    protected $payload;
    /** @var string[] */
    protected $headers = [];

    /**
     * @param string $sagaId
     *
     * @return ReplyMessageInterface
     */
    public static function makeEmptySuccess(string $sagaId): ReplyMessageInterface
    {
        return self::makeSuccess('', '{}', $sagaId, '');
    }

    /**
     * @param string $id
     * @param string $payload
     * @param string $sagaId
     * @param string $correlationId
     *
     * @return ReplyMessageInterface
     */
    public static function makeSuccess(
        string $id,
        string $payload,
        string $sagaId,
        string $correlationId
    ): ReplyMessageInterface {
        return new self($id, $payload, $sagaId, $correlationId, self::SUCCESS);
    }

    /**
     * @param string $sagaId
     *
     * @return ReplyMessageInterface
     */
    public static function makeEmptyFailure(string $sagaId): ReplyMessageInterface
    {
        return self::makeFailure('', '{}', $sagaId, '');
    }

    /**
     * @param string $id
     * @param string $payload
     * @param string $sagaId
     * @param string $correlationId
     *
     * @return ReplyMessageInterface
     */
    public static function makeFailure(
        string $id,
        string $payload,
        string $sagaId,
        string $correlationId
    ): ReplyMessageInterface {
        return new self($id, $payload, $sagaId, $correlationId, self::FAILURE);
    }

    public function __construct(string $id, string $payload, string $sagaId, string $correlationId, string $outcome)
    {
        $this->ensureOutcomeValid($outcome);

        $this->id = $id;
        $this->payload = $payload;
        $this->sagaId = $sagaId;
        $this->correlationId = $correlationId;
        $this->outcome = $outcome;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param string $header
     *
     * @return string|null
     */
    public function getHeader(string $header): ?string
    {
        return $this->headers[$header] ?? null;
    }

    /**
     * @param string $header
     *
     * @return string
     */
    public function getRequiredHeader(string $header): string
    {
        if (\array_key_exists($header, $this->headers)) {
            return $this->headers[$header];
        }

        throw new HeaderNotFoundException('Header not found: ' . $header);
    }

    /**
     * @return string
     */
    public function getPayload(): string
    {
        return $this->payload;
    }

    /**
     * @param string $header
     *
     * @return bool
     */
    public function hasHeader(string $header): bool
    {
        return \array_key_exists($header, $this->headers);
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return ReplyMessageInterface
     */
    public function setHeader(string $key, string $value): ReplyMessageInterface
    {
        $this->headers[$key] = $value;
        return $this;
    }

    /**
     * @param string[] $headers
     *
     * @return ReplyMessageInterface
     */
    public function setHeaders(array $headers): ReplyMessageInterface
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @return string
     */
    public function getSagaId(): string
    {
        return $this->sagaId;
    }

    /**
     * @return string
     */
    public function getCorrelationId(): string
    {
        return $this->correlationId;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return (self::SUCCESS === $this->outcome);
    }

    /**
     * @return bool
     */
    public function isFailure(): bool
    {
        return (self::FAILURE === $this->outcome);
    }

    /**
     * @return string
     */
    public function getOutcome(): string
    {
        return $this->outcome;
    }

    /**
     * @param string $outcome
     */
    private function ensureOutcomeValid(string $outcome): void
    {
        $available = [self::FAILURE, self::SUCCESS];

        if (!\in_array($outcome, $available, true)) {
            throw new \RuntimeException(
                sprintf('Unknown outcome: %s. Available: %s', $outcome, implode(', ', $available))
            );
        }
    }
}
