<?php

namespace Response;

class Shop extends \Sophia\Controller
{
    function __construct()
    {
        $this->Shop = $this->model('Shop');
    }
    function cart()
    {
        $this->json(
            $this->Shop->cart(),
            true
        );
    }
    function add()
    {
        $this->Shop->set([
            ['product', 'ints'],
            ['package', 'ints'],
            ['quantity', 'ints']
        ]);
        $this->json(
            $this->Shop->add(),
            true
        );
    }
    function change()
    {
        $this->Shop->set([
            ['product', 'ints'],
            ['package', 'ints'],
            ['quantity', 'ints']
        ]);
        $this->json(
            $this->Shop->change(),
            true
        );
    }
    function changeShippingCost()
    {
        $this->Shop->set([
            ['shippingCost', 'ints']
        ]);
        $this->json(
            $this->Shop->changeShippingCost()
        );
    }
    function check_discount_code()
    {
        $this->Shop->set([
            ['code', 'clean']
        ]);
        $this->json(
            $this->Shop->check_discount_code()
        );
    }
    function remove()
    {
        $this->Shop->set([
            ['remove', 'ints']
        ]);
        $this->json(
            $this->Shop->remove(),
            true
        );
    }
    function checkout()
    {
        $this->Shop->set([
            'firstname',
            'lastname',
            'country',
            'city',
            'state',
            'street',
            'apartment',
            'zip',
            'phone',
            // ['zip', 'ints'],
            // ['phone', 'ints'],
            // ['currency', 'clean'],
            'email',
            'note',
        ]);
        $this->json(
            $this->Shop->checkout()
        );
    }
    function sms_confirm()
    {
        $this->Shop->set([
            ['code', 'ints'],
            ['token', 'clean'],
        ]);
        $this->json(
            $this->Shop->sms_confirm()
        );
    }
    function zelle_pay()
    {
        $this->Shop->set([
            ['order', 'ints']
        ]);
        $this->json(
            $this->Shop->zelle_pay()
        );
    }
    function crypto_pay()
    {
        $this->Shop->set([
            ['order', 'ints'],
            ['currency', 'clean']
        ]);
        $this->json(
            $this->Shop->crypto_pay()
        );
    }
    function contact()
    {
        $this->Shop->set([
            ['email', 'isEmail'],
            'name',
            'message',
            'subject'
        ]);
        $this->json(
            $this->Shop->contact()
        );
    }
    function postReview()
    {
        $this->Shop->set([
            ['email', 'isEmail'],
            ['stars', 'ints'],
            ['product', 'ints'],
            'customer',
            'title',
            'review'
        ]);
        $this->json(
            $this->Shop->postReview()
        );
    }


    public function payment()
    {
        $this->Shop->set([
            'stripeToken',
            'name',
            'email',
            'order'
        ]);
        $this->json(
            $this->Shop->payment()
        );
    }
    function subscribe()
    {
        $this->Shop->set([
            ['email', 'isEmail']
        ]);
        $this->json(
            $this->Shop->subscribe()
        );
    }
}
