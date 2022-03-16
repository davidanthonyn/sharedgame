<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CartController extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        /*if (empty($this->session->userdata('admin'))) {
            redirect('auth');
        }*/
    }
    public function addToCart()
    {
        $product_id = $this->ibput->post('id');
        $product = $this->ProductsModel->get($producr_id);

        $qty = 1;

        if($this->input->post('qty'))
        {
            $qty = $this->input->post('qty');
        }

        $product_display_img = "";
        $image = $product->cover_image;

        if($image)
        {
            $product_display_img = $image->path;
        }

        $data = array(
            'id' => $product_id,
            'qty' => $qty,
            'price' => $product->price,
            'name' => $product->name,
            'options' => array('product_image' => $product_display_img)
        );
    $status = $this->cart->insert($data);
    if($status)
    {
        $this->session->set_flashdata('success','Produk Berhasil Ditambahkan');   
    }else{
        $this->session->set_flashdata('error','Produk Gagal Ditambah');
    }

    redirect($_SERVER['HTTP_REFERER']);
    exit;
    }
}  
;?>