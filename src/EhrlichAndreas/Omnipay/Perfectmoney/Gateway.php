<?php

namespace EhrlichAndreas\Omnipay\Perfectmoney;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Perfectmoney';
    }

    public function getDefaultParameters()
    {
        return array
        (
            'username' => '',
            'password' => '',
        );
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

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\EhrlichAndreas\Omnipay\Perfectmoney\Message\AuthorizeRequest', $parameters);
    }

    public function completeAuthorize(array $parameters = array())
    {
        return $this->createRequest('\EhrlichAndreas\Omnipay\Perfectmoney\Message\CompleteAuthorizeRequest', $parameters);
    }

    /**
     * 
     * @param array $parameters
     * @return \EhrlichAndreas\Omnipay\Perfectmoney\Message\BalanceRequest
     */
    public function balance(array $parameters = array())
    {
        $parametersTmp = $this->getParameters();
        
        $parameters = array_merge($parametersTmp, $parameters);
        
        return $this->createRequest('\EhrlichAndreas\Omnipay\Perfectmoney\Message\BalanceRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->authorize($parameters);
    }
}
