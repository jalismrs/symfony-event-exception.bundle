<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\EventListener;

use Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\Event\ExceptionEvent;
use Jalismrs\Symfony\Common\ConsoleEventListenerAbstract;

/**
 * Class ExceptionEventListener
 *
 * @package Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\EventListener
 */
class ExceptionEventListener extends
    ConsoleEventListenerAbstract
{
    /**
     * onException
     *
     * @param \Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\Event\ExceptionEvent $event
     *
     * @return \Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\Event\ExceptionEvent
     */
    public function onException(
        ExceptionEvent $event
    ) : ExceptionEvent {
        $exception = (string)$event->getException();
        
        $this
            ->getStyle()
            ->getErrorStyle()
            ->error($exception);
        
        return $event;
    }
}
