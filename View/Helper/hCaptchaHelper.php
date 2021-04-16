<?php
class hCaptchaHelper extends AppHelper {

    public $helpers = array('Form', 'Html');

    public function challenge($options = array())
    {
        // Add the javascript required to make the challenge interactive
        $this->Html->script('//hcaptcha.com/1/api.js', array('inline' => false));
        // Building the element's CSS class name
        $className = 'h-captcha'; // always included
        if (isset($options['className']) && !empty($options['className'])) {
            $className.= ' '.$options['className'];
        }
        // Unlocking the fields in case you have Form Tampering Prevention enabled
        $this->Form->unlockField('g-recaptcha-response');
        $this->Form->unlockField('h-captcha-response');
        // This div will hold the hCaptcha challenge
        return $this->Html->div($className, '&nbsp;', array(
            'data-sitekey' => Configure::read('hCaptcha.sitekey'),
        ));
    }

}