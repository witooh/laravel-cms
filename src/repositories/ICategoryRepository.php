<?php

namespace Witooh\Cms\Repositories;

use Witooh\Cms\Models\Category;

interface ICategoryRepository {

    /**
     * Create Category
     *
     * @param Category $content
     * @return integer | null
     */
    public function create(Category $content);

    /**
     * Update Category
     *
     * @param Category $content
     * @return integer | null
     */
    public function update(Category $content);

    /**
     * Remove Category
     *
     * @param integer $id
     * @return boolean
     */
    public function destroy($id);

    /**
     * Find Category by Name
     *
     * @param string $name
     * @return array
     */
    public function findByName($name);

    /**
     * Find Category by ID
     *
     * @param integer $id
     * @return Category
     */
    public function findByID($id);
}