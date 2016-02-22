<?php

/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/22/16
 * Time: 11:53 AM
 */
class Queue
{
    protected $queue;
    protected $limit;

    public function __construct($limit = 1024) {
        // initialize the stack
        $this->queue = array();
        // stack can only contain this many items
        $this->limit = $limit;
    }

    public function enqueue($item) {
        // trap for stack overflow
        if (count($this->queue) < $this->limit) {
            // prepend item to the start of the array
            array_push($this->queue, $item);
        } else {
            throw new RunTimeException('Queue is full!');
        }
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            // trap for stack underflow
            throw new RunTimeException('Queue is empty!');
        } else {
            // pop item from the start of the array
            return array_shift($this->queue);
        }
    }


    public function isEmpty() {
        return empty($this->queue);
    }
}