<?php

class ArticleTDD
{
    public $title;

    public function getSlug()
    {
        $slug = $this->title;

        $slug = str_replace(' ', '_', $slug);

        return $slug;
    }

    public function getSlug2()
    {
        $slug = $this->title;

        $slug = preg_replace('/\s+/', '_', $slug);

        $slug = preg_replace('/[^\w]+/', '', $slug);

        $slug = trim($slug, '_');

        //retira espaço em branco no final da string
        $slug = rtrim($slug);

        return $slug;
    }
}
