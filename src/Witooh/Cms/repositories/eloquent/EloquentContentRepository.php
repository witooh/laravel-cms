<?php

namespace Witooh\Cms\Repositories\Eloquent;

use Witooh\Cms\Repositories\IContentRepository;
use Witooh\Cms\Models\Content;

class EloquentContentRepository implements IContentRepository {
    /**
     * Create Content
     *
     * @param Content $content
     * @return integer | null
     */
    public function create(Content $content)
    {
        // TODO: Implement create() method.
    }

    /**
     * Update Content
     *
     * @param Content $content
     * @return integer | null
     */
    public function update(Content $content)
    {
        // TODO: Implement update() method.
    }

    /**
     * Remove Content
     *
     * @param integer $id
     * @return boolean
     */
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * Find Content by Category Name
     *
     * @param string $category
     * @return array
     */
    public function findByCategory($category)
    {
        // TODO: Implement findByCategory() method.
    }

    /**
     * Find Content by ID
     *
     * @param integer $id
     * @return Content
     */
    public function findByID($id)
    {
        // TODO: Implement findByID() method.
    }

}