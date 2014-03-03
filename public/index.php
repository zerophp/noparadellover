<?php 

//echo `format c:`;

//die;
// session_start();
// echo session_id();
// echo "<br/>";
// // session_regenerate_id();

// echo session_id();

// // echo "<pre>";
// // print_r($_SERVER);
// // echo "</pre>";
// echo "<br/>";
// $seed='1234';
// echo md5(session_id().$seed);
/**
 * <form method="post" action="procesar.php">
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<input type="hidden" value="echo(md5(" name="name"/>
name: <input type="text" name="name"/>
<br/>
password: <input type="text" name="password"/>
<input type="submit" name="enviar" value="ok"/>
</form>
 */

/**
 * CURL WITH POST
 */
/*
 http://davidwalsh.name/curl-post
 
 //extract data from the post
extract($_POST);

//set POST variables
$url = 'http://domain.com/get-post.php';
$fields = array(
						'lname' => urlencode($last_name),
						'fname' => urlencode($first_name),
						'title' => urlencode($title),
						'company' => urlencode($institution),
						'age' => urlencode($age),
						'email' => urlencode($email),
						'phone' => urlencode($phone)
				);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);


 */
/*
 * <form name="formContacto" class="formContacto" 
method="post" action="http://webartemur.org/admin/control.php">
                    
                    	<label>Usuario:</label>
                        <input type="text" class="txtForm" name="usuario"  />
                        
                        <label>Contraseña:</label>
                        <input type="password" class="txtForm" name="contrasena"  />
                        
                        <input type="submit" class="btnEnviar" value="Enviar"  />
                    
                    </form>
                    
 */
?>
                    
<?php

$configfile = '../application/configs/settings.ini';

include ('../application/autoload.php');


$app = new frontcontroller($configfile);


