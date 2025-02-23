<?php

declare(strict_types=1);

namespace PoPCMSSchema\PageMutations\TypeResolvers\InputObjectType;

use PoPCMSSchema\CustomPostMutations\TypeResolvers\InputObjectType\AbstractCustomPostContentAsOneofInputObjectTypeResolver;
use PoPCMSSchema\CustomPostMutations\TypeResolvers\InputObjectType\RootUpdateCustomPostInputObjectTypeResolver;

class RootUpdatePageInputObjectTypeResolver extends RootUpdateCustomPostInputObjectTypeResolver implements UpdatePageInputObjectTypeResolverInterface
{
    private ?PageContentAsOneofInputObjectTypeResolver $pageContentAsOneofInputObjectTypeResolver = null;

    final protected function getPageContentAsOneofInputObjectTypeResolver(): PageContentAsOneofInputObjectTypeResolver
    {
        if ($this->pageContentAsOneofInputObjectTypeResolver === null) {
            /** @var PageContentAsOneofInputObjectTypeResolver */
            $pageContentAsOneofInputObjectTypeResolver = $this->instanceManager->getInstance(PageContentAsOneofInputObjectTypeResolver::class);
            $this->pageContentAsOneofInputObjectTypeResolver = $pageContentAsOneofInputObjectTypeResolver;
        }
        return $this->pageContentAsOneofInputObjectTypeResolver;
    }

    public function getTypeName(): string
    {
        return 'RootUpdatePageInput';
    }

    protected function getContentAsOneofInputObjectTypeResolver(): AbstractCustomPostContentAsOneofInputObjectTypeResolver
    {
        return $this->getPageContentAsOneofInputObjectTypeResolver();
    }
}
