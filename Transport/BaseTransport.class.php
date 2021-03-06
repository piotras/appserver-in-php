<?php
namespace MFS\AppServer\Transport;

abstract class BaseTransport implements iTransport
{
    protected $addr;
    protected $callback;

    public function __construct($addr, $callback)
    {
        if (!is_callable($callback))
            throw new InvalidArgumentException('not a valid callback');

        $this->addr = $addr;
        $this->callback = $callback;

        $this->addSocket($this->addr);
    }

    static function log($object, $message)
    {
        echo $object.' -> '.$message."\n";
    }
}
