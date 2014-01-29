<?php

namespace EhrlichAndreas\Omnipay\Perfectmoney\Message;

use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;

class BalanceResponse extends Response implements RedirectResponseInterface
{
    protected $balance = array();
    
    protected $isSuccessful = false;
    
    public function __construct(RequestInterface $request, $response)
    {
        parent::__construct($request, $response);
        

        $body = $response->getBody(true);
        
        
        $pattern = '#\<input\s+name\s*\=\s*[\'"](\w+)[\'"].*value\s*\=\s*[\'"]([-+]?(?:\d+|\d*\.\d+))[\'"]\/?\>#ui';
        
        $matches = array();
        
        $matching = preg_match_all($pattern, $body, $matches);
        
        
        if ($matching)
        {
            $balance = array();
        
            foreach ($matches[1] as $key => $account)
            {
                $value = $matches[2][$key];
                
                
                $currency = '';
                
                $substr = substr($account, 0, 1);
                
                $substr = mb_strtolower($substr, 'UTF-8');
                
                
                switch ($substr)
                {
                    case 'u':
                        $currency = 'USD';

                        break;
                    
                    case 'e':
                        $currency = 'EUR';

                        break;
                    
                    case 'g':
                        $currency = 'XAU';

                        break;

                    default:
                        break;
                }
                
                
                $balance[$currency] = array
                (
                    'currency'  => $currency,
                    'account'   => $account,
                    'balance'   => $value,
                );
            }
        
            $this->balance = $balance;
            
            $this->isSuccessful = true;
        }
        else
        {
            $this->isSuccessful = false;
        }
    }

    public function isSuccessful()
    {
        return $this->isSuccessful;
    }
    
    /**
     * 
     * @return array
     */
    public function getBalance()
    {
        return $this->balance;
    }
}
