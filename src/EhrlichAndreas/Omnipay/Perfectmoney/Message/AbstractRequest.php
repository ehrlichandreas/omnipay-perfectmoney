<?php

namespace EhrlichAndreas\Omnipay\Perfectmoney\Message;


abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $endpoint = 'https://perfectmoney.com/acct/';

    abstract public function getData();

    protected function getBaseData($method)
    {
        $data = array
        (
            'AccountID'     => $this->getUsername(),
            'PassPhrase'    => $this->getPassword(),
        );

        return $data;
    }

    public function getUsername()
    {
        return $this->getParameter('username');
    }

    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function send()
    {
        $data = $this->getData();
        
        $endpoint = $this->getEndpoint();
        
        $httpRequest = $this->httpClient->post($endpoint, null, $data);
        
        $httpResponse = $httpRequest->send();

        return $this->createResponse($httpResponse);
    }

    abstract protected function createResponse($httpResponse);

    protected function getEndpoint()
    {
        return $this->endpoint;
    }

    protected function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }
}
