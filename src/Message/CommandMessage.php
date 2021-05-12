<?php

namespace PhpSagas\Common\Message;

/**
 * Command message sending for remote command execution.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
class CommandMessage
{
    /** @var string */
    protected $id;
    /** @var string */
    protected $sagaId;
    /** @var string */
    protected $sagaType;
    /** @var string */
    protected $commandType;
    /** @var string */
    protected $payload;
    /** @var string[] */
    protected $headers = [];

    public function __construct(string $id, string $payload, string $sagaId, string $sagaType, string $commandType)
    {
        $this->id = $id;
        $this->payload = $payload;
        $this->sagaId = $sagaId;
        $this->sagaType = $sagaType;
        $this->commandType = $commandType;
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
     * @return CommandMessage
     */
    public function setHeader(string $key, string $value): CommandMessage
    {
        $this->headers[$key] = $value;
        return $this;
    }

    /**
     * @param string[] $headers
     *
     * @return CommandMessage
     */
    public function setHeaders(array $headers): CommandMessage
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
    public function getSagaType(): string
    {
        return $this->sagaType;
    }

    /**
     * @return string
     */
    public function getCommandType(): string
    {
        return $this->commandType;
    }
}
