<?php

declare(strict_types=1);

namespace App\Http\Services\Filters;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilterBook
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
        return next($builder)
            ->when(
                $this->request->has('title'),
                fn ($query) => $query->where('title', 'REGEXP', $this->request->input('title'))
            )
            ->when(
                $this->request->has('index_title'),
                function ($query) {
                    return $query->whereHas('bookIndex', function ($indexQuery) {
                        $indexQuery->where('title', 'REGEXP', $this->request->input('index_title'));
                    });
                }
            );
    }
}
