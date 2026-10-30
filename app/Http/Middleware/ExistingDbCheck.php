<?php

namespace App\Http\Middleware;

use App\Http\Controllers\PizzaDbController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ExistingDbCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $connection = env('DB_CONNECTION2');
        $dbc = DB::connection($connection);
        $schema = $dbc->getSchemaBuilder();
        
        $table = $request->table;
        if (!$schema->hasTable($table)) {
            return redirect('/db');
        }
        return $next($request);
        /*
        if ($page < 1 || $page > $maxpages) {
            $page = self::clamp($page, 1, $maxpages);
            return redirect()->route('db_display', ['page'=>$page, 'length'=>$length, 'table'=>$table]);
        }*/
        //return current->route($request->, $request->merge(['page'=>$page, 'length'=>$length]));
    }
    
    private static function clamp(mixed $x, mixed $min, mixed $max): mixed {
        if ($x < $min) return $min;
        if ($x > $max) return $max;
        return $x;
    }
}
