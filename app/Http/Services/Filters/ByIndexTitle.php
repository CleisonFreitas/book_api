<?php

declare(strict_types=1);

namespace App\Http\Services\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ByindexTitle
{
    public function __construct(
        public Request $request
    ) {
    }

    /**
     * @param Builder $builder
     * @param \Closure $next
     */
    public function handle(Builder $builder, Closure $next)
    {
        if (request()->has('index_title')) {
            $builder->whereHas('bookIndex', function ($indexQuery) {
                $indexQuery->where('title', 'REGEXP', $this->request->input('index_title'));
            });
        }

        return $next($builder);
    }
}
