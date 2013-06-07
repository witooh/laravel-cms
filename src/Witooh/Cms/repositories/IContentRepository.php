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
     * @return boolean
     */
    public function create(Content $content);

    /**
     * Update Content
     *
     * @param integer $id
     * @param array $attributes
     * @return boolean
     */
    public function update($id, $attributes);

    /**
     * Remove Content
     *
     * @param integer $id
     * @return void
     */
    public function destroy($id);

    /**
     * Find Content by Cetegory Name
     *
     * @param $category
     * @param boolean | null $published
     * @return array | null
     */
    public function findByCategory($category, $published = true);

    /**
     * Find Content by ID
     *
     * @param integer $id
     * @return Content | null
     */
    public function findByID($id);
}