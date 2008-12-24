<?php
/**
 * Class representing article
 *
 */
class Article
{
    /**
     * Article ID
     *
     * @var int
     */
    private $_id;

    /**
     * Author ID
     *
     * @var unknown_type
     */
    private $_authorId;

    /**
     * constructor
     *
     * @param int $id
     */


    public function __construct ($id = null)
    {
        $this->_id = $id;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        if ($id < 1 || !is_int($id)) {
            throw new InvalidArgumentException();
        }
        $this->_id = $id;
    }
}
