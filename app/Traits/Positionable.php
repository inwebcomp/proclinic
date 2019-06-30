<?php

namespace App\Traits;

use App\Contracts\Cacheable;
use App\Events\PositionChanged;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Schema\Blueprint;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * @property int position
 */
trait Positionable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name'  => 'position',
        'sort_when_creating' => true,
    ];

    public static function positionColumn(Blueprint $table)
    {
        $table->integer('position')->nullable();
    }

    public function orderColumnName()
    {
        return $this->determineOrderColumnName();
    }

    /**
     * @param array $ids [pos => id]
     *
     * @return bool
     * @todo Emit positionsUpdate event
     */
    public static function updatePositionsById($ids)
    {
        $values = [];

        foreach ($ids as $pos => $id) {
            $values[$id] = '(' . (int) $id . ', ' . (int) $pos . ')';
            if (! $id)
                return false;
        }

        $class = new static;
        $table = $class->getTable();
        $posColumn = $class->determineOrderColumnName();

        $q = [];
        foreach ($ids as $pos => $id) {
            $q[] = "WHEN `id` = " . $id . " THEN " . $pos;
        }
        if ($q) {
            \DB::statement(
                "UPDATE `{$table}` SET 
                `{$posColumn}` = CASE " . implode("\t", $q) . " END 
                WHERE ID IN (" . implode(',', $ids) . ")"
            );

            $tags = $class instanceof Cacheable ? $class->cacheTagAll() : [];

            event(new PositionChanged($tags, $ids));
        }
    }

    /**
     * @param array $items
     * @param array $positions
     *
     * @return void
     */
    public static function updatePositions($items, $positions)
    {
        $input = [];

        foreach ($items as $key => $id) {
            $input[$positions[$key]] = $id;
        }

        return self::updatePositionsById($input);
    }
}
