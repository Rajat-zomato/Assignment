<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: service.proto

namespace Proto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>proto.Restaurant</code>
 */
class Restaurant extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string Name = 1;</code>
     */
    private $Name = '';
    /**
     * Generated from protobuf field <code>float Rating = 2;</code>
     */
    private $Rating = 0.0;
    /**
     * Generated from protobuf field <code>string Cuisines = 3;</code>
     */
    private $Cuisines = '';
    /**
     * Generated from protobuf field <code>string Address = 4;</code>
     */
    private $Address = '';
    /**
     * Generated from protobuf field <code>int32 CFT = 5;</code>
     */
    private $CFT = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $Name
     *     @type float $Rating
     *     @type string $Cuisines
     *     @type string $Address
     *     @type int $CFT
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Service::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string Name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Generated from protobuf field <code>string Name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->Name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>float Rating = 2;</code>
     * @return float
     */
    public function getRating()
    {
        return $this->Rating;
    }

    /**
     * Generated from protobuf field <code>float Rating = 2;</code>
     * @param float $var
     * @return $this
     */
    public function setRating($var)
    {
        GPBUtil::checkFloat($var);
        $this->Rating = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string Cuisines = 3;</code>
     * @return string
     */
    public function getCuisines()
    {
        return $this->Cuisines;
    }

    /**
     * Generated from protobuf field <code>string Cuisines = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setCuisines($var)
    {
        GPBUtil::checkString($var, True);
        $this->Cuisines = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string Address = 4;</code>
     * @return string
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * Generated from protobuf field <code>string Address = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setAddress($var)
    {
        GPBUtil::checkString($var, True);
        $this->Address = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 CFT = 5;</code>
     * @return int
     */
    public function getCFT()
    {
        return $this->CFT;
    }

    /**
     * Generated from protobuf field <code>int32 CFT = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setCFT($var)
    {
        GPBUtil::checkInt32($var);
        $this->CFT = $var;

        return $this;
    }

}
