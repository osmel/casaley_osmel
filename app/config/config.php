<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/
|
| If this is not set then CodeIgniter will guess the protocol, domain and
| path to your installation.
  Colocamos la url o dominio
*/
#$config['base_url']	='http://107.170.44.215/'; // 'http://45.55.85.45';
#$config['base_url']	='http://promoscasaley.com.mx/'; // 'http://45.55.85.45';
$config['base_url']	='casaley.com.dev/'; 
/*
|--------------------------------------------------------------------------
| Index File
|--------------------------------------------------------------------------
|
| Typically this will be your index.php file, unless you've renamed it to
| something else. If you are using mod_rewrite to remove the page set this
| variable so that it is blank.
|
este archivo es normalmente el root index.php
se elimina cuando utilizas el .htaccess
*/
$config['index_page'] = '';  //'index.php';
/*
|--------------------------------------------------------------------------
| URI PROTOCOL
|--------------------------------------------------------------------------
|
| This item determines which server global should be used to retrieve the
| URI string.  The default setting of 'AUTO' works for most servers.
| If your links do not seem to work, try one of the other delicious flavors:
|
| 'AUTO'			Default - auto detects
| 'PATH_INFO'		Uses the PATH_INFO
| 'QUERY_STRING'	Uses the QUERY_STRING
| 'REQUEST_URI'		Uses the REQUEST_URI
| 'ORIG_PATH_INFO'	Uses the ORIG_PATH_INFO
 
 se encarga de decirle a codeigniter con que servidor
 global se va a trabajar en este caso lo dejamos
 AUTO ya que en la mayoria de servidores funciona.
*/
$config['uri_protocol']	= 'AUTO';  //'REQUEST_URI';
/*
|--------------------------------------------------------------------------
| URL suffix
|--------------------------------------------------------------------------
|
| This option allows you to add a suffix to all URLs generated by CodeIgniter.
| For more information please see the user guide:
|
| http://codeigniter.com/user_guide/general/urls.html
 permite agregar un sufijo al final de la url
 ejmplo http://demo.renato.16mb.com/articulo/titulo.html
*/
//$config['url_suffix'] = '.html'; //'';
$config['url_suffix'] = ''; 
/*
|--------------------------------------------------------------------------
| Default Language
|--------------------------------------------------------------------------
|
| This determines which set of language files should be used. Make sure
| there is an available translation if you intend to use something other
| than english.
 
 le indicamos a codeigniter con que lenguaje vamos a trabajar
 en este caso nuestra aplicacion esta en español
*/
$config['language']	= 'spanish'; //'english';
/*
|--------------------------------------------------------------------------
| Default Character Set
|--------------------------------------------------------------------------
|
| This determines which character set is used by default in various methods
| that require a character set to be provided.
Indica la codificación de caracteres que se va a utilizar
le indicamos con que cotejamiento vamos a trabajar
lamayoria en latinoamerica trabaja con utf-8
*/
$config['charset'] = 'UTF-8';
/*
|--------------------------------------------------------------------------
| Enable/Disable System Hooks
|--------------------------------------------------------------------------
|
| If you would like to use the 'hooks' feature you must enable it by
| setting this variable to TRUE (boolean).  See the user guide for details.
indicamos si activamos o desactivamos
los hooks. por defecto esta desactivado
*/
$config['enable_hooks'] = FALSE;
/*
|--------------------------------------------------------------------------
| Class Extension Prefix
|--------------------------------------------------------------------------
|
| This item allows you to set the filename/classname prefix when extending
| native libraries.  For more information please see the user guide:
|
| http://codeigniter.com/user_guide/general/core_classes.html
| http://codeigniter.com/user_guide/general/creating_libraries.html
le indicamos con que prefijamos vamos a crear nuestras clases
ejemplo de crear nuestra propias clases: MY_nueva_clase.php
o también nos sirve para crear librerias "MY_Session.php".
*/
$config['subclass_prefix'] = 'MY_';
/*
|--------------------------------------------------------------------------
| Allowed URL Characters
|--------------------------------------------------------------------------
|
| This lets you specify with a regular expression which characters are permitted
| within your URLs.  When someone tries to submit a URL with disallowed
| characters they will get a warning message.
|
| As a security measure you are STRONGLY encouraged to restrict URLs to
| as few characters as possible.  By default only these are allowed: a-z 0-9~%.:_-
|
| Leave blank to allow all characters -- but only if you are insane.
|
| DO NOT CHANGE THIS UNLESS YOU FULLY UNDERSTAND THE REPERCUSSIONS!!
 
aquí le indicamos que parametro vamos aceptar en nuestra url
*/
$config['permitted_uri_chars']  = '+=\a-z 0-9~%.:_-'; 
/*
|--------------------------------------------------------------------------
| Enable Query Strings
|--------------------------------------------------------------------------
|
| By default CodeIgniter uses search-engine friendly segment based URLs:
| example.com/who/what/where/
|
| By default CodeIgniter enables access to the $_GET array.  If for some
| reason you would like to disable it, set 'allow_get_array' to FALSE.
|
| You can optionally enable standard query string based URLs:
| example.com?who=me&what=something&where=here
|
| Options are: TRUE or FALSE (boolean)
|
| The other items let you set the query string 'words' that will
| invoke your controllers and its functions:
| example.com/index.php?c=controller&m=function
|
| Please note that some of the helpers won't work as expected when
| this feature is enabled, since CodeIgniter is designed primarily to
| use segment based URLs.
para trabajar con urls amigables. False para desactivar (estamos hablando de enable_query_strings)
// ejemplo: http://demo.renato.16mb.com/articulo/titulo-2
// de lo contrario trabajaremos asi: http:demo.renato.16mb.com/index.php?c=controller&m=function
// es recomendable trabajar con urls amiglables
// asi lo dice codeigniter.
*/
$config['allow_get_array']		= TRUE;
//para trabajar con urls amigables
// con false trabajamos asi http://dominio/articulo/titulo-2
// con true trabajamos asi http://dominio/index.php?c=controller&m=function
$config['enable_query_strings'] = FALSE;  
$config['controller_trigger']	= 'c';
$config['function_trigger']		= 'm';
$config['directory_trigger']	= 'd'; // experimental not currently in use
/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
|
| If you have enabled error logging, you can set an error threshold to
| determine what gets logged. Threshold options are:
| You can enable error logging by setting a threshold over zero. The
| threshold determines what gets logged. Threshold options are:
|
|	0 = Disables logging, Error logging TURNED OFF
|	1 = Error Messages (including PHP errors)
|	2 = Debug Messages
|	3 = Informational Messages
|	4 = All Messages
|
| For a live site you'll usually only enable Errors (1) to be logged otherwise
| your log files will fill up very fast.
podemos decirle a codeigniter que errores mostrar
0 = Deshabilita el registro, el registro de errores APAGADOS
1 = Mensajes de error (incluyendo errores de PHP)
2 = mensajes de depuración
3 = Mensajes informativos
4 = Todos los mensajes
*/
$config['log_threshold'] = 0; //0= Deshabilita el registro de errores
/*
|--------------------------------------------------------------------------
| Error Logging Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| application/logs/ folder. Use a full server path with trailing slash.
 
le indicamos el directorio para que se almacene los errores
si lo dejamos en blanco la ruta por defecto es:
application/logs/
*/
$config['log_path'] = '';
/*
|--------------------------------------------------------------------------
| Date Format for Logs
|--------------------------------------------------------------------------
|
| Each item that is logged has an associated date. You can use PHP date
| codes to set your own date formatting
indicamos el formato de fecha global.. Al parecer esto es para los Logs.
*/
$config['log_date_format'] = 'Y-m-d H:i:s';
/*
|--------------------------------------------------------------------------
| Cache Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| system/cache/ folder.  Use a full server path with trailing slash.
le indicamos el directorio donde vamos almacenar la cache
si lo dejamos en blanco la ruta por defecto es: system/cache/
*/
$config['cache_path'] = '';
/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
|
| If you use the Encryption class or the Session class you
| MUST set an encryption key.  See the user guide for info.
|
  Es una cadena que permite desencriptar los datos, se utiliza cuando se
  trabaja con la clase Encryption o Session, se recomienda que se utilicen letras
  en mayúsculas, minúsculas, números, caracteres especiales para aumentar la seguridad
si estamos trabajando con sesiones. Es obligatorio llenar este parametro
ejem: 123456789/*-@-., (puedes poner la combinaciones de caracteres)
*/
$config['encryption_key'] = $_SERVER['ENCRYPT_KEY']; //'';
/*
|--------------------------------------------------------------------------
| Session Variables
|--------------------------------------------------------------------------
|
| 'sess_cookie_name'		= the name you want for the cookie
| 'sess_expiration'			= the number of SECONDS you want the session to last.
|   by default sessions last 7200 seconds (two hours).  Set to zero for no expiration.
| 'sess_expire_on_close'	= Whether to cause the session to expire automatically
|   when the browser window is closed
| 'sess_encrypt_cookie'		= Whether to encrypt the cookie
| 'sess_use_database'		= Whether to save the session data to a database
| 'sess_table_name'			= The name of the session database table
| 'sess_match_ip'			= Whether to match the user's IP address when reading the session data
| 'sess_match_useragent'	= Whether to match the User Agent when reading the session data
| 'sess_time_to_update'		= how many seconds between CI refreshing Session Information
'sess_cookie_name'		= El nombre que deseamos para la cookie
'sess_expiration'			= El número de segundos que desee que la sesión dure. Por defecto 7.200seg(2hrs). 
							  Cero(0) es sin caducidad
'sess_expire_on_close'	= Para hacer que la sesión caduque automáticamente. Cuando la ventana del navegador se cierra
'sess_encrypt_cookie'		= Para encriptar la cookie
'sess_use_database'		= Para guardar los datos de la sesión de una base de datos
'sess_table_name'			= El nombre de la tabla de base de datos de sesión
'sess_match_ip'			= Para que coincida con la dirección IP del usuario al leer los datos de sesión
'sess_match_useragent'	= Para que coincida con el agente de usuario(navegador) al leer los datos de sesión
'sess_time_to_update'		= número de segundos para refrescar la CI de informacion de sesion 
parametros de configuracion si esta habilitado la clase sesion
*/
$config['sess_cookie_name']		= 'casaley_session';
$config['sess_expiration']		= 0; //7200(2hrs);
$config['sess_expire_on_close']	= TRUE; //FALSE;
$config['sess_encrypt_cookie']	= FALSE; //FALSE;
$config['sess_use_database']	= TRUE; //FALSE;
$config['sess_table_name']		= 'casaley_sessions'; //'ci_sessions';
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']	= TRUE;
$config['sess_time_to_update']	= 300;
/*
|--------------------------------------------------------------------------
| Cookie Related Variables
|--------------------------------------------------------------------------
|
| 'cookie_prefix' = Set a prefix if you need to avoid collisions
| 'cookie_domain' = Set to .your-domain.com for site-wide cookies
| 'cookie_path'   =  Typically will be a forward slash
| 'cookie_secure' =  Cookies will only be set if a secure HTTPS connection exists.
// configuramos estos parametros si estamos trabajando. Con la cookies
*/
$config['cookie_prefix']	= "";
$config['cookie_domain']	= "";
$config['cookie_path']		= "/";
$config['cookie_secure']	= FALSE;
/*
|--------------------------------------------------------------------------
| Global XSS Filtering
|--------------------------------------------------------------------------
|
| Determines whether the XSS filter is always active when GET, POST or
| COOKIE data is encountered
algo de seguridad podemos filtrar los datos
via post como inyecciones XSS globalmente
*/
$config['global_xss_filtering'] = FALSE;
/*
|--------------------------------------------------------------------------
| Cross Site Request Forgery
|--------------------------------------------------------------------------
| Enables a CSRF cookie token to be set. When set to TRUE, token will be
| checked on a submitted form. If you are accepting user data, it is strongly
| recommended CSRF protection be enabled.
|
| 'csrf_token_name' = The token name
| 'csrf_cookie_name' = The cookie name
| 'csrf_expire' = The number in seconds the token should expire.
*/
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
/*
|--------------------------------------------------------------------------
| Output Compression
|--------------------------------------------------------------------------
|
| Enables Gzip output compression for faster page loads.  When enabled,
| the output class will test whether your server supports Gzip.
| Even if it does, however, not all browsers support compression
| so enable only if you are reasonably sure your visitors can handle it.
|
| VERY IMPORTANT:  If you are getting a blank page when compression is enabled it
| means you are prematurely outputting something to your browser. It could
| even be a line of whitespace at the end of one of your scripts.  For
| compression to work, nothing can be sent before the output buffer is called
| by the output class.  Do not 'echo' any values with compression enabled.
|
*/
$config['compress_output'] = FALSE;
/*
|--------------------------------------------------------------------------
| Master Time Reference
|--------------------------------------------------------------------------
|
| Options are 'local' or 'gmt'.  This pref tells the system whether to use
| your server's local time as the master 'now' reference, or convert it to
| GMT.  See the 'date helper' page of the user guide for information
| regarding date handling.
|
*/
$config['time_reference'] = 'UM1';// 'local'; //'UM6';
/*
|--------------------------------------------------------------------------
| Rewrite PHP Short Tags
|--------------------------------------------------------------------------
|
| If your PHP installation does not have short tag support enabled CI
| can rewrite the tags on-the-fly, enabling you to utilize that syntax
| in your view files.  Options are TRUE or FALSE (boolean)
|
*/
$config['rewrite_short_tags'] = FALSE;
/*
|--------------------------------------------------------------------------
| Reverse Proxy IPs
|--------------------------------------------------------------------------
|
| If your server is behind a reverse proxy, you must whitelist the proxy IP
| addresses from which CodeIgniter should trust the HTTP_X_FORWARDpepsi_FOR
| header in order to properly identify the visitor's IP address.
| Comma-delimited, e.g. '10.0.1.200,10.0.1.201'
|
*/
$config['proxy_ips'] = '';
/* End of file config.php */
/* Location: ./application/config/config.php */
