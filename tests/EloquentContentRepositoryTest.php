<?php


use Witooh\Cms\Models\Content;
use Witooh\Cms\Repositories\IContentRepository;

class EloquentContentRepositoryTest extends TestCase {

    protected $contentRepository;

    public function setUp()
    {
        parent::setUp();

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
            'published'=>true,
        );
        $content = new Content($data);

        //Act
        $savedContent = $this->contentRepository->create($content);

        //Assert
        $this->assertEquals($content, $savedContent);
    }

    /**
     * Test update data into db
     */
    public function testUpdate(){
        //arrange
        $contentRepository = Mockery::mock('Witooh\Cms\Repositories\IContentRepository');
        $contentRepository->shouldReceive('findByID')->with(Mockery::any())->once()->andReturn(new Content(array(
                'title'=>'test',
                'content'=>'description',
                'published'=>true,
            )));
        $content = $contentRepository->findByID(1);
        $content->title = 'Updated Title';

        //Act
        $updatedContent = $this->contentRepository->update($content);

        //Assert
        $this->assertEquals($content, $updatedContent);
    }
}