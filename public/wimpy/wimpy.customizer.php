<?php


//
//            WW  WW  WW
//            WW  WW  WW
//            WW  WW  WW
//             WWWWWWWW
//     __ __ _ _ _ __  _ __ _  _ 
//     \ V  V / | , , | __ \  V |
//      \_/\_/|_|_|_|_| .__/\_, |
//                    |_|   |___|
//
// ----------------------------------
//
//     Wimpy Customizer
//     7.84 2021-04-10
//     www.wimpyplayer.com
//     Copyright Michael Gieson
//
// ----------------------------------







// -------------------
// URL Style
// -------------------
// 1 = from the root: 	/path/to/file.mp3
// 2 = full URL: 		http://www.yoursite.com/path/to/file.mp3
$urlStyle = 1; 

// -------------------
// Hide Keywords
// -------------------
// Files containing these keywords will be ignored.
$hide_keywords = "skin,wimpy,config,customizer,source,plugin";

// -------------------
// Hide Folders
// -------------------
// A list of folder names to ignore.
$hide_folders = "assets,_notes,skins,getid3,_private,_private,_vti_bin,_vti_cnf,_vti_pvt,_vti_txt,cgi-bin";

// -------------------
// Hide Files
// -------------------
// A list of file names to ignore.
$hide_files = "";

// -------------------
// HTTP Option
// -------------------
// Allows you to run wimpy in "https" mode;
//$httpOption = "https";
$httpOption = "http";


// -------------------
// Cross Doamin
// -------------------
// Allows this script to be called from another domain (or local file system).
$allowCrossDomainAccess = true; 






$wimpyVersion="7.84";define("newline","\r\n");define("slash","/");function striphack($string){$retval=$string;$retval=strip_tags(rawurldecode(utf8_decode($retval)));$retval=str_replace("sscanf","x",$retval);$retval=str_replace("printf","x",$retval);$retval=str_replace("base64_decode","x",$retval);$retval=str_replace("rawurldecode","x",$retval);$retval=str_replace("urldecode","x",$retval);$retval=str_replace("0;","x",$retval);$retval=str_replace("%5C","x",$retval);$retval=str_replace("\n","x",$retval);$retval=str_replace("\r","x",$retval);$retval=str_replace("\t","x",$retval);$retval=str_replace("\\","x",$retval);$retval=str_replace("..","x",$retval);$retval=str_replace("./","x",$retval);
$retval=str_replace('$',"x",$retval);return $retval;}function secureArray($array_in){if(@is_array($array_in)){$Atemp=array();foreach ($array_in as $key=>$value){$Atemp[striphack($key)]=striphack($value);}}else{$Atemp=$array_in;}return $Atemp;}function traverse ( &$arr ){if ( !is_array ( $arr ) ){return;}foreach ( $arr as $key=>$val ){is_array ( $arr[$key] ) ? traverse ( $arr[$key] ) : ( $arr[$key]=stripslashes ( $arr[$key] ) );}}$gpc=array (&$_REQUEST);traverse ( $gpc );if(!isset($_SERVER['SCRIPT_NAME'])){$_REQUEST=get_defined_vars();$_SERVER=$HTTP_SERVER_VARS;}$_REQUEST=secureArray($_REQUEST);function serveMe($theString,$theFilename){$myFileSize=strlen($theString);if(!$theFilename){$theFilename="Undefined.txt";}$parts=pathinfo($theFilename);$mime="text/".$parts['extension'];header("Pragma: public");header("Expires: Thu,19 Nov 1981 08:52:00 GMT");header("Cache-Control: must-revalidate,post-check=0,pre-check=0");header("Cache-Control: no-store,no-cache,must-revalidate");header("Cache-Control: private");header("Content-Type: ".$mime);header("Content-Disposition: attachment; filename=".$theFilename.";" );header("Content-Transfer-Encoding: text");header("Content-Length: ".$myFileSize,false);print (stripslashes("$theString"));exit;}if(isset($_POST['data']) && isset($_POST['expecting'])){if($_POST['expecting']=="message"){print "php return this";}else{serveMe($_POST['data'],$_POST['filename']);}}if(!@getcwd ()){$wimpy_PATH['phys']=str_replace(slash,"/",dirname(__FILE__));}else{$wimpy_PATH['phys']=str_replace(slash,"/",getcwd ());}$Apathtome=explode("/",$_SERVER['PHP_SELF']);$wimpyPhp=array_pop($Apathtome);$wimpy_PATH['wwwroot']=$httpOption."://".$_SERVER['HTTP_HOST'];if($urlStyle==2){$wimpy_PATH['www']=$wimpy_PATH['wwwroot'].(implode("/",$Apathtome));$wimpy_PATH['wwwself']=$wimpy_PATH['wwwroot'].$_SERVER['PHP_SELF'];}else{$wimpy_PATH['www']=(implode("/",$Apathtome));$wimpy_PATH['wwwself']=$_SERVER['PHP_SELF'];}$wimpy_PATH['phys']=str_replace(slash,"/",$wimpy_PATH['phys']);$wimpy_PATH['phys']=str_replace("//","/",$wimpy_PATH['phys']);$tail=fromTheRoot($wimpy_PATH['wwwroot'].(implode("/",$Apathtome)));$wimpy_PATH['physroot']=substr($wimpy_PATH['phys'],0,strlen($wimpy_PATH['phys'])-strlen($tail));$Ahide_files=explode(",",$hide_files);$Ahide_folders=explode(",",$hide_folders);$Akeywords=explode(",",$hide_keywords);function checkKeyWords($Ahaystack,$needle){foreach($Ahaystack as $value){if( @stristr($value,$needle) !=false ){return true;}}return false;}function GetDirArrayRecursive($dir,$filter=false) {global $Amedia_types,$Ahide_files,$Ahide_folders,$Akeywords;if($filter){$Afilter=$filter;}else{$Afilter=$Amedia_types;}$Afiles=array ();if(!$dir || $dir==""){$dir=".";}$handle=@opendir($dir);if($dir){if(is_dir($dir) ){while (false !==($entry=@readdir($handle))){if($entry!='.' && $entry!='..') {$entry=$dir.'/'.str_replace("\\","/",$entry);$pathinfo=path_parts($entry);if(is_dir($entry)) {if(!checkKeyWords($Ahide_folders,$pathinfo['filename']) && !checkKeyWords($Akeywords,$pathinfo['filename'])){$Afiles=array_merge($Afiles,GetDirArrayRecursive($entry,$Afilter));}}else{if(in_array(strtolower($pathinfo['ext']),$Afilter)){if(!checkKeyWords($Ahide_files,$pathinfo['filename']) && !checkKeyWords($Akeywords,$pathinfo['filename'])){$Afiles[]=$entry;}}}}}}}@closedir($handle);return $Afiles;}function printArray($theArray,$exit=false){print "<pre>";print_r($theArray);print "</pre>";if($exit){exit;}}function path_parts($thePath) {$thePath=stripslashes($thePath);$thePath=str_replace("\\","/",$thePath);$filepathA=explode("/",$thePath);$filename=array_pop($filepathA);$filepathB=explode(".",$filename);$extension=array_pop($filepathB);$basename=implode(".",$filepathB);$basePath=join("/",$filepathA);$Aret=array();$Aret['filename']=$filename;$Aret['ext']=$extension;$Aret['basename']=$basename;$Aret['basepath']=$basePath;return $Aret;}function fromTheRoot($theURL){global $wimpy_PATH;return substr( $theURL,strlen($wimpy_PATH['wwwroot']),strlen($theURL));}function printTEXT($theList){global $allowCrossDomainAccess;header("Pragma: public",false);header("Expires: Thu,19 Nov 1981 08:52:00 GMT",false);header("Cache-Control: must-revalidate,post-check=0,pre-check=0",false);header("Cache-Control: no-store,no-cache,must-revalidate",false);header("Content-Type: text/plain; charset=utf-8",false);print (utf8_encode($theList));exit;}function parseCSSforSelectors($file) {$text=file_get_contents($file);
$text=preg_replace('!/\*.*?\*/!s','',$text);$text=preg_replace('/{(.*?)}/si','',$text);$pattern='/([#|\.])([_a-z]+[_a-z0-9-]*)/mi';$arr=array();preg_match_all($pattern,$text,$arr);$unique=array_unique ( $arr[2] );$result=array();foreach($unique as $val){if( $val !="play" && $val !="pause" && $val !="loading" ){$result[]=$val;}}return $result;}if(@$_REQUEST["v"]){print "wimpy:".$wimpyVersion.";php:".phpversion();exit;} else if (@$_POST["o"]=="ok" || @$_REQUEST["o"]=="ok"){print "ok";exit;} else if (@$_POST["l"]=="buttons" || @$_REQUEST["l"]=="buttons"){$media_types="css";$Amedia_types=explode(",",$media_types);$fail=false;$Ahide_files=Array();$Ahide_folders=Array();$Akeywords=Array();$dir="./wimpy.buttons";$Afiles=GetDirArrayRecursive($dir);natcasesort($Afiles);$Aretval=Array();foreach($Afiles as $key=>$val){$parts=path_parts($val);$sels=parseCSSforSelectors($val);if(count($sels)>0){$item=Array();$item[]='"data":"'.$wimpy_PATH['www']."/".str_replace("./","",$val).'"';$item[]='"selectors":["'.implode('","',$sels).'"]';array_push( $Aretval,"{".implode(',',$item)."}" );}}$retval='['.implode(',',$Aretval).']';printTEXT($retval);exit;} else if (@$_POST["l"]=="skins" || @$_REQUEST["l"]=="skins"){$media_types="tsv";$Amedia_types=explode(",",$media_types);$fail=false;$Ahide_files=Array();$Ahide_folders=Array();$Akeywords=Array();$dir="";$Afiles=GetDirArrayRecursive($dir);natcasesort($Afiles);$Aretval=Array();foreach($Afiles as $key=>$val){$parts=path_parts($val);$item=Array();$item[]='"url":"'.$wimpy_PATH['www']."/".str_replace("./","",$val).'"';$jfile=file_get_contents($val);$Athumb=explode('"thumbnail"',$jfile);$thumbData="";if(@$Athumb[1]){$AthumbData=explode('"',$Athumb[1]);for($i=0;$i<count($AthumbData); $i++){$part=$AthumbData[$i];if(substr ($part,0,4)=="data"){$thumbData=$part;break;}}}if($thumbData){$item[]='"icon":"'.$thumbData.'"';}$item[]='"title":"'.str_replace("_"," ",$parts['basename']).'"';array_push( $Aretval,"{".implode(',',$item)."}" );}$retval='['.implode(',',$Aretval).']';printTEXT($retval);exit;}else{$redirectTo="wimpy.customizer.html";if (headers_sent()===false){header('Location: '.$redirectTo,true,302);}else{$page="";$page .='<!DOCTYPE html>'."\n";$page .='<html lang="en">'."\n";$page .='<head>'."\n";$page .='<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'."\n";$page .='<meta http-equiv="Location" content="'.$redirectTo.'">'."\n";$page .='<meta http-equiv="refresh" content="3;URL='.$redirectTo.'">'."\n";$page .='</head>'."\n";$page .='<body>'."\n";$page .='Redirecting to front end...<a href="'.$redirectTo.'">('.$redirectTo.')</a>'."\n";$page .='</body>'."\n";$page .='</html>'."\n";print ($page);}exit();}?>

