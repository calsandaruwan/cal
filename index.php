<?php
include_once 'application/config/config.php';
class socialPost {

    private $_obj_post_data;

    public function __construct(post_data $obj) {
        $this->_obj_post_data = $obj;
    }

    public function post($status) {
        $this->_obj_post_data->send($status);
    }

}
if(isset($_POST['submit'])){
    $post = $_POST['post'];
    if(isset($post['network'])){
        foreach ($post['network'] as $network){
            $obj_social = new socialPost(new $network);
            $obj_social->post($post['status']);
        }
    }else{
        echo '<h4>Please select atleast one social network to post your status</h4>';
    }
    
}
?>
<html>
	<head>
		<title>Social Posting</title>
                <style type="text/css">
                    h4{
                        margin-bottom: 5px;
                    }
                    table{
                        padding-top: 30px;
                    }
                    td{
                        padding-right: 40px;
                        vertical-align: top;
                    }
                    
                </style>
	</head>
	<body>
		<div>
			<form method="post">
				<table cellpadding="0">
					<tr>
						<td>Status</td>
						<td><textarea name="post[status]"></textarea></td>
					</tr>
					<tr>
						<td>Network</td>
						<td>
                                                    <?php foreach($GLOBALS['config']['directory']['libraries'] as $key=>$val){?>
                                                    <input type="checkbox" name="post[network][]" value='<?= $val; ?>'> <?= $key; ?><br>
                                                    <?php } ?>
                                                </td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" value='submit'></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>