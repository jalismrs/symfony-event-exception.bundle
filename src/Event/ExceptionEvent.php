<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\Event;

use Exception;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class ExceptionEvent
 *
 * @package Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\Event
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
