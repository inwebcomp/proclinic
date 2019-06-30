<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    public function searchableColumns()
    {
        return [];
    }

    /**
     * Apply the search query to the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch(Builder $query, $search)
    {
        if (is_numeric($search) && in_array($query->getModel()->getKeyType(), ['int', 'integer'])) {
            $query->where($query->getModel()->getQualifiedKeyName(), $search);
        } else {
            $this->applySearch($query, $search);
        }

        return $query;
    }

    public function applySearch(Builder $query, $search)
    {
        $search = str_replace(['@', '-', '+'], ['', ' ', ' '], $search);
        $search = preg_replace('/[^\w\s\.]+/', '', $search);
        $s = preg_replace('/\s+/', ' ', trim($search));
        $searchQ = "";

        $tmp = explode(' ', $s);
        foreach ($tmp as $k => $word) {
            if ($k <= 2)
                $searchQ .= "+" . $word . "*";
            else
                $searchQ .= " " . $word . "*";
        }

        $values = \DB::select(
            'SELECT pt.product_id
                FROM `product_translations` pt WHERE MATCH(pt.title) AGAINST (? IN BOOLEAN MODE)',
            [$searchQ, $s, $searchQ]
        );

        $ids = [];

        foreach ($values as $value)
            $ids[] = $value->product_id;

        $ids = array_unique($ids);

        if (! count($ids))
            $ids = [-1];

        $query->whereIn($this->getModel()->getKeyName(), $ids);
        $query->orderByRaw("FIELD(products.id, " . implode(',', $ids) . ") ASC");
    }
}