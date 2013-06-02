<?php
namespace Witooh\Cms\Repositories;

use Witooh\Cms\Models\Content;

/**
 * Class IContentRepository
 * @package Witooh\Cms\Repositories
 */
interface IContentRepository {

    /**
     * Create Content
     *
     * @param Content $content
     * @return integer | null
     */
    public function create(Content $content);

    /**
     * Update Content
     *
     * @param Content $content
     * @return integer | null
     */
    public function update(Content $content);

    /**
     * Remove Content
     *
     * @param integer $id
     * @return boolean
     */
    public function destroy($id);

    /**
     * Find Content by Category Name
     *
     * @param string $category
     * @return array
     */
    public function findByCategory($category);

    /**
     * Find Content by ID
     *
     * @param integer $id
     * @return Content
     */
    public function findByID($id);
}