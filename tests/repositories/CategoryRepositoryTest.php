<?php

use Witooh\Cms\Repositories\ICategoryRepository;
use Witooh\Cms\Models\Category;

class CategoryRepositoryTest extends TestCase {

    /**
     * @var ICategoryRepository
     */
    protected $categoryRepository;

    public function setUp()
    {
        parent::setUp();

        $this->prepareForTests('witooh\cms');

        $this->seed('Witooh\Cms\CmsDatabaseSeeder');

        $this->categoryRepository = $this->app['Witooh\Cms\Repositories\ICategoryRepository'];
    }


    /**
     * Test insert data into db
     */
    public function testCreate(){
        //Arrange
        $data = array(
            'name'=>'Test',
            'user_id'=>1,
        );
        $category = new Category($data);

        //Act
        $this->categoryRepository->create($category);

        //Assert
        $this->assertInDB('cms_category', array('name'=>'Test'));

    }

    /**
     * Test update data into db
     */
    public function testUpdate(){
        //Arrange
        $id = 1;
        $newAttributes = array(
            'name'=>'Category 1 Updated',
        );

        //Act
        $this->categoryRepository->update($id, $newAttributes);

        //Assert
        $this->assertInDB('cms_category', array('name'=>'Category 1 Updated'));
    }

    public function testFindByID(){
        //Arrange
        $id = 1;

        //Act
        $category = $this->categoryRepository->findByID($id);

        //Assert
        $this->assertInstanceOf('Witooh\Cms\Models\Category', $category);
    }

    public function testFindByName(){
        //Arrange
        $category_name = 'Category 2';

        //Act
        $category = $this->categoryRepository->findByName($category_name);

        //Assert
        $this->assertInstanceOf('Witooh\Cms\Models\Category', $category);
    }

    public function testDestroy(){
        //Arrange
        $id = 1;

        //Act
        $this->categoryRepository->destroy($id);

        //Assert
        $this->assertNotInDB('cms_category', array('id'=>1));
    }
}