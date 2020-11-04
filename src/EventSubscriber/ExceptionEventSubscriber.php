<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\EventSubscriber;

use Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\Event\ExceptionEvent;
use Jalismrs\Symfony\Common\ConsoleEventSubscriberAbstract;

/**
 * Class ExceptionEventSubscriber
 *
 * @package Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\EventSubscriber
 */
class ExceptionEventSubscriber extends
    ConsoleEventSubscriberAbstract
{
    /**
     * getSubscribedEvents
     *
     * @static
     * @return string[]
     *
     * @codeCoverageIgnore
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
     * @param \Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\Event\ExceptionEvent $event
     *
     * @return \Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\Event\ExceptionEvent
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
