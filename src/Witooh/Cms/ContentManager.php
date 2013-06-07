<?php

namespace Witooh\Cms;

use Witooh\Cms\Repositories\IContentRepository;
use Witooh\Cms\Models\Content;
use Event;
use ResMsg;

class ContentManager
{

    private $contentRepository;

    public function __construct(IContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    public function create(Content $content)
    {
        Event::fire('cms.content.before.create', array($content));
        $result = $this->contentRepository->create($content);
        Event::fire('cms.content.after.create', array($content));

        return $result;
    }

    public function update(Content $content, $userID)
    {
        Event::fire('cms.content.before.update', array($content));
        Event::fire('cms.content.after.update', array($content));
    }

    public function destroy($id)
    {
        Event::fire('cms.content.before.destroy', array($id));
        Event::fire('cms.content.after.destroy', array($id));
    }

    public function getContents($name)
    {

    }

    public function getContent($id)
    {

    }
}