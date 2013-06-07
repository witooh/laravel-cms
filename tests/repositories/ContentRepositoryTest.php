<?php


use Witooh\Cms\Models\Content;
use Witooh\Cms\Repositories\IContentRepository;

class ContentRepositoryTest extends TestCase {

    /**
     * @var IContentRepository
     */
    protected $contentRepository;

    public function setUp()
    {
        parent::setUp();

        $this->prepareForTests('witooh\cms');

        $this->seed('Witooh\Cms\CmsDatabaseSeeder');

        $this->contentRepository = $this->app['Witooh\Cms\Repositories\IContentRepository'];
    }

    /**
     * Test insert data into db
     */
    public function testCreate(){
        //arrange
        $data = array(
            'title'=>'test',
            'content'=>'description',
            'user_id'=>1,
            'published'=>true,
        );
        $content = new Content($data);

        //Act
        $savedContent = $this->contentRepository->create($content);

        //Assert
        $this->assertInDB('cms_content', array('title'=>'test'));
    }

    /**
     * Test update data into db
     */
    public function testUpdate(){
        //Arrange
        $id = 1;
        $newAttributes = array(
            'title'=>'Content 1 Updated',
        );

        //Act
        $this->contentRepository->update($id, $newAttributes);

        //Assert
        $this->assertInDB('cms_content', array('title'=>'Content 1 Updated'));
    }

    public function testFindByID(){
        //Arrange
        $id = 1;

        //Act
        $content = $this->contentRepository->findByID($id);

        //Assert
        $this->assertInstanceOf('Witooh\Cms\Models\Content', $content);
    }

    public function testFindByCategory(){
        //Arrange
        $category = 'Category 1';

        //Act
        $content = $this->contentRepository->findByCategory($category, true);

        //Assert
//        $this->assertInstanceOf('Witooh\Cms\Models\Content', $content[0]);
        $this->assertGreaterThan(0, count($content));
    }

    public function testDestroy(){
        //Arrange
        $id = 1;

        //Act
        $this->contentRepository->destroy($id);

        //Assert
        $this->assertNotInDB('cms_content', array('id'=>1));
    }
}