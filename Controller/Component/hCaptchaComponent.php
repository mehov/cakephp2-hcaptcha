<?php

App::uses('HttpSocket', 'Network/Http');

class hCaptchaComponent extends Component {

    public function __construct($collection, $settings = array())
    {
        parent::__construct($collection, $settings);
        // Load this plugin's configuration into the running application
        Configure::load('hCaptcha.config' , 'default' , false); 
    }

    public function verify($data)
    {
        if (!isset($data['h-captcha-response']) || empty($data['h-captcha-response'])) {
            return false;
        }
        $HttpSocket = new HttpSocket();
        $result = $HttpSocket->post('https://hcaptcha.com/siteverify', array(
            'response' => $data['h-captcha-response'],
            'secret' => Configure::read('hCaptcha.secret'),
        ));
        if ($result->headers['Content-Type']!=='application/json') {
            return false;
        }
        $json = json_decode($result->body);
        return $json->success;
    }

}