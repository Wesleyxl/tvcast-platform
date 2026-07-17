<?php

use App\Models\MovieCategory;
use App\Models\MoviesInfo;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->prepend(HandleCors::class);

        // API sem tela de login: visitantes não autenticados não são redirecionados
        $middleware->redirectGuestsTo(
            fn (Request $request) => $request->is('api/*') ? null : '/',
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );

        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => [
                        'code' => 'UNAUTHENTICATED',
                        'message' => 'Token de autenticação ausente ou inválido.',
                    ],
                ], 401);
            }
        });

        // 404 amigável para a API, sem expor nomes de models ou rotas internas
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if (! $request->is('api/*')) {
                return null;
            }

            $previous = $e->getPrevious();

            $message = 'Recurso não encontrado.';

            if ($previous instanceof ModelNotFoundException) {
                $message = match ($previous->getModel()) {
                    MovieCategory::class => 'Categoria não encontrada.',
                    MoviesInfo::class => 'Informações do filme não encontradas.',
                    default => $message,
                };
            }

            return response()->json([
                'error' => [
                    'code' => 'NOT_FOUND',
                    'message' => $message,
                ],
            ], 404);
        });
    })->create();
