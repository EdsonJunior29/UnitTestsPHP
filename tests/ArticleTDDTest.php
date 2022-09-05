<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEmpty;

class ArticleTDDTest extends TestCase
{
    protected $article;

    protected function setUp(): void
    {
        $this->article = new ArticleTDD;
    }

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(), "");
    }

    public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->title = "An example article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugHasWhiteSpacesReplacedByUnderscores()
    {
        $this->article->title = "An     example   \n    article";

        $this->assertEquals($this->article->getSlug2(), "An_example_article");
    }

    public function testSlugDoesNotStartOrEndWithUnderscores()
    {
        $this->article->title = " An example article";

        $this->assertEquals($this->article->getSlug2(), "An_example_article");
    }

    public function testSlugDoesHaveAnyNonWordCharacters()
    {
        $this->article->title = "Read! This! Now!";

        $this->assertEquals($this->article->getSlug2(), "Read_This_Now");
    }

    /**Teste utilizando o dateProvider */

    public function titleProvider()
    {
        return [
            ["An example article ", "An_example_article"],
            ["An     example   \n    article ", "An_example_article"],
            [" An example article ", "An_example_article"],
            ["Read! This! Now! ", "Read_This_Now"],
        ];
    }

    /** @dataProvider titleProvider*/
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;

        $this->assertEquals($this->article->getSlug2(), $slug);
    }
}
