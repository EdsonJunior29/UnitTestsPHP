<?php

class Queue
{
    /**
     * Maximum number of itens in the queue
     * @var integer
     */
    public const MAX_ITENS = 5;

    /**
     * Queue itens
     *
     * @var array
     */
    protected $itens = [];

    /**
     * Add an item to the end of the Queue
     *
     * @param $item The item
     */
    public function push($item)
    {
        if ($this->getCount() == static::MAX_ITENS) {
            throw new QueueException("Queue is full");
        }

        $this->itens[] = $item;
    }

    /**
     * Take an item off the head of the queue
     *
     * @return mixed the item
     */
    public function shift()
    {
        return array_shift($this->itens);
    }

    /**
     * Get the total number of itens in the queue
     *
     * @return integer
     */
    public function getCount()
    {
        return count($this->itens);
    }
}
