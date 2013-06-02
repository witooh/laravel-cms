<?php

namespace Witooh\Cms;

use Witooh\Validators\IValidator;
use Witooh\Cms\Repositories\ICategoryRepository;
use Witooh\Cms\Models\Category;

class CategoryManager
{

    private $categoryRepository;
    private $handlers = array();

    public function __construct(ICategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    private function fire($event)
    {
        if (isset($this->handlers[$event])) {
            foreach ($this->handlers[$event] as $handler) {
                $handler();
            }
        }
    }

    public function create(Category $category)
    {
        $this->fire('before.create');
        $this->fire('after.create');
    }

    public function update(Category $category)
    {
        $this->fire('before.update');
        $this->fire('after.update');
    }

    public function destroy($id)
    {
        $this->fire('before.destroy');
        $this->fire('after.destroy');
    }

    public function getCategory($id)
    {

    }

    public function getAll()
    {

    }

    public function listen($event, $handler)
    {
        $this->handlers[$event][] = $handler;
    }
}