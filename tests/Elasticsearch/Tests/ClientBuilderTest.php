<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Tests;

use ElasticsearchV6\ClientBuilder;
use ElasticsearchV6\Common\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ClientBuilderTest extends TestCase
{

    public function testClientBuilderThrowsExceptionForIncorrectLoggerClass()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('$logger must implement \Psr\Log\LoggerInterface!');

        ClientBuilder::create()->setLogger(new \ElasticsearchV6\Tests\ClientBuilder\DummyLogger());
    }

    public function testClientBuilderThrowsExceptionForIncorrectTracerClass()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('$tracer must implement \Psr\Log\LoggerInterface!');

        ClientBuilder::create()->setTracer(new \ElasticsearchV6\Tests\ClientBuilder\DummyLogger());
    }
}
