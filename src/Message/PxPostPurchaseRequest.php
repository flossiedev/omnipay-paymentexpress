<?php

namespace Omnipay\PaymentExpress\Message;

/**
 * PaymentExpress PxPost Purchase Request
 */
class PxPostPurchaseRequest extends PxPostAuthorizeRequest
{
    protected $action = 'Purchase';

    /** 
     * Get the PxPost EnableAddBillCard
     *
     * Optional boolean value to enable the creation of a repeat billing token
     * when purchasing.
     *
     * @return mixed
     */
    public function getEnableAddBillCard()
    {   
        if (is_null($this->getParameter('enableAddBillCard')))
          return false;

        return $this->getParameter('enableAddBillCard');
    }   

    /** 
     * Set the PxPost EnableAddBillCard
     *
     * @param bool $value
     * @return $this
     */
    public function setEnableAddBillCard($value)
    {   
        return $this->setParameter('enableAddBillCard', $value);
    }   

    public function getData()
    {
        $data = parent::getData();

        $data->EnableAddBillCard = ($this->getEnableAddBillCard()) ? 1 : 0;

        return $data;
    }

}
