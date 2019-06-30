<?php

namespace App\Traits;

use App\Models\Category;
use App\Models\Entity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * @property static   parent
 * @property static[] children
 * @property int      parent_id
 */
trait Tree
{
    /**
     * @return static
     */
    public function parent()
    {
        $result = $this->belongsTo($this->getModel(), 'parent_id', 'id');

        if ($this->translatable())
            $result->withTranslation();

        return $result;
    }

    /**
     * @return static[]
     */
    public function children()
    {
        $result = $this->hasMany($this->getModel(), 'parent_id', 'id');

        if ($this->translatable())
            $result->withTranslation();

        return $result;
    }

    /**
     * @return Builder
     */
    public static function firstLevel()
    {
        return static::where('parent_id', '=', null);
    }

    public static function tree($level = 4, $published = false)
    {
        $with = [];

        if ($published) {
            for ($i = 1; $i < $level; $i++) {
                $with[implode('.', array_fill(0, $i, 'children'))] = function ($q) {
                    $q->published();
                };
            }
        } else {
//            $with[] = implode('.', array_fill(0, $level, 'children'));

            for ($i = 1; $i < $level; $i++) {
                $with[implode('.', array_fill(0, $i, 'children'))] = function ($q) {
                    $q->select('id', 'title', 'parent_id');
                };
            }
        }

        $result = static::with($with)->where('parent_id', '=', null);

        if ($published)
            $result->published();

        if ((new static())->translatable())
            $result->withTranslation();

        return $result;
    }

    public static function treePublished($level = 4)
    {
        return static::tree($level, true);
    }

    /**
     * List of parents
     *
     * Example: Root -> Notebooks -> Gaming
     *
     * @return Collection
     */
    public function parents()
    {
        $parents = new Collection();

        $parents->push($this);

        while (($parent = $parents->first()->parent) and $parent->published()) {
            $parents->prepend($parent);
        }

        return $parents;
    }

    /**
     * List of siblings
     *
     * Example:
     * We have Root -> Notebooks -> Gaming, Business, Universal
     * Calling this method for Business will return Gaming, Business, Universal query builder
     *
     * @param bool $onlyPublished
     * @return Builder
     */
    public function siblings($onlyPublished = true)
    {
        $query = Category::where('parent_id', $this->parent_id);

        if ($onlyPublished)
            $query->published();

        return $query;
    }
}
