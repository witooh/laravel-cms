<?php

class TestEloquentContentRepository extends TestCase {

    protected $contentRepository;

    public function __construct(\Witooh\Cms\Repositories\IContentRepository $contentRepository){
        $this->contentRepository = $contentRepository;
    }

    public function testCreate(){
        //arrange
        $content = new \Witooh\Cms\Models\Content();

        //Act
        $savedContent = $this->contentRepository->create($content);

        //Assert
        $this->assertEqual($savedContent, $content);
    }
}