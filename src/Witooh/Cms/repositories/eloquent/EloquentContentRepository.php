<?php

namespace Witooh\Cms\Repositories\Eloquent;

use Witooh\Cms\Repositories\IContentRepository;
use Witooh\Cms\Models\Content;

class EloquentContentRepository implements IContentRepository {
    /**
     * Create Content
     *
     * @param Content $content
     * @return integer | boolean
     */
    public function create(Content $content)
    {
        return $content->save() ? $content->id : false;
    }

    /**
     * Update Content
     *
     * @param integer $id
     * @param array $attributes
     * @return bool|void
     */
    public function update($id, $attributes)
    {
        return Content::find($id)->update($attributes);
    }

    /**
     * Remove Content
     *
     * @param integer $id
     * @return void
     */
    public function destroy($id)
    {
        return Content::destroy($id);
    }

    /**
     * Find Content by Category Name
     *
     * @param $category
     * @param bool $published
     * @return array | null
     */
    public function findByCategory($category, $published = true)
    {
        $result = array();

        foreach(Content::where('published', '=', $published)->with('category')->get() as $content){
            if($content->category->name == $category){
                $result[] = $content;
            }
        }

        return empty($result) ? null : $result;
    }

    /**
     * Find Content by ID
     *
     * @param integer $id
     * @return Content | null
     */
    public function findByID($id)
    {
        return Content::find($id);
    }

}