<?php
declare(strict_types = 1);

namespace Tests\EventSubscriber;

use Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\EventSubscriber\ExceptionEventSubscriber;
use Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\Event\ExceptionEvent;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class ExceptionEventSubscriberTest
 *
 * @package Tests\EventSubscriber
 *
 * @covers \Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\EventSubscriber\ExceptionEventSubscriber
 */
class ExceptionEventSubscriberTest extends
    TestCase
{
    /**
     * mockStyle
     *
     * @var \PHPUnit\Framework\MockObject\MockObject|\Symfony\Component\Console\Style\SymfonyStyle
     */
    private MockObject $mockStyle;
    
    /**
     * testOnException
     *
     * @return void
     */
    public function testOnException() : void
    {
        // arrange
        $systemUnderTest = $this->createSUT();
        
        $exception = new \Exception();
        
        $exceptionEvent = new ExceptionEvent(
            $exception
        );
        
        // expect
        $this->mockStyle
            ->expects(self::once())
            ->method('getErrorStyle')
            ->willReturnSelf();
        $this->mockStyle
            ->expects(self::once())
            ->method('error')
            ->with(
                self::isType('string'),
            );
        
        // act
        $output = $systemUnderTest->onException($exceptionEvent);
        
        // assert
        self::assertSame(
            $exceptionEvent,
            $output,
        );
    }
    
    /**
     * setUp
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();
        
        $this->mockStyle = $this->createMock(SymfonyStyle::class);
    }
    
    /**
     * createSUT
     *
     * @return \Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\EventSubscriber\ExceptionEventSubscriber
     */
    private function createSUT() : ExceptionEventSubscriber
    {
        // arrange
        $systemUnderTest = new ExceptionEventSubscriber();
        
        // act
        $systemUnderTest->activate();
        $systemUnderTest->setStyle($this->mockStyle);
        
        return $systemUnderTest;
    }
}
