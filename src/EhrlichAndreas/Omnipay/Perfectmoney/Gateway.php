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
            'testMode' => true,
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

    public function getProjectId()
    {
        return $this->getParameter('projectId');
    }

    public function setProjectId($value)
    {
        return $this->setParameter('projectId', $value);
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\EhrlichAndreas\Omnipay\Sofort\Message\AuthorizeRequest', $parameters);
    }

    public function completeAuthorize(array $parameters = array())
    {
        return $this->createRequest('\EhrlichAndreas\Omnipay\Sofort\Message\CompleteAuthorizeRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->authorize($parameters);
    }
}
