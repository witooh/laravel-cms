<?php

namespace Witooh\Cms;

use Illuminate\Database\Seeder;
use DB;
use Eloquent;
use Witooh\Cms\Models\Category;
use DateTime;

class CmsDatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->CmsCategorySeeder();
        $this->CmsContentSeeder();
    }

    public function CmsContentSeeder()
    {
        DB::table('cms_content')->insert(
            array(
                array(
                    'title'=>'Title 1',
                    'content'=>'Content 1',
                    'category_id'=> 1,
                    'created_by'=> 1,
                    'published'=>true,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'title'=>'Title 2',
                    'content'=>'Content 2',
                    'category_id'=> 1,
                    'created_by'=> 1,
                    'published'=>true,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'title'=>'Title 3',
                    'content'=>'Content 3',
                    'category_id'=> 1,
                    'created_by'=> 1,
                    'published'=>false,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
            )
        );
    }

    public function CmsCategorySeeder()
    {

        DB::table('cms_category')->insert(
            array(
                array(
                    'name' => 'Category 1',
                    'created_by' => 4,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'name' => 'Category 2',
                    'created_by' => 4,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
            )
        );

    }

}