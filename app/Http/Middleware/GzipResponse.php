<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GzipResponse
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // only compress if the client supports gzip and nothing has compressed it yet
        if (
            !str_contains((string) $request->header('Accept-Encoding', ''), 'gzip') ||
            !function_exists('gzencode') ||
            $response->headers->has('Content-Encoding')
        ) {
            return $response;
        }

        $content = $response->getContent();

        // skip empty or very small responses
        if (!is_string($content) || strlen($content) < 1024) {
            return $response;
        }

        $compressed = gzencode($content, 6);
        if ($compressed === false) {
            return $response;
        }

        $response->setContent($compressed);
        $response->headers->set('Content-Encoding', 'gzip');
        $response->headers->set('Content-Length', (string) strlen($compressed));
        $response->headers->set('Vary', 'Accept-Encoding');

        return $response;
    }
}