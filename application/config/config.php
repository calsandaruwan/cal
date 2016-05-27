<?php

/*
 * ----------CONFIG.PHP---------
 * -----------------------------
 * This is the main configuration file.
 * All the keys and secret ketys can be stored here.  
 */


/*
 * $config['social']
 * -----------------------------
 * This configuration store data related with each social network.
 * For each socil network please create new associative array with the key of social network name
 * In that array you can keep any number of configurations related with that social network  
 * eg - creating new array keys
 *      $config['social']['facebook']=array('key'=>'value',......)
 *      $config['social']['googleplus']=array('key'=>'value',......)
 *      
 */
$config['social']['facebook'] = array(
    'appId' => '',
    'secret' => '',
    'accessToken' => '',
    'facebookId' => ''
);
$config['social']['twitter'] = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => "",
    'url_postStatusUpdate' => 'https://api.twitter.com/1.1/statuses/update.json'
);

/*
 * $config['directory']
 * -----------------------------
 * 'core' array store data related with each file located in application/core folder.
 * in core directory you can place abstract classes and interfaces
 * 'library' array store data related with each file located in application/library folder.
 * in library directory you can place concrete class files that extends abstract classes and files that implements interfaces 
 * Please mention file names correctly
 * Here you can keep any number of libraries       
 */
$config['directory']['core'] = array('post_data');
$config['directory']['libraries'] = array('Twitter'=>'postToTwitter', 'Facebook'=>'postToFacebook');

/*
 * $config['composer']
 * -----------------------------
 * Path to autoload file located at vendor folder   
 */
$config['composer']= 'application/thirdparty/vendor/autoload.php';


/*
 * $config['basePath']
 * -----------------------------
 * Path to application root
 *      
 */
$config['path']['basePath'] = $_SERVER['HTTP_HOST'];
$config['path']['scheme'] = $_SERVER['REQUEST_SCHEME'];
$config['path']['current'] = $_SERVER['REQUEST_URI'];

$GLOBALS['config']=$config;

foreach($config['directory'] as $dir_key=>$dir_content){
    if(is_array($dir_content)){
        foreach($dir_content as $file_key=>$file_name){
            require_once 'application/'.$dir_key.'/'.$file_name.'.php';
        }
    }
}
require_once $config['composer'];
?>