<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PhonePeController extends CI_Controller 
{
    private $merchant_id = 'PGTESTPAYUAT';
    private $salt_key = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
    private $salt_index = 1;

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    public function index()
	 {
        $this->load->view('payment_form');
    }

    public function createPayment() {
        $amount = $this->input->post('amount') * 100; 
        $order_id = $this->input->post('order_id');

        $payload = array(
							"merchantId" => $this->merchant_id,
							"merchantTransactionId" => $order_id,
							"merchantUserId" => "USER_123",
							"amount" => $amount,
							"redirectUrl" => base_url('phonePeController/paymentResponse'),
							"redirectMode" => "POST",
							"callbackUrl" => base_url('phonePeController/paymentResponse'),
							"mobileNumber" => "9999999999",
							"paymentInstrument" => ["type" => "PAY_PAGE"]
						);

        $encoded_payload = base64_encode(json_encode($payload));
        $checksum = hash('sha256', $encoded_payload . '/pg/v1/pay' . $this->salt_key) . '###' . $this->salt_index;

        $ch = curl_init('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(["request" => $encoded_payload, "checksum" => $checksum]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl Error: ' . curl_error($ch);
        }

        curl_close($ch);

        $response_data = json_decode($response, true);

        if ($response_data['code'] == 'PAYMENT_INITIATED') {
            redirect($response_data['data']['instrumentResponse']['redirectInfo']['url']);
        } else {
            echo "Payment Failed: " . $response_data['message'];
        }
    }

    public function paymentResponse() {
        $response = json_decode(file_get_contents('php://input'), true);
        $encoded_response = $response['response'];
        $checksum = $response['checksum'];

        $generated_checksum = hash('sha256', $encoded_response . $this->salt_key) . '###' . $this->salt_index;
        if ($generated_checksum !== $checksum) die("Checksum Mismatch!");

        $decoded_response = json_decode(base64_decode($encoded_response), true);

        if ($decoded_response['code'] === 'PAYMENT_SUCCESS') {
            echo "Payment Successful! Transaction ID: " . $decoded_response['transactionId'];
        } else {
            echo "Payment Failed: " . $decoded_response['message'];
        }
    }
} 