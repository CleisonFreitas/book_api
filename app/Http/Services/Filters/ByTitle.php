<?php

declare(strict_types=1);

namespace App\Http\Services\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ByTitle
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
        if ($this->request->has('title')) {
            $builder->where('title', 'REGEXP', $this->request->input('title'));
        }

        return $next($builder);
    }
}
