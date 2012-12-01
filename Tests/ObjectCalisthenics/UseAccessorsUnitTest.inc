<?php
/**
 * Use Accessors Sniff
 */
class UseAccessorsSniffTest
{
    var $a;
    public $b;
    protected $c;
    private $d;

    /**
     * Getter
     *
     * @return mixed
     */
    public function getD()
    {
        return $this->d;
    }

    /**
     * Setter
     *
     * @param mixed $d
     */
    public function setD($d)
    {
        $this->d = $d;
    }

    /**
     * Invalid getter
     *
     * @return mixed
     */
    public function getObject()
    {
        $obj = new StdClass;

        return $obj;
    }

    /**
     * Invalid setter
     *
     * @param mixed $object
     */
    public function setObject($object)
    {
        $object->enabled = true;
    }

    /**
     * Invalid setter
     */
    public function setDisabled()
    {
        $this->enabled = false;
    }

    /**
     * Invalid adder
     *
     * @param mixed $object
     */
    public function addObjectList($object)
    {
        $this->list[] = $object;
    }

    /**
     * Invalid setter
     *
     * @param mixed $object
     */
    public function setXAndY($object)
    {
        $this->object = $object;
        $this->enabled = false;
    }

    /**
     * Ignore this method
     */
    public function execute()
    {
        echo 'Hello world';
    }
}
