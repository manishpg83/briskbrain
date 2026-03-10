<?php

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$commands = ['config:clear', 'cache:clear', 'view:clear', 'route:clear', 'config:cache'];

echo "<h2>Laravel Cache Clear Output</h2>";
foreach ($commands as $command) {
    $kernel->call($command);
    echo "<p>✅ {$command}</p>";
}

echo "<p><strong>✔️ All Laravel caches cleared successfully.</strong></p>";
