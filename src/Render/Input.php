<?php
namespace Syndicate\Render;

require_once __DIR__ . '/../../support/lib/vendor/autoload.php';

use Approach\Render\Attribute;
use Approach\Render\Node;
use Approach\Render\Stream;
use Stringable;

class Input extends FormEle
{
    public function __construct(
        // Needed for HTML
        public null|string|Stringable $title = null,
        public null|string|Stringable $id = null,
        null|string|array|Node|Attribute $classes = null,
        public null|array|Attribute $attributes = new Attribute,
        public null|string|Stringable|Stream|self $content = null,
        public array $styles = [],
        public bool $prerender = false,
        public bool $selfContained = false,
        // Declared by Input
        public null|string|Stringable|Stream|self $value = '',  // The value of the input
        public null|string|Stringable|Stream|self $type = 'text',  // The type of the input
        public null|string|Stringable|Stream|self $name = '__input__',  // The name of the input
    ) {
        parent::__construct(
            tag: 'input',
            id: $id,
            classes: $classes,
            attributes: $attributes,
            content: $content,
            styles: $styles,
            prerender: $prerender,
            selfContained: true,
            value: $value,
            name: $name,
        );

        if ($type) {
            $this->attributes['type'] = $type;
        }
    }
}
