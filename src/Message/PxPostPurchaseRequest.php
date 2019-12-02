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

    /** 
     * Get the PxPost MerchantReference
     *
     * Optional string value to allow merchant to attach their own reference
     * to the transaction.
     *
     * @return mixed
     */
    public function getMerchantReference()
    {   
        if (is_null($this->getParameter('merchantReference')))
          return false;

        return $this->getParameter('merchantReference');
    }   

    /** 
     * Set the PxPost MerchantReference
     *
     * @param bool $value
     * @return $this
     */
    public function setMerchantReference($value)
    {   
        return $this->setParameter('merchantReference', $value);
    }   

    public function getData()
    {
        $data = parent::getData();

        $data->EnableAddBillCard = ($this->getEnableAddBillCard()) ? 1 : 0;

        if ($this->getMerchantReference())
          $data->MerchantReference = $this->getMerchantReference();

        return $data;
    }

}
