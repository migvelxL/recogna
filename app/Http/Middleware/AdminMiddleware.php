<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->admin == false) {
            // Redirecionar ou retornar uma resposta de erro
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        return $next($request);
    }
}
