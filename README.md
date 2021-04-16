Configuring the plugin
====

1. Create the Config/config.php based on Config/config.example.php
2. Add your sitekey and secret to Config/config.php

Loading the plugin
====

1. Load via adding `CakePlugin::load('hCaptcha');` to your app/Config/bootstrap.php
2. In a controller displaying the challenge, `public $helpers = array('hCaptcha.hCaptcha');`
3. In a controller verifying the challenge, `public $components = array('hCaptcha.hCaptcha');`

Using the plugin
====

1. Inside a $this->Form in your view template, use `echo $this->hCaptcha->challenge();`
2. In the controller receiving the request from the above form, call `$this->hCaptcha->verify($this->request->data)`
3. Show an error or throw an exception based on the `verify()` result