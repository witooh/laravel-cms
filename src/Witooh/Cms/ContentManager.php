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

        $validator = Validators::get('cms.content.create');
        $validator->setAttributes($content->toArray());
        if($validator->fails()){
            JsonResponse::validation($validator->getErrors(), $content->toArray());
        }

        $result = $this->contentRepository->create($content);

        Event::fire('cms.content.after.create', array($content));

        return $result;
    }

    public function update($id, $attributes)
    {
        Event::fire('cms.content.before.update', array($attributes));

        $validator = Validators::get('cms.content.update');
        $validator->setAttributes($attributes);
        if($validator->fails()){
            JsonResponse::validation($validator->getErrors(), $attributes);
        }

        $result = $this->contentRepository->update($id, $attributes);

        Event::fire('cms.content.after.update', array($attributes));

        return $result;
    }

    public function destroy($id)
    {
        Event::fire('cms.content.before.destroy', array($id));

        $this->contentRepository->destroy($id);

        Event::fire('cms.content.after.destroy', array($id));
    }

    public function getContentsByName($name)
    {
        return $this->contentRepository($name);
    }

    public function getContentById($id)
    {
        return $this->contentRepository->findByID($id);
    }
}