<?php

namespace Response;

class Admin extends \Sophia\Controller
{
    function __construct()
    {
        $this->Admin = $this->model('Admin');
    }
    function login()
    {
        $this->Admin->set([
            ['username', 'clean'],
            ['password', 'md50']
        ]);
        $this->json(
            $this->Admin->login()
        );
    }
    function orders($page = 1)
    {
        $this->Admin->set([
            'search',
            ['status', 'ints']
        ]);
        $this->json(
            $this->Admin->orders($page),
            true
        );
    }
    function categories($page = 1)
    {
        $this->Admin->set([
            'search',
        ]);
        $this->json(
            $this->Admin->categories($page),
            true
        );
    }
    function categories_list()
    {
        $this->json(
            $this->Admin->categories_list(),
            true
        );
    }
    function products($page = 1)
    {
        $this->Admin->set([
            'search',
            ['status', 'ints']
        ]);
        $this->json(
            $this->Admin->products($page),
            true
        );
    }
    function customers($page = 1)
    {
        $this->Admin->set([
            'search',
            'country'
        ]);
        $this->json(
            $this->Admin->customers($page),
            true
        );
    }
    function create_category()
    {
        $this->Admin->set([
            'name',
            'description',
            ['status', 'ints']
        ]);
        $this->json(
            $this->Admin->create_category()
        );
    }
    function edit_category()
    {
        $this->Admin->set([
            'name',
            'description',
            ['status', 'ints'],
            ['ID', 'ints'],
        ]);
        $this->json(
            $this->Admin->edit_category()
        );
    }
    function delete_category()
    {
        $this->Admin->set([
            ['ID', 'ints']
        ]);
        $this->json(
            $this->Admin->delete_category()
        );
    }
    function delete_product()
    {
        $this->Admin->set([
            ['ID', 'ints']
        ]);
        $this->json(
            $this->Admin->delete_product()
        );
    }
    function post_note()
    {
        $this->Admin->set([
            ['ID', 'ints'],
            'note'
        ]);
        $this->json(
            $this->Admin->post_note()
        );
    }
    function customer_add_note()
    {
        $this->Admin->set([
            ['ID', 'ints'],
            'note'
        ]);
        $this->json(
            $this->Admin->customer_add_note()
        );
    }
    function customer_update_address()
    {
        $this->Admin->set([
            ['ID', 'ints'],
            ['zip', 'ints'],
            'firstname',
            'lastname',
            'street',
            'city',
            'country'
        ]);
        $this->json(
            $this->Admin->customer_update_address()
        );
    }

    function customer_update_contact()
    {
        $this->Admin->set([
            ['ID', 'ints'],
            ['update', 'ints'],
            'email', 'phone'
        ]);
        $this->json(
            $this->Admin->customer_update_contact()
        );
    }
    function updateContact()
    {
        $this->Admin->set([
            ['ID', 'ints'],
            ['update', 'ints'],
            'email', 'phone'
        ]);
        $this->json(
            $this->Admin->updateContact()
        );
    }
    function updateAddress()
    {
        $this->Admin->set([
            ['ID', 'ints'],
            ['zip', 'ints'],
            'firstname',
            'lastname',
            'street',
            'city',
            'country'
        ]);
        $this->json(
            $this->Admin->updateAddress()
        );
    }

    function order_sent()
    {
        $this->Admin->set([
            'tracking',
            'delivery',
            ['order', 'ints'],
            ['email', 'ints']
        ]);
        $this->json(
            $this->Admin->order_sent()
        );
    }
    function order_return()
    {
        $this->Admin->set([
            ['order', 'ints'],
            ['email', 'ints']
        ]);
        $this->json(
            $this->Admin->order_return()
        );
    }
    function sendReview(){
        $this->Admin->set([
            ['status', 'ints'],
            ['id', 'ints']
        ]);
        $this->json(
            $this->Admin->sendReview()
        );
    }
    function addPromoCode(){
        $this->Admin->set([
            ['code', 'clean'],
            ['discount', 'ints'],
            ['type', 'ints']
        ]);
        
        $this->json(
            $this->Admin->addPromoCode()
        );
    }
    function updatePromoCode(){
        $this->Admin->set([
            ['code', 'clean'],
            ['enable', 'ints']
        ]);
        $this->json(
            $this->Admin->updatePromoCode()
        );
    }
    function new_product()
    {
        $this->Admin->setArr(['img_url', 'quantity_discount_num', 'quantity_discount_price']);
        $this->Admin->setFiles(['media']);
        $this->Admin->set([
            'name',
            'description',
            ['selling_price', 'int'],
            ['compare_price', 'int'],
            ['purchase_price', 'int'],
            ['sku', 'ints'],
            'barcode',
            ['inventory', 'ints'],
            ['track_inventory', 'ints'],
            ['sell_out_of_stock', 'ints'],
            ['physical_product', 'ints'],
            ['variants', 'ints'],
            ['status', 'ints'],
            ['quantity_discount', 'ints'],
            ['weight', 'int'],
            'type',
            'vendor',
            ['category', 'ints'],
            'tags',
            'seo_title',
            'seo_keywords',
            'seo_description',
        ]);
        $this->json(
            $this->Admin->new_product()
        );
    }
    function edit_product()
    {
        $this->Admin->setArr(['img_url', 'quantity_discount_num', 'quantity_discount_price', 'delete_image', 'collapse_name', 'collapse_description', 'package_name', 'package_price']);
        $this->Admin->setFiles(['media']);
        $this->Admin->set([
            'name',
            'description',
            ['selling_price', 'int'],
            ['compare_price', 'int'],
            ['purchase_price', 'int'],
            ['sku', 'ints'],
            ['product_id', 'ints'],
            'barcode',
            ['inventory', 'ints'],
            ['track_inventory', 'ints'],
            ['sell_out_of_stock', 'ints'],
            ['physical_product', 'ints'],
            ['variants', 'ints'],
            ['status', 'ints'],
            ['quantity_discount', 'ints'],
            ['weight', 'int'],
            'type',
            'vendor',
            ['category', 'ints'],
            ['main_image', 'ints'],
            'tags',
            'seo_title',
            'seo_keywords',
            'seo_description',
        ]);
        $this->json(
            $this->Admin->edit_product()
        );
    }
    function update_popup_settings()
    {
        // Field handling moved to Admin model's update_popup_settings()
        // to properly handle HTML fields vs regular fields
        $this->json(
            $this->Admin->update_popup_settings()
        );
    }
}
