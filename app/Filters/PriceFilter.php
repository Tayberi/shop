<?php

declare(strict_types=1);

namespace App\Filters;

use Domain\Catalog\Filters\AbstractFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;

final class PriceFilter extends AbstractFilter
{
    public function title(): string
    {
        return 'Цена';
    }

    public function key(): string
    {
        return 'price';
    }

    //$query->when(request('filters.brands'), function (Builder $q) {
    //    $q->whereIn('brand_id', request('filters.brands'));
    //})->when(request('filters.price'), function (Builder $q) {
    //    $q->whereBetween('price', [
    //        request('filters.price.from', 0) * 100,
    //        request('filters.price.to', 100000) * 100
    //    ]);
    //});
    public function apply(Builder $query): Builder
    {
        return $query->when($this->requestValue(), function (Builder $q) {
            $q->whereBetween('price', [
//                request('filters.price.from', 0) * 100,
                $this->requestValue('from', 0) * 100,
//                request('filters.price.to', 100000) * 100
                $this->requestValue('to', 100000) * 100,
            ]);
        });
    }

    public function values(): array
    {
        return [
            'from' => 0,
            'to' => 100000
        ];
    }

    public function view(): string
    {
        return 'catalog.filters.price';
    }
}
