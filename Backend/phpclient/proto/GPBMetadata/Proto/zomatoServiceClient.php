<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// protoc proto/blog.proto --go_out=plugins=grpc:.
//
namespace Proto;

/**
 */
class zomatoServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Proto\RequestOne $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function getRes(\Proto\RequestOne $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/proto.zomatoService/getRes',
        $argument,
        ['\Proto\Restaurant', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Proto\RequestAll $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function getAllRes(\Proto\RequestAll $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/proto.zomatoService/getAllRes',
        $argument,
        ['\Proto\ResponseAllRes', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Proto\Restaurant $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function editRes(\Proto\Restaurant $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/proto.zomatoService/editRes',
        $argument,
        ['\Proto\Nresponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Proto\Restaurant $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function addRes(\Proto\Restaurant $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/proto.zomatoService/addRes',
        $argument,
        ['\Proto\Nresponse', 'decode'],
        $metadata, $options);
    }

}
