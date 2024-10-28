<?php

namespace App\Traits;

trait HasExcerpt
{
    public function getExcerptAttribute()
    {
        $content = $this->getExcerptContent();
        $length = $this->getExcerptProperty()['length'];

        $shortContent = mb_substr($content, 0, $length);

        if (mb_strlen($content) > 60) {
            $shortContent .= '...';
        }

        return $shortContent;
    }

    protected function getExcerptContent()
    {
        // Converto i caratteri di newline in un doppio spazio.

        $content = str_replace(
            ['<br>', '</p>'],
            '  ',
            $this->{$this->getExcerptProperty()['propriety']},
        );

        return strip_tags($content);
    }

    protected function getExcerptProperty()
    {
        return [
            'propriety' => 'content',
            'length' => 60,
        ];
    }
}
