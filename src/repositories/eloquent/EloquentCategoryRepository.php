<?php

namespace Witooh\Cms\Repositories\Eloquent;

use Witooh\Cms\Repositories\ICategoryRepository;
use Witooh\Cms\Models\Category;

class EloquentCategoryRepository implements ICategoryRepository {
    /**
     * Create Category
     *
     * @param Category $content
     * @return integer | null
     */
    public function create(Category $content)
    {
        // TODO: Implement create() method.
    }

    /**
     * Update Category
     *
     * @param Category $content
     * @return integer | null
     */
    public function update(Category $content)
    {
        // TODO: Implement update() method.
    }

    /**
     * Remove Category
     *
     * @param integer $id
     * @return boolean
     */
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * Find Category by Name
     *
     * @param string $name
     * @return array
     */
    public function findByName($name)
    {
        // TODO: Implement findByName() method.
    }

    /**
     * Find Category by ID
     *
     * @param integer $id
     * @return Category
     */
    public function findByID($id)
    {
        // TODO: Implement findByID() method.
    }

}