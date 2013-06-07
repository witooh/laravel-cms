<?php

namespace Witooh\Cms\Repositories;

use Witooh\Cms\Models\Category;

interface ICategoryRepository {

    /**
     * Create Category
     *
     * @param Category $content
     * @return integer | boolean
     */
    public function create(Category $content);

    /**
     * Update Category
     *
     * @param integer $id
     * @param array $attributes
     * @return boolean
     */
    public function update($id, $attributes);

    /**
     * Remove Category
     *
     * @param integer $id
     * @return void
     */
    public function destroy($id);

    /**
     * Find Category by Name
     *
     * @param string $name
     * @return Category
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