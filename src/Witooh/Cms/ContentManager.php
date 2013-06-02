<?php

namespace Witooh\Cms;

use Witooh\Validators\IValidator;
use Witooh\Cms\Repositories\IContentRepository;
use Witooh\Cms\Models\Content;

class ContentManager
{

    private $contentRepository;
    private $handlers = array();

    public function __construct(IContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    private function fire($event, $data)
    {
        if (isset($this->handlers[$event])) {
            foreach ($this->handlers[$event] as $handler) {
                $handler($data);
            }
        }
    }

    public function create(Content $content)
    {
        $this->fire('before.create', $content);
        $this->fire('after.create', $content);
    }

    public function update(Content $content)
    {
        $this->fire('before.update', $content);
        $this->fire('after.update', $content);
    }

    public function destroy($id)
    {
        $this->fire('before.update', $id);
        $this->fire('after.update', $id);
    }

    public function getContents($name)
    {

    }

    public function getContent($id)
    {

    }

    public function listen($event, $handler)
    {
        $this->handlers[$event][] = $handler;
    }
}