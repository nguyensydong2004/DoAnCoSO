<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OnlineCheckoutController extends CI_Controller
{

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function online_checkout()
    {
        $this->load->library('cart');
        $total =0;
        $subtotal= 0;
        foreach ($this->cart->contents() as $items){ 
            $subtotal = $items['qty']*$items['price'];
            $total += $subtotal;
        }
        if(isset($_POST['cod'])){
            $this->form_validation->set_rules('email', 'Email', 'trim|required',['required' => 'You must provide a %s.']);
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required',['required' => 'You must provide a %s.']);
            $this->form_validation->set_rules('name', 'Name', 'trim|required',['required' => 'You must provide a %s.']);
            $this->form_validation->set_rules('address', 'Address', 'trim|required',['required' => 'You must provide a %s.']);
            if ($this->form_validation->run() == TRUE)
            {
                $email = $this->input->post('email');
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                //$shipping_method= $this->input->post('shipping_method');	
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'method' => 'cod',

                );
                $this->load->model('LoginModel');
                

                $result = $this->LoginModel->NewShipping($data);
                if($result)
                {
                    $order_code = rand(00,9999);
                    $data_order = array(
                        'order_code' => $order_code,
                        'ship_id' => $result,
                        'status' => 1,
                    );
                    $insert_order = $this->LoginModel->insert_order($data_order);
                    foreach($this->cart->contents() as $items){
                        $data_order_details = array(
                            'order_code' => $order_code,
                            'product_id' => $items['id'],
                            'quantity' => $items['qty'],
                        );
                        $insert_order_details = $this->LoginModel->insert_order_details($data_order_details);
                    }
                    $this->session->set_flashdata('success', 'Xác nhận đơn hàng thành công');
                    $this->cart->destroy();
                    redirect(base_url('/thanks'));
            
                }else{
                    $this->session->set_flashdata('error', 'Xác nhận đơn hàng thất bại');
                    redirect(base_url('/checkout'));
                }

            }else{
                redirect(base_url('/checkout'));
            }
        }elseif(isset($_POST['payUrl'])){
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

            $orderInfo = "Thanh toán qua MoMo";
            $amount = $total;
            $orderId = rand(00,9999);
            $redirectUrl = "http://localhost:8000/thanks";
            $ipnUrl = "http://localhost:8000/thanks";
            $extraData = "";

                $partnerCode = $partnerCode;
                $accessKey = $accessKey;
                $serectkey = $secretKey;
                $orderId = $orderId; // Mã đơn hàng
                $orderInfo = $orderInfo;
                $amount = $amount;
                $ipnUrl = $ipnUrl;
                $redirectUrl = $redirectUrl;
                $extraData = $extraData;

                $requestId = time() . "";
                $requestType = "payWithATM";
                // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $serectkey);
                $data = array('partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature);
                $result = $this->execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);  // decode json
                header('Location: ' . $jsonResult['payUrl']);
        }
    }

}