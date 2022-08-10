<?php

declare(strict_types=1);

use Spiral\RoadRunner\Jobs\Consumer;
use Spiral\RoadRunner\Jobs\Serializer\JsonSerializer;

require __DIR__ . '/vendor/autoload.php';

$consumer = new Consumer(serializer: new JsonSerializer());

while ($task = $consumer->waitTask()) {
    dumprr('Received task with payload:');
    dumprr($task->getPayload());

    $task->complete();
}
