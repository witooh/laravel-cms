<?php

namespace Witooh\Cms;

use Event;
use Witooh\Cms\Repositories\ICategoryRepository;
use Witooh\Cms\Models\Category;

class CategoryManager
{

    private $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(Category $category)
    {
        Event::fire('cms.category.before.create', array($category));
        $result = $this->categoryRepository->create($category);
        Event::fire('cms.category.after.create', array($category));

        return $result;
    }

    public function update($id, $attributes)
    {
        Event::fire('cms.category.before.update', array($id, $attributes));
        $result = $this->categoryRepository->update($id, $attributes);
        Event::fire('cms.category.after.update', array($id, $attributes));

        return $result;
    }

    public function destroy($id)
    {
        Event::fire('cms.category.before.destroy', array($id));
        $this->categoryRepository->destroy($id);
        Event::fire('cms.category.after.destroy', array($id));
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->findByID($id);
    }

    public function getCategoryByName($name)
    {
        return $this->getCategoryByName($name);
    }

    public function getAll()
    {

    }
}