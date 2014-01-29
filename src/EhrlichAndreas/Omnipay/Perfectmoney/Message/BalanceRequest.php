<?php

namespace EhrlichAndreas\Omnipay\Perfectmoney\Message;

/**
 * PayPal Capture Request
 */
class BalanceRequest extends AbstractRequest
{
    
    protected $endpointBalance = 'https://perfectmoney.is/acct/balance.asp';


    public function __construct(\Guzzle\Http\ClientInterface $httpClient, \Symfony\Component\HttpFoundation\Request $httpRequest)
    {
        parent::__construct($httpClient, $httpRequest);
        
        $endpoint = $this->endpointBalance;
        
        $this->setEndpoint($endpoint);
    }
    
    public function getData()
    {
        $data = $this->getBaseData('DoBalance');

        return $data;
    }

    /**
     * 
     * @param type $httpResponse
     * @return BalanceResponse
     */
    protected function createResponse($httpResponse)
    {
        return $this->response = new BalanceResponse($this, $httpResponse);
    }

    /**
     * 
     * @return BalanceResponse
     */
    public function send()
    {
        return parent::send();
    }
}
