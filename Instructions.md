# Social Posting Application (Assesment Submission)
---
#### Description
This software is designed to post status on social networks. Currently a plain text can be posted on both Facebook and Twitter at once or you can select between them. 
#### File Structure
    socialPosting (folder)
    	|__ index.php (file)
    	|__ application (folder)
        		|__ config (folder)
        		|   	|__ config.php (file)
        		|__ core(folder)
        		|   	|__ post_data.php (file)
        		|__ libraries(folder)
        		|   	|__ postToFacebook.php (file)
        		|   	|__ postToTwitter.php (file)	
        		|__ thirdparty(folder)
        		    	|__ vendor (file)
        		    	|    	|__ ......
        		    	|__ composer.json (file)
        		    	|__ composer.lock (file)
All of the files are arranged in a way, that can be easily located and edited
    
  - Application folder
    -   Contain entire application except index.php file
  - Config folder
    - Configuration file is stored here. (A description on how to configure, is mentioned below)
  - Core folder
    - contain abstract classes
  - libraries folder
    -  put all the classes inherited from abstract classes located here
  - Thirdparty folder
    - this folder is allocated to add thirdpart libraries. You can easily add new library through composer. currently it has two packages. 

#### How to Set Up
There are only simple and few steps to complethe the Setup process
  - open config.php file
  - fill out secreats and ids (marked with "xxxxx") these two arrays with relevent data and put it ona a server
  
  
    $config['social']['facebook'] = array(
        'appId' => 'xxxxx',
        'secret' => 'xxxxx',
        'accessToken' =>'xxxxx',
        'facebookId' => 'xxxxx'
    );

    $config['social']['twitter'] = array(
        'oauth_access_token' => "xxxxx",
        'oauth_access_token_secret' => "xxxxx",
        'consumer_key' => "xxxxx",
        'consumer_secret' => "xxxxx",
        'url_postStatusUpdate' => 'https://api.twitter.com/1.1/statuses/update.json'
    );
  
#### How to Add new social network
if you need to add new social network, it is very simple (Assume yo need to add new network called 'Foo')

  - Create a new extended class of 'post_data' and put it in 'libraries' folder, Name it 'postToFoo.php'
  - Put the code in send function
  - configurations can be retrieved using '$this->get_config('foo');' and for that you need to put config data in config.php
  - configuration data can be put in config.php after creating new array (in this case $config['social']['foo']).
  - also file name should be added to the "$config['directory']['libraries']" configuration
  - if third party packages are needed put them in 'thirdparty/vendor' folder
  - no need to edit any exixting codes. you can see a new check box in the interface 
  
### Architectural designs 
Polymorphism is implemented
>  classes are created by extending an abstract class. So new social network can be added by creting new extended clss of above mensioned abstact class and putting it in to the. Also new abstract or interface class can be added to core folder

Auto loading classes
> all the files located in libraries and core folders can be automatically imported using config file. and third party packages are auto loaded.

Thirdparty libraries can be added
>Third part libraries can be added through composer in to thirdparty folder and dependancies are managed through composer 

Dependancy Injection
>there is no need to change socialPost class located in index.php, because objects of concrete classes that are created by extending core classes are automatically passed.
so no need to create objects and edit socialPost class.
And new combo boxes are created when you adding new social ntworks

Type hinting
>Tyep hinting is enabled for abstract classes for better improved error reporting 

Encapsulation
>protected and private functions are implemented for better controll over classes

