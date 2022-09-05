<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;

    /**
     * Antes dos testes e chamada essa função.
     *
     */
    protected function setUp(): void
    {
        $this->queue = new Queue;
    }

    /*
        * Depois dos tests é chamada essa função para destruir a intância
        protected function tearDown(): void
        {
            //destroy the queue
            unset($this->queue);
        }
    */

    public function testQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAddedElementToTheQueue()
    {
        $this->queue->push('Green');
        $this->queue->push('Red');
        $this->queue->push('Blue');

        $this->assertEquals(3, $this->queue->getCount());
    }

    public function testRemovedElementToTheQueue()
    {
        $this->queue->push('Green');
        $this->queue->push('Red');
        $this->queue->push('Blue');

        $item = $this->queue->shift();

        $this->assertEquals(2, $this->queue->getCount());
        $this->assertEquals('Green', $item);
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITENS; $i++) {
            $this->queue->push($i);
        }
        $this->assertEquals(Queue::MAX_ITENS, $this->queue->getCount());
    }
    
    public function testExceptionTrownWhenAddingAnItemToFullQueue()
    {
        $this->queue->push('Green');
        $this->queue->push('Red');
        $this->queue->push('Blue');
        $this->queue->push('Black');
        $this->queue->push('Pink');

        $this->expectException(QueueException::class);
        $this->expectExceptionMessage("Queue is full");

        $this->queue->push('White');
    }
}
