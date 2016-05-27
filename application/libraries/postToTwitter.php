<?php

class postToTwitter extends post_data {

    public function send($status = '') {
        if ($status != '') {
            $config = $this->get_config('twitter');
            $url = $config['url_postStatusUpdate'];
            $postfields = array(
                'status' => $status
            );
            $requestMethod = 'POST';
            $twitter = new TwitterAPIExchange($config);
            $result = json_decode($twitter->buildOauth($url, $requestMethod)
                            ->setPostfields($postfields)
                            ->performRequest(), $assoc = TRUE);
            if (isset($result['id_str']) && $result['id_str'] != '') {
                echo '<h4>Successfully posted to Twitter</h4>';
            } else {
                echo'<h4>Something went wrong</h4>';
            }
        } else {
            echo "<h4>Status field is required</h4>";
        }
    }

}
?>