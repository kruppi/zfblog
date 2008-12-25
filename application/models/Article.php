<?php
/**
 * Class representing article
 *
 */
class Article implements Zend_Acl_Resource_Interface
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
     * @var int
     */
    private $_authorId;

    /**
     * Date created
     *
     * @var Zend_Date
     */
    private $_created;

    /**
     * Heading of article
     *
     * @var string
     */
    private $_heading = '';

    /**
     * Perex of article
     *
     * @var string
     */
    private $_perex = '';

    /**
     * Body of article
     *
     * @var string
     */
    private $_text = '';

    /**
     * Date of last modification
     *
     * @var Zend_Date
     */
    private $_lastModified;

    /**
     * Id of last modifier
     *
     * @var int
     */
    private $_lastMOdifiedBy;

    /**
     * constructor
     *
     * @param int $id
     */
    public function __construct ($id = null)
    {
        $this->_id = $id;

        if (null === $id) {

        } else {

        }
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

    public function getResourceId()
    {
        return get_class($this);
    }
}
