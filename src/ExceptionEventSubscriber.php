<?php
declare(strict_types = 1);

namespace Jalismrs\EventExceptionBundle;

use Jalismrs\EventBundle\ConsoleEventSubscriberAbstract;

/**
 * Class ExceptionEventSubscriber
 *
 * @package Jalismrs\EventExceptionBundle
 */
class ExceptionEventSubscriber extends
    ConsoleEventSubscriberAbstract
{
    /**
     * getSubscribedEvents
     *
     * @static
     * @return string[]
     */
    public static function getSubscribedEvents() : array
    {
        return [
            ExceptionEvent::class => 'onException',
        ];
    }
    
    /**
     * onException
     *
     * @param \Jalismrs\EventExceptionBundle\ExceptionEvent $event
     *
     * @return \Jalismrs\EventExceptionBundle\ExceptionEvent
     */
    public function onException(
        ExceptionEvent $event
    ) : ExceptionEvent {
        if ($this->isActive()) {
            $exception = (string)$event->getException();
            
            $this
                ->getStyle()
                ->getErrorStyle()
                ->error($exception);
        }
        
        return $event;
    }
}
