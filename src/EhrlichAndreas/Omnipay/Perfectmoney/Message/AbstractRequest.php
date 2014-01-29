<?php

namespace EhrlichAndreas\Omnipay\Sofort\Message;


abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $endpoint = 'https://perfectmoney.com/acct/';

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
        $httpResponse = $this->httpClient
            ->post($this->getEndpoint(), null, $this->getData()->asXML())
            ->setAuth($this->getUsername(), $this->getPassword())
            ->send();

        return $this->createResponse($httpResponse);
    }

    abstract protected function createResponse($httpResponse);

    protected function getEndpoint()
    {
        return $this->endpoint;
    }
}
