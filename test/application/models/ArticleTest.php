<?php
require_once ('PHPUnit/Framework/TestCase.php');
class ArticleTest extends PHPUnit_Framework_TestCase
{
    public function setUp ()
    {
        parent::setUp();
    }
    public function tearDown ()
    {
        parent::tearDown();
    }

    /**
     * when no param is provided to constructor $_id has to be null
     */
    public function testConstructArticleWithNoId()
    {
        $article = new Article();
        $this->assertAttributeEquals(null,'_id',$article);
    }

    /**
     * When param to constructor is provided private property $_id has to be set to that value
     */
    public function testConstructWithIdSetsPrivateIdProperty()
    {
        $article = new Article(1);
        $this->assertAttributeEquals(1,'_id',$article);
    }

    public function testGetIdReturnsId()
    {
        $article = new Article(1);
        $this->assertEquals(1,$article->getId());
    }

    public function testSetIdMethodWithLegalParam()
    {
        $article = new Article();
        $article->setId(1);
        $this->assertAttributeEquals(1,'_id',$article);
    }

    /**
     * When string is passed to setId it throws InvalidArgumetException
     *
     * @expectedException InvalidArgumentException
     */
    public function testSetIdWithParamIsString()
    {
        $article = new Article();
        $article->setId('lala');
    }

    public function testGetResourceId()
    {
        $article = new Article();
        $this->assertEquals('Article',$article->getResourceId());
    }


}
