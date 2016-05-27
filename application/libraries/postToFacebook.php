<?php

class postToFacebook extends post_data {

    public function send($status = '') {
        if ($status != '') {
            $config = $this->get_config('facebook');
            $config['fileUpload'] = false;
            $fb = new Facebook($config);
            $params = array(
                "access_token" => $config['accessToken'],
                "message" => $status,
                "link" => "",
                "picture" => "",
                "name" => "",
                "caption" => "",
                "description" => ""
            );
            try {
                $ret = $fb->api("/" . $config['facebookId'] . "/feed", 'POST', $params);
                echo '<h4>Successfully posted to Facebook</h4>';
            } catch (Exception $e) {
                echo '<h4>'.$e->getMessage().'</h4>';
            }
        } else {
            echo "<h4>Status field is required</h4>";
        }
    }

}

?>
