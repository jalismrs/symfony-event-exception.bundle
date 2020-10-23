<?php
declare(strict_types = 1);

namespace Jalismrs\EventExceptionBundle;

use Exception;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class ExceptionEvent
 *
 * @package Jalismrs\EventExceptionBundle
 *
 * @codeCoverageIgnore
 */
final class ExceptionEvent extends
    Event
{
    /**
     * exception
     *
     * @var \Exception
     */
    private Exception $exception;

    /**
     * ExceptionEvent constructor.
     *
     * @param \Exception $exception
     */
    public function __construct(
        Exception $exception
    ) {
        $this->exception = $exception;
    }

    /**
     * getException
     *
     * @return \Exception
     */
    public function getException() : Exception
    {
        return $this->exception;
    }
}
