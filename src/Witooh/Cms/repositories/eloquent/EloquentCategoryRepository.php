<?php

namespace Witooh\Cms\Repositories\Eloquent;

use Witooh\Cms\Repositories\ICategoryRepository;
use Witooh\Cms\Models\Category;

class EloquentCategoryRepository implements ICategoryRepository {
    /**
     * Create Category
     *
     * @param Category $content
     * @return integer | boolean
     */
    public function create(Category $content)
    {
        return $content->save() ? $content->id : false;
    }

    /**
     * @param integer $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, $attributes)
    {
        return Category::find($id)->update($attributes);
    }

    /**
     * Remove Category
     *
     * @param integer $id
     * @return void
     */
    public function destroy($id)
    {
        Category::destroy($id);
    }

    /**
     * Find Category by Name
     *
     * @param string $name
     * @return Category
     */
    public function findByName($name)
    {
        return Category::where('name', $name)->first();
    }

    /**
     * Find Category by ID
     *
     * @param integer $id
     * @return Category
     */
    public function findByID($id)
    {
        return Category::find($id);
    }



}