<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class RunArtisanController extends Controller
{
    public function __invoke(Request $request, string $token, string $command)
    {
        if ($token !== env('RUN_ARTISAN_TOKEN')) {
            abort(403);
        }
        $allowed = [
            'cache:clear',
            'config:clear',
            'route:clear',
            'view:clear',
            'optimize',
            'queue:restart',
            'migrate:status',
            'schema:dump',
            'schema:restore',
            'model:show',
            'list',
            'help',
            'version',
        ];


        if (!in_array($command, $allowed, true)) {
            abort(403, "Command '{$command}' is not allowed.");
        }

        // Capture output
        $exit = Artisan::call($command);

        Log::info("Artisan command '{$command}' executed via web. Exit code: {$exit}");

        return response()->json([
            'command' => $command,
            'exit_code' => $exit,
            'output' => Artisan::output(),
        ]);
    }
}
