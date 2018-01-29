<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
//use Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */

/**
 * Class Expert
 * @property Expert_model $Expert
 */
class ApiTest extends REST_Controller{
    public $is_hookable = FALSE;
    function __construct(){
        echo "herere";exit;
        // Construct the parent class
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
  


    /**
    * Name : AddMoneyToWallet
    * purpose : To add the money to the wallet
    */
    public function AddMoneyToWallet_get()
    {
        echo "Hello";exit;
        $lawyerId = $this->input->post('la_id');
        $addedMoney = $this->input->post('added_amount');
        $wallet = $this->Expert->GetExpertsWalletDetails();
        $walletAmount = $wallet['wallet_amount'];
        $walletBalance = $walletAmount + $addedMoney;
        $result = $this->Expert->updateWallet($walletBalance, $lawyerId);
        if ($result == true) {
            $this->response(
                [
                    'status' => "0",
                    'data' => [],
                    'message' => 'Wallet updated successfully',
                ], 
                REST_Controller::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => "-1",
                    'data' => [],
                    'message' => 'Wallet failed to update',
                ], 
                REST_Controller::HTTP_OK
            );
        }
    }
}
