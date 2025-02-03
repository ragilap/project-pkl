<?php

namespace App\Http\Middleware;

use App\Models\contact;
use App\Models\team;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRowCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($teamRowCount = (new team())->count()) {

            if ($teamRowCount >= 4) {
                return redirect()->route('team.crud')->with('error', 'Jumlah maksimum baris tim telah tercapai.');
            }
        }

        return $next($request);
    }
}
