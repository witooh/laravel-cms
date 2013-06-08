<?php

namespace Witooh\Cms\Controllers;

use Controller;
use App;
use Witooh\Cms\CategoryManager;
use JsonResponse;
use Witooh\Cms\Models\Category;
use Input;
use DB;

class CategoryController extends Controller
{

    /**
     * @var CategoryManager;
     */
    protected $categoryManager;

    public function __construct()
    {
        $this->categoryManager = App::make('cms.category');
    }

    /**
     *
     */
    public function getIndex()
    {
    }

    /**
     * @param $id
     * @return \Witooh\BasicMessage\JsonResponse
     */
    public function getShow($id)
    {
        $content = $this->categoryManager->getCategoryById($id);

        if (is_null($content)) {
            JsonResponse::notfound();
        }

        return JsonResponse::success($content->toArray());
    }

    /**
     * @return \Witooh\BasicMessage\JsonResponse
     */
    public function postStore()
    {
        $category = new Category(Input::all());

        DB::transaction(
            function () use ($category) {
                $id = $this->categoryManager->create($category);
            }
        );

        return JsonResponse::success();
    }

    /**
     * @param $id
     * @return $this|\Witooh\BasicMessage\JsonResponse
     */
    public function putUpdate($id)
    {
        $attributes = Input::all();

        try {
            DB::getPdo()->beginTransction();

            $this->categoryManager->update($id, $attributes);

            DB::getPdo()->commit();

            return JsonResponse::success(array('id' => $id));
        } catch (\PDOException $e) {
            DB::getPdo()->rollBack();

            return JsonResponse::error($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return $this|\Witooh\BasicMessage\JsonResponse
     */
    public function deleteDestory($id)
    {
        try {
            DB::getPdo()->beginTransction();

            $this->categoryManager->destroy($id);

            DB::getPdo()->commit();

            return JsonResponse::success(array('id' => $id));
        } catch (\PDOException $e) {
            DB::getPdo()->rollBack();

            return JsonResponse::error($e->getMessage());
        }
    }
}