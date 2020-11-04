# symfony.bundle.event.exception

Adds an exception event with its subscriber

## Test

`phpunit` or `vendor/bin/phpunit`

coverage reports will be available in `var/coverage`

## Use
EventSubscriber is assumed to be active and configured
```php
use Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\Event\ExceptionEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;

class SomeClass {
    private EventDispatcher $eventDispatcher;

    public function someFunction(): void {
        try {
            // do something
        } catch(Exception $exception) {
            $exceptionEvent = new ExceptionEvent(
                $exception
            );
            $this->eventDispatcher->dispatch($exceptionEvent);
        }
    }
}
```
