<?php
declare(strict_types = 1);

namespace Tests\EventListener;

use Exception;
use Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\EventListener\ExceptionEventListener;
use Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\Event\ExceptionEvent;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class ExceptionEventListenerTest
 *
 * @package Tests\EventListener
 *
 * @covers \Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\EventListener\ExceptionEventListener
 */
class ExceptionEventListenerTest extends
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
        
        $exception = new Exception();
        
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
     * @return \Jalismrs\Symfony\Bundle\JalismrsExceptionEventBundle\EventListener\ExceptionEventListener
     */
    private function createSUT() : ExceptionEventListener
    {
        // arrange
        $systemUnderTest = new ExceptionEventListener();
        
        // act
        $systemUnderTest->setStyle($this->mockStyle);
        
        return $systemUnderTest;
    }
}
