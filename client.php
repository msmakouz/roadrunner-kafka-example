<?php

declare(strict_types=1);

use Spiral\Goridge\RPC\RPC;
use Spiral\RoadRunner\Jobs\Jobs;
use Spiral\RoadRunner\Jobs\KafkaOptions;
use Spiral\RoadRunner\Jobs\Queue\Kafka\PartitionOffset;
use Spiral\RoadRunner\Jobs\Serializer\JsonSerializer;

require __DIR__ . '/vendor/autoload.php';

$jobs = new Jobs(RPC::create('tcp://127.0.0.1:6001'), new JsonSerializer());
$queue = $jobs->connect('test-kafka', new KafkaOptions(topic: 'mytopic', offset: PartitionOffset::OFFSET_NEWEST));

$task = $queue->dispatch(
    $queue->create('some-job', ['foo' => 'bar'])
);

echo \sprintf('Job ID: %s', $task->getId());
