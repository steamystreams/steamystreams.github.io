<?php
@date_default_timezone_set ('UTC');

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
//     Wimpy Playlister
//     7.84 2021-04-10
//     www.wimpyplayer.com
//     Copyright Michael Gieson
//
// ----------------------------------





$wimpyVersion = "7.84";


// -----------------------------
// Allow Folder Navigation
// -----------------------------
$allowFolderNavigation = true;

// -----------------------------
// Playlist Kind
// -----------------------------
// VALUES
// xml 		- XML playlists allow for cover art images (both folder-based 
//              and file-based) Plus using an XML playlist allows for distinction 
//              between skin files (which are json) and playlist files.
// txt 		- Simple text-based list
// json 	- (Experimental -- may not be supported on your system)
//
// NOTE: Can also be set using a URL query:
// wimpy.php?k=json
$playlistKind = "xml";

// -----------------------------
// Media Types
// -----------------------------
// The kinds of files to search for:
$media_types = "xml,pls,mp4,m4a,m4p,m4v,aac,mp3,wav,json,flac";


// -----------------------------
// HTTP Option
// -----------------------------
// Allows you to run wimpy in "https" mode. We can manually set the values, or set to "auto" 
// to have this script automatically check and set depending on how the file is accessed.
//$httpOption = "http";
//$httpOption = "https";
$httpOption = "auto";

// -----------------------------
// Hide Folders
// -----------------------------
// A list of folder names to ignore.
$hide_folders = "getid3,wimpy.buttons,wimpy.skins,wimpy.test,wimpy.getid3,assets,cgi-bin,_notes,_private,_private,_vti_bin,_vti_cnf,_vti_pvt,_vti_txt";

// -----------------------------
// Hide Files
// ------------------------v
// A list of file names to ignore.
$hide_files = "";

// -----------------------------
// Hide Keywords
// -----------------------------
// Files containing these keywords will be ignored.
$hide_keywords = ""; //wimpy,config,customizer,source,plugin

// -----------------------------
// Coverart Basename
// -----------------------------
// For each folder and sub-folder, you can have a single 
// image that will be used for all files in that folder 
// or sub-folder. 
//
// For example, if you have a folder set up as:
// myFolder/
//		coverart.jpg
//		track1.mp3
//		track2.mp3
// Then all the tracks in "myFolder" will use the "coverart.jpg" file
//
// This setting allows you to specify the filename to look for.
//
// For the sake of flexability, so you can use png or jpg 
// without having to modify this script, we are just defining 
// the "base name" to look for -- the file name without the extension.
//
// For example, the "base name" of this file: coverart.jpg
// is "coverart".
$coverartBasename = "coverart"; 

// -----------------------------
// Find All Media
// -----------------------------
// When set to "true", will recursively search through all subdirectoies. 
$findAllMedia = false; // false true

// -----------------------------
// Quirks Mode
// -----------------------------
// This allows for files to be manually sorted within the folder.
// Provides a means to sort files manually based on numbers within the file name.
// When relying on the file name to display the title in the playlist, wimpy will 
// discard the numbers and only display the text "between the dots" for the track title.
// If using the getID3 library the actual track titles will appear, yet still be 
// sorted according to the numbering system.
// Example: 
// 1.XYZ-MyTrack.mp3 would display as "XYZ-MyTrack", but will display first because 1
// 2.ABC-MyTrack.mp3 would display as "ABC-MyTrack", but will display second because 2
//
// If you have more than 10 items, there are a couple of strageies you can use to deal 
// with problems where you may see:
//
// 		1
// 		10 <-- huh?
// 		11 <-- huh?
// 		2
// 		3
// 		4
// 		40 <-- huh?
// 		41 <-- huh?
// 		5
//
// The reason for this is because sorting is conducted character-by-character from left-to-right. 
// So you'll want to pad your numbers with zeros, or with 100's as:
// 
// 		01.foo
// 		02.foo
// 		03.foo
// 
// 	or
// 
// 		101.foo
// 		102.foo
// 		103.foo
// 
// You may also want to consider usin a "lettering" numbering system:
//
// 		aaa.Track X.mp3
// 		aab.Track Y.mp3
// 		aac.Track Z.mp3
// 		aad.Track A.mp3
// 		aae.Track B.mp3
// 		aaf.Track C.mp3
//
// NOTE: When using this option, $sortIndex is automatically over-ridden to "file".
// You may still use the $sortOrder option.
$quirksmode = false;


// -------------------
// URL Style
// -------------------
// VALUES
// 1 = from the root 	/path/to/file.mp3
// 2 = full URL 		http://www.yoursite.com/path/to/file.mp3
$urlStyle = 1;


// -------------------
// Cross Domain Accessible
// -------------------
// Allows this script to be called from another domain (or local file system).
$allowCrossDomainAccess = true;


// -------------------
// Limit Files
// -------------------
// Limits the number of files that are returned
// -1 = no limit.
// [1-n] = integer representing the maximum number of files that can be returned.
// $limitFiles = 50; // 50 files will be returned.
// $limitFiles = -1; // no limit.
$limitFiles = -1;


// -------------------
// Ignore Folders
// -------------------
// Does not include folders in the returned playlist.
$ignoreFolders = false;

// -------------------
// Encrypt Filenames
// -------------------
// Filenames will not display as traditional URL's rather they will be "base64 encoded.
$encrypt = false;


/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//
//                IMPORTANT !
//   Wimpy over-rides teh GETID3 options through query-strings
//   (in the $_REQUEST or $_POST). This allows Wimpy to be
//   configure getid3 from the client. 
//  
//   We've left these options for you in case you are using 
//   wimpy.php to retrieve XML playlists and you're 
//   some kind of wizard.
//
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//
//                MUCHO IMPORTANT-ARINO !
// 
//   You'll need to ensure the "getid3" library is located in 
//   the same folder as this file. The "getid3" library is a
//   folder included in the wimpy downlaod package. The entire
//   folder needs to be "next to" wimpy.php.
//
//   Example:
//   path/to/wimpy.php
//   path/to/getid3/*
//
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////


// -----------------------------
// Get ID3 Info
// -----------------------------
// Requires the getid3 library.
$getID3info = false;

// -----------------------------
// Extract Image
// -----------------------------
// Requires the getid3 library.
// Extracts embedded image from ID3.
// Embedded image must be either PNG or JPG
// May cause playlists to load slowly since the extracted data gets inserted into the playlist as base64'd data.
$getID3image = false;


/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//
//               IMPORTANTE AMIGO!
//
//   NOTE: Any changes you make to the sorting 
//   options will not translate into the player. 
//   Because Wimpy has it's own built-in sorting 
//   mechanisms on the client-side. 
//   
//   We've left these options for you in case you are using 
//   wimpy.php to retrieve XML playlists and you're 
//   some kind of wizard.
//
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////

// -----------------------------
// Shuffle Files
// -----------------------------
// Randomizes the file list order. (Does not randomize folder lists.)
$shuffle = false;

// -----------------------------
// Sort Order
// -----------------------------
// Sets the sort order for files.
// VALUES
// asc 	- Ascending (A-Z);
// dec 	- Descending (Z-A);
$sortOrder = "asc";



// -----------------------------
// Sort Index
// -----------------------------
// Which field to sort on:
// VALUES
// none 	- don't sort
// date 	- Modification date of the file on the server
// artist 	- GetID3 options must be enabled
// title 	- Generally the "base name" of the file. Or if using GetID3 option, the actual title in the ID3 tag.
// file		- um
// ... any other field present.
// NOTE: When using quirksmode the value set here is overriddden and automatically set to "file"
$sortIndex = "none";



// -----------------------------
if($httpOption=="auto"){$a=false;if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') {$a=true;} elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])


&& $_SERVER['HTTP_X_FORWARDED_PROTO']=='https'


|| !empty($_SERVER['HTTP_X_FORWARDED_SSL'])


&& $_SERVER['HTTP_X_FORWARDED_SSL']=='on') {$a=true;}$httpOption=$a ? 'https' : 'http';}if($quirksmode){$sortIndex="file";}define("newline","\r\n");define("slash",DIRECTORY_SEPARATOR);$b=array();$b['allowFolderNavigation']=$allowFolderNavigation;$b['allowCrossDomainAccess']=$allowCrossDomainAccess;$b['coverartBasename']=$coverartBasename;$b['playlistKind']=$playlistKind;$b['quirksmode']=$quirksmode;$b['urlStyle']=$urlStyle;$b['limitFiles']=$limitFiles;$b['ignoreFolders']=$ignoreFolders;$b['encrypt']=$encrypt;$b['getID3info']=$getID3info;$b['getID3image']=$getID3image;$b['shuffle']=strtolower($shuffle);$b['sortOrder']=strtolower($sortOrder);$b['sortIndex']=$sortIndex;$b['media_types']=explode(",",$media_types);$b['hide_keywords']=explode(",",$hide_keywords);$b['hide_folders']=explode(",",$hide_folders);$b['hide_files']=explode(",",$hide_files);$c=null;function d ( &$e ){if ( !is_array ( $e ) ){return;}foreach ( $e as $f=>$g ){is_array ( $e[$f] ) ? d ( $e[$f] ) : ( $e[$f]=stripslashes ( $e[$f] ) );}}$h=array ( &$_GET,&$_POST,&$_COOKIE,&$_REQUEST);d ( $h );function cleanQuotedHTML($i) {$i=$i[1];$j=@html_entity_decode($i,k,"ISO-8859-1");     $j=@preg_replace('/&#(\d+);/me',"chr(\\1)",$j);     $j=@preg_replace('/&#x([a-f0-9]+);/mei',"chr(0x\\1)",$j);
return utf8_encode(rawurlencode($j));}function l($j){return str_replace("&#039;","'",$j);
}function m($n){$o=$n;$o=str_replace("&amp;","__AMP__amp",$o);$o=str_replace("<","__AMP__lt",$o);$o=str_replace(">","__AMP__gt",$o);$o=str_replace("'","__AMP__apos",$o);$o=str_replace('"',"__AMP__quot",$o);$o= preg_replace_callback('/(&#[0-9a-fx]+;)/mi','cleanQuotedHTML',$o);$o=str_replace("&#x","__AMP_PUOND__",$o);$o=str_replace("&#","__AMP_PUOND__",$o);$o=str_replace("&","__AMP__amp",$o);$o=str_replace('%',"__PERCENT__",$o);$o=p($o);$o=str_replace("__AMP_PUOND__","&#x",$o);$o=str_replace("__AMP__amp","&amp;",$o);$o=str_replace("__AMP__lt","&lt;",$o);$o=str_replace("__AMP__gt","&gt;",$o);$o=str_replace("__AMP__apos","&apos;",$o);$o=str_replace("__AMP__quot","&quot;",$o);$o=str_replace('__PERCENT__',"%",$o);return $o;}function p($q)
{$r="";$s;if (empty($q))


{return $r;}$t=strlen($q);for ($u=0; $u<$t; $u++)
{$s=ord($q[$u]);if (($s==0x9) ||
($s==0xA) ||
($s==0xD) ||
(($s>=0x28) && ($s<=0xD7FF)) ||
(($s>=0xE000) && ($s<=0xFFFD)) ||
(($s>=0x10000) && ($s<=0x10FFFF)))
{$r .=chr($s);}else
{$r .=" ";}}return $r;}function v($n,$w=false) {global $encrypt;$o=$n;$o=str_replace("&","%26",$o);$o=str_replace("?","%3F",$o);if($encrypt){$o="__1".base64_encode($o);}return $o;}if(@ini_get('safe_mode')){print('<'.urldecode("%3F").'xml version="1.0" '.urldecode("%3F").'>');print('<playlist>');print('<item>');print('<file>ERROR</file>');print('<title>1. ERROR</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>2. PHP is running in "Safe Mode".</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>3. Contact Server Admin to Correct.</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>4. ------------------</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>5. You can still use Rave,</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>6. however all URLs must be</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>7. entered manually.</title>');print('</item>');print('</playlist>');exit;}function x($y){$z="__:__";$r=str_replace("://",$z,$y);$r=str_replace("\\","/",$r);$r=str_replace("//","/",$r);$r=str_replace($z,"://",$r);if(substr($r,-1)=="/"){$r=substr($r,0,sizeof($r)-1);}return $r;}if(!isset($_SERVER['SCRIPT_NAME'])){$_REQUEST=get_defined_vars();$_SERVER=$Za;}$Zb=explode("/",$_SERVER['PHP_SELF']);$Zc=array_pop($Zb);$Zd['wwwroot']=$httpOption."://".$_SERVER['HTTP_HOST'];$Zd['www']=$Zd['wwwroot'].(implode("/",$Zb));$Zd['wwwself']=$Zd['wwwroot'].$_SERVER['PHP_SELF'];if(!@getcwd ()){$Ze=dirname(__FILE__);}else{$Ze=getcwd();}$Zd['sys']=x($Ze);$Zf=strrev ( $Ze );$Zg=strrev ( Zh($Zd['www']) );$Zi=strrev ( substr($Zf,strlen($Zg) ) );$Zd['sysroot']=$Zi;function Zj($Zk,$Zl){foreach($Zk as $q){if( @stristr($q,$Zl) !=false ){return true;}}return false;}function Zm($Zn,$Zo=false) {global $b;if($Zo){$Zp=$Zo;}else{$Zp=$b['media_types'];}$Zq=array ();if(!$Zn || $Zn==""){$Zn=".";}$Zr=$b['hide_folders'];$Zs=$b['hide_files'];$Zt=$b['hide_keywords'];$Zu=@opendir($Zn);if($Zn){while (false !==($Zv=@readdir($Zu))){if($Zv!='.' && $Zv!='..') {$Zv=$Zn.'/'.str_replace("\\","/",$Zv);$Zw=Zx($Zv);if(is_dir($Zv)) {if( !Zj($Zr,$Zw['filename'])


&& !Zj($Zt,$Zw['filename'])


){$Zq=array_merge($Zq,Zm($Zv,$Zp));}}else{if(in_array(strtolower($Zw['ext']),$Zp)){if(!Zj($Zs,$Zw['filename'])


&& !Zj($Zt,$Zw['filename'])
){$Zq[]=$Zv;}}}}}@closedir($Zu);}return $Zq;}function Zy($Zn){global $b;$Zn=utf8_encode($Zn);
$Zz=array();$ZZa=array ();$ZZb=array ();$Zq=array ();$Zu=@opendir($Zn);$ZZc=$b['media_types'];$Zr=$b['hide_folders'];$Zs=$b['hide_files'];$Zt=$b['hide_keywords'];$ZZd=$b['allowFolderNavigation'];if($Zn){while (false !==($Zv=@readdir($Zu))){if($Zv !='.' && $Zv !='..' && substr ($Zv,0,1 ) !="." && substr ($Zv,0,2 ) !="..") {$Zv=$Zn.'/'.str_replace("\\","/",$Zv);$Zw=Zx($Zv);if(is_dir($Zv) && $ZZd==true) {if(!Zj($Zr,$Zw['filename']) && !Zj($Zt,$Zw['filename'])){$ZZb[]=$Zv;}}else{if(in_array(strtolower($Zw['ext']),$ZZc)){if(!Zj($Zs,$Zw['filename']) && !Zj($Zt,$Zw['filename'])){$Zq[]=$Zv;}}}}}@closedir($Zu);}$ZZa['dirs']=$ZZb;$ZZa['files']=$Zq;return $ZZa;}function ZZe ($ZZf,$ZZg,$ZZh,$ZZi=false,$ZZj=false) {if(is_array($ZZf) && count($ZZf)>0) {foreach(array_keys($ZZf) as $f) {$ZZk[$f]=@$ZZf[$f][$ZZg];}if(!$ZZi) {if ($ZZh=='asc'){asort($ZZk);}else{
arsort($ZZk);}}else{if ($ZZj===true) {natsort($ZZk);}else{natcasesort($ZZk);}if($ZZh !='asc') {$ZZk=array_reverse($ZZk,true);}}foreach(array_keys($ZZk) as $f) {if (is_numeric($f)) {$ZZl[]=$ZZf[$f];}else{$ZZl[$f]=$ZZf[$f];}}return $ZZl;}else{return $ZZf;}}function ZZm($ZZn,$ZZo=false){print "<pre>";print_r($ZZn);print "</pre>";if($ZZo){exit;}}function ZZp($ZZq){$o="";foreach($ZZq as $f=>$g){$o .="<".$f.">".m(trim($g))."</".$f.">".newline;}return $o;}function ZZr($ZZq){$o=array();foreach($ZZq as $f=>$g){$o[$f]=l(trim($g));}return $o;}function ZZs($ZZt,$ZZu=false,$ZZv=null){global $b,$Zd,$playlistKind;$ZZw=$b['coverartBasename'];$ZZx=utf8_decode(rawurldecode($ZZt));if($ZZv){$ZZy=$ZZv;}else{if($ZZu){$ZZy=array();$ZZy['files']=Zm($ZZx);$ZZy['dirs']=array();}else{$ZZy=Zy($ZZx);}}$ZZb=array();$Zq=array();$ZZz=array();$ZZZa=$b['quirksmode'];$ZZZb=$b['getID3info'];$ZZZc=$b['getID3image'];$ZZZd=$b['playlistKind'];$ZZZe="";if($ZZZd !=$playlistKind){$ZZZe="k=".$ZZZd."&";}if( ! $b['ignoreFolders']){if(sizeof($ZZy['dirs'])>0){$ZZZf=$ZZy['dirs'][0];$ZZZg=Zx($ZZZf);$ZZZh=Zx($ZZZg['basepath']);$ZZZi=ZZZj($ZZZh['basepath']);for($u=0; $u<sizeof($ZZy['dirs']); $u++){$ZZZf=$ZZy['dirs'][$u];$ZZZg=Zx($ZZZf);$ZZZi=ZZZj($ZZZf);$ZZZk=array();$ZZZl="";$ZZZk['date']=filemtime($ZZZf);$ZZZm=v($ZZZi,true);$ZZZk['file']=$Zd['wwwself']."?".$ZZZe.$ZZZl."d=".$ZZZm;$ZZZk['image']=ZZZn($ZZZf.slash.$ZZw);$ZZZk['kind']=$ZZZd;$ZZZk['dir']=$ZZZm;$ZZZo=$ZZZg['filename'];if($ZZZa){$ZZZp=explode(".",$ZZZo);if(sizeof($ZZZp)>1){array_shift($ZZZp);}$ZZZo=implode($ZZZp);}$ZZZk['title']=preg_replace ('/_/'," ",$ZZZo);$ZZb[]=$ZZZk;}}}if(sizeof($ZZy['files'])>0){for($u=0; $u<sizeof($ZZy['files']); $u++){$ZZZf=$ZZy['files'][$u];$ZZZg=Zx($ZZZf);$ZZZi=ZZZj($ZZZf);$ZZZk=array();$ZZZk['date']=filemtime($ZZZf);$ZZZk['file']=v( $ZZZi );$ZZZq=$ZZZg['ext'];$ZZZk['kind']=$ZZZq;if( $ZZZb ){$ZZZr=ZZZs($ZZZf);}else{$ZZZr=array();}foreach($ZZZr as $f=>$g){if($f=='track_number'){$ZZZk['index']=$g;} else if($f=='album' || $f=='year'){$ZZZk[$f]=$g;}}if(@$ZZZr['artist']){$ZZZk['artist']=@$ZZZr['artist'];}if( ! @$ZZZr['artist'] && @$ZZZk['band']){$ZZZk['artist']=@$ZZZk['band'];}$ZZZo=$ZZZg['basename'];if($ZZZa){$ZZZp=explode(".",$ZZZo);if(sizeof($ZZZp)>1){array_shift($ZZZp);}$ZZZo=implode($ZZZp);}$ZZZk['title']=(@$ZZZr['title'])? @$ZZZr['title'] : preg_replace ('/_/'," ",$ZZZo);if(@$ZZZr['genre']){$ZZZk['genre']=@$ZZZr['genre'];}if( isset($ZZZr['link']) ){$ZZZk['link']=$ZZZr['link'];}$ZZZt=ZZZn($ZZZg['basepath'].slash.$ZZZg['basename']);if( ! $ZZZt ){if( isset($ZZZr['imageExists']) || isset($ZZZr['image'])){$ZZZt=$Zd['wwwself']."?jj=".v($ZZZi,true);}if( ! $ZZZt ){$ZZZt=ZZZn($ZZZg['basepath'].slash.$ZZw);}}if($ZZZt){$ZZZk['image']=$ZZZt;}if( isset($ZZZr['index']) ){$ZZZk['index']=$ZZZr['index'];}$Zq[]=$ZZZk;}}if($b['shuffle']==true){shuffle($Zq);
}else{if($b['sortIndex'] !="none"){$ZZZu=$b['sortIndex'];$ZZZv=$b['sortOrder'];$Zq=ZZe ($Zq,$ZZZu,$ZZZv,true,false);$ZZb=ZZe ($ZZb,$ZZZu,$ZZZv,true,false);}}$o="";if($ZZZd=="xml"){$ZZZw=m(ZZZn($ZZx.slash.$ZZw));$ZZZx="";if($ZZZw){$ZZZx= ' image="'.$ZZZw.'"';}$o="<playlist$ZZZx>".newline;} else if($ZZZd=="json"){$ZZZy=array();$ZZZw=ZZZn($ZZx.slash.$ZZw);if($ZZZw){$ZZZy["cover"]=$ZZZw;}}else{$o="";}if($ZZZd=="json"){$ZZZy["items"]=array();}for($u=0; $u<sizeof($ZZb); $u++){if($ZZZd=="xml"){$o .='<item>'.newline;$o .=ZZp($ZZb[$u]);$o .="</item>".newline;} else if($ZZZd=="json"){$ZZZy["items"][]=ZZr( $ZZb[$u] );}else{$o .=$ZZb[$u]['file'].newline;}}$ZZZz=$b['limitFiles'];if($ZZZz>-1){$Zq=array_slice ($Zq,0,$ZZZz);}for($u=0; $u<sizeof($Zq); $u++){if($ZZZd=="xml"){$o .='<item>'.newline;$o .=ZZp($Zq[$u]);$o .="</item>".newline;} else if($ZZZd=="json"){$ZZZy["items"][]=ZZr( $Zq[$u] );}else{$o .=$Zq[$u]['file'].newline;}}if($ZZZd=="xml"){$o .="</playlist>";} else if($ZZZd=="json"){$o=html_entity_decode( htmlspecialchars( @json_encode( $ZZZy,ZZZZa | ZZZZb ),k,'UTF-8' ) );}if($b['urlStyle']==1){$o=Zh($o);}@clearstatcache();return $o;}function Zx($ZZZZc) {$ZZZZc=str_replace("\\","/",$ZZZZc);$ZZZZd=explode("/",$ZZZZc);$ZZZZe=array_pop($ZZZZd);$ZZZZf=explode(".",$ZZZZe);$ZZZZg=array_pop($ZZZZf);$ZZZZh=implode(".",$ZZZZf);$ZZZZi=join("/",$ZZZZd);$ZZZZj=array();$ZZZZj['filename']=$ZZZZe;$ZZZZj['ext']=$ZZZZg;$ZZZZj['extension']=$ZZZZg;$ZZZZj['basename']=$ZZZZh;$ZZZZj['basepath']=$ZZZZi;return $ZZZZj;}function ZZZs($ZZZZk){global $b,$c;if($b['getID3info'] && $c){if($b['getID3image']){$c->option_save_attachments=true;}else{$c->option_save_attachments=false;}$ZZZZl=$c->analyze(urldecode($ZZZZk));getid3_lib::CopyTagsToComments($ZZZZl);}else{$ZZZZl=array();}$o=array();if(sizeof($ZZZZl)>0){if(isset($ZZZZl['comments_html'])){$ZZZZm=@$ZZZZl['comments_html'];foreach($ZZZZm as $f=>$g){if($f=="comment"){$ZZZZn=@$ZZZZm["comment"][0];$ZZZZo=@$ZZZZm["encoded_by"][0];if($ZZZZo && (stristr ($ZZZZo,"itunes") !=false) ){$ZZZZn=@$ZZZZl["tags_html"]["id3v2"]["comment"][3];}$o["comment"]=$ZZZZn;}else{$o[$f]=@$g[0];}}}if(isset($ZZZZl['tags_html'])){if(isset($ZZZZl['tags_html']['id3v1'])){if(isset($ZZZZl['tags_html']['id3v1']['track'])){$o['index']=@$ZZZZl['tags_html']['id3v1']['track'][0];}}if(isset($ZZZZl['tags_html']['id3v2'])){if(isset($ZZZZl['tags_html']['id3v2']['comment'])){foreach($ZZZZl['tags_html']['id3v2']['comment'] as $f=>$g){if(is_string($g)){if(substr($g,0,4)=="http"){$o["link"]=$g;break;}}}}}}if(isset($ZZZZl['id3v2']['APIC'][0]['mime'])){$o['imageExists']=1;
}if($b['getID3image']){if(isset($ZZZZl['comments']['picture'][0]['data'])){$o['image']=$ZZZZl['comments']['picture'][0]['data'];$o['imageMime']=$ZZZZl['comments']['picture'][0]['image_mime'];}}}return $o;}function ZZZn($ZZZZp){$o="";$ZZZZq=array("png","jpg","PNG","JPG");for($u=0;$u<count($ZZZZq); $u++){$ZZZq=$ZZZZq[$u];$ZZZZr=$ZZZZp.".".$ZZZq;if (@is_file($ZZZZr)){$o=ZZZj($ZZZZr);break;}}return $o;}function ZZZZs($ZZZZt){global $Zd;$ZZZZu=x(rawurldecode($ZZZZt));$ZZZZv=$ZZZZu;if( substr($ZZZZu,0,4)=="http" ){$ZZZZv=$Zd['sys'].slash.substr($ZZZZu,strlen($Zd['www']),strlen($ZZZZu));} else if( substr($ZZZZu,0,1)=="/" ){$ZZZZv=$Zd['sysroot'].slash.$ZZZZv;} else if( substr($ZZZZu,0,1) !="/" ){$ZZZZv=$Zd['sys'].slash.$ZZZZv;}$ZZZZv=str_replace("//","/",$ZZZZv);return $ZZZZv;}function ZZZj($ZZZZw){global $Zd,$b;$ZZZZu=x($ZZZZw);$ZZZZv=$Zd['www'].substr($ZZZZu,strlen($Zd['sys']),strlen($ZZZZu));if($b['urlStyle']==1){$ZZZZv=Zh($ZZZZv);}return $ZZZZv;}function Zh($ZZZZt){global $Zd;$ZZZZw=str_replace($Zd['wwwroot'],"",$ZZZZt);return $ZZZZw;}function ZZZZx($ZZZZy,$ZZZZe,$ZZZZz) {if(@ini_get('zlib.output_compression')) {@ini_set('zlib.output_compression','Off');}header("Pragma: public",false);header("Expires: Thu,19 Nov 1981 08:52:00 GMT",false);header("Cache-Control: must-revalidate,post-check=0,pre-check=0",false);header("Cache-Control: no-store,no-cache,must-revalidate",false);header("Cache-Control: private",false);header("Content-Type: ".$ZZZZz);header("Content-Disposition: attachment; filename=\"$ZZZZe\"",false);header("Content-Transfer-Encoding: Binary",false);readfile ($ZZZZy);
exit;}function ZZZZZa($ZZZZZb){global $b;$ZZZZZc='<'.urldecode("%3F").'xml version="1.0" encoding="UTF-8"'.urldecode("%3F").'>';header("Pragma: public",false);header("Expires: Thu,19 Nov 1981 08:52:00 GMT",false);header("Cache-Control: must-revalidate,post-check=0,pre-check=0",false); header("Cache-Control: no-store,no-cache,must-revalidate",false);header("Content-Type: text/xml; charset=utf-8",false);if($b['allowCrossDomainAccess']){header('Access-Control-Allow-Credentials: true',false); header('Access-Control-Allow-Origin: *',false);header('Access-Control-Allow-Methods: GET,POST',false);header('Access-Control-Allow-Headers: Content-Type',false);}print ($ZZZZZc.$ZZZZZb);exit;}function ZZZZZd($ZZZZZe){global $b;header("Pragma: public",false);header("Expires: Thu,19 Nov 1981 08:52:00 GMT",false);header("Cache-Control: must-revalidate,post-check=0,pre-check=0",false);header("Cache-Control: no-store,no-cache,must-revalidate",false);header("Content-Type: text/plain; charset=utf-8");if($b['allowCrossDomainAccess']){header('Access-Control-Allow-Credentials: true',false); header('Access-Control-Allow-Origin: *',false);header('Access-Control-Allow-Methods: GET,POST',false);header('Access-Control-Allow-Headers: Content-Type',false);}print ($ZZZZZe);exit;}function ZZZZZf($ZZZZZg=false){global $ZZZZZh,$b,$c;if ( $ZZZZZh["i"] ){$b['getID3info']=true;if ( $ZZZZZh["j"] ){$b['getID3image']=true;}}if($b['getID3info']){$ZZZZZi='wimpy.getid3'.slash.'getid3.php';if (is_file($ZZZZZi)){require ($ZZZZZi);} else if(is_file('getid3.php')){require ('getid3.php');}else{$b['getID3info']=false;}}if($b['getID3info']){$c=new getID3;if($ZZZZZg){$c->option_save_attachments=true;}}}function ZZZZZj ($g) {if( substr($g,0,3)=="__1" ){return base64_decode( substr($g,3,strlen($g)) );}else{return $g;}}function ZZZZZk($j){$o=rawurldecode($j); $o=ZZZZZj($o);$o=rawurldecode($o); $o=stripslashes($o);$o=strip_tags($o);$o=str_replace("\\","x",$o);$o=str_replace("..","x",$o);$o=str_replace("./","x",$o);$o=str_replace("/.","x",$o);return $o;}function ZZZZZl(){header("HTTP/1.0 404 Not Found",false);print("<H1>404 Not Found</H1>");exit;}function ZZZZZm($ZZZZZn,$ZZZZZo) {$Zn=new ZZZZZp($ZZZZZn);$ZZZZZq=new ZZZZZr($Zn);$ZZZZZs=new ZZZZZt($ZZZZZq,$ZZZZZo,ZZZZZt::ZZZZZu);$ZZZZZv=array();foreach($ZZZZZs as $ZZZZy) {$ZZZZZv=array_merge($ZZZZZv,$ZZZZy);}return $ZZZZZv;}function ZZZZZw($ZZZZZo) {$ZZZZZs=glob($ZZZZZo);foreach (glob(dirname($ZZZZZo).slash.'*',ZZZZZx|ZZZZZy) as $Zn) {$ZZZZZs=array_merge($ZZZZZs,ZZZZZw($Zn.slash.basename($ZZZZZo),""));}return $ZZZZZs;}function ZZZZZz($ZZZZZo,$ZZZZZZa){$ZZv=ZZZZZw($ZZZZZo);foreach ($ZZv as &$j) {$j=$ZZZZZZa.slash.str_replace('.'.slash,"",$j);}return $ZZv;}function ZZZZZZb($ZZv){global $b;if($ZZv){if($b['playlistKind']=="xml"){ZZZZZa( $ZZv );}else{ZZZZZd( $ZZv );}}else{if($b['playlistKind']=="xml"){print("<playlist><item><title>ERROR</title></item></playlist>");}else{print("ERROR");}}exit;}$ZZZZZh["d"]=ZZZZZk( @$_REQUEST['d'] );$ZZZZZh["f"]=ZZZZZk( @$_REQUEST["f"] );$ZZZZZh["jj"]=ZZZZZk( @$_REQUEST["jj"] );$ZZZZZh["s"]=ZZZZZk( @$_REQUEST["s"] );$ZZZZZh["k"]=ZZZZZk( @$_REQUEST["k"] );$ZZZZZh["u"]=ZZZZZk( @$_REQUEST["u"] );$ZZZZZh["v"]=isset($_REQUEST["v"]) || array_key_exists("v",$_REQUEST);$ZZZZZh["o"]=isset($_REQUEST["o"]) || array_key_exists("o",$_REQUEST);$ZZZZZh["i"]=isset($_REQUEST["i"]) || array_key_exists("i",$_REQUEST);$ZZZZZh["j"]=isset($_REQUEST["j"]) || array_key_exists("j",$_REQUEST);if($ZZZZZh["k"]){if($ZZZZZh["k"]=="json"){$ZZZd="json";} else if($ZZZZZh["k"]=="xml"){$ZZZd="xml";} else if($ZZZZZh["k"]=="txt"){$ZZZd="txt";}$b['playlistKind']=$ZZZd;}if($ZZZZZh["u"]){if($ZZZZZh["u"]=="1"){$urlStyle=1;} else if($ZZZZZh["u"]=="2"){$urlStyle=2;}$b['urlStyle']=$urlStyle;}if($ZZZZZh["v"]){print $wimpyVersion;exit;} else if ($ZZZZZh["o"]){print "ok";exit;} else if ($ZZZZZh["s"]){ZZZZZf();$ZZZZZZc=$Zd['sys'];$ZZv=array();$ZZv['files']=ZZZZZz("*".$ZZZZZh["s"]."*.mp3",$ZZZZZZc);$ZZv['dirs']=array();$ZZZZZZd=ZZs($ZZZZZZc,false,$ZZv);ZZZZZZb($ZZZZZZd);ZZm($ZZZZZZd);} else if ($ZZZZZh["d"]){ZZZZZf();$ZZZZZZc=ZZZZs($ZZZZZh["d"]);if( file_exists ($ZZZZZZc) ){$ZZZZZZd=ZZs($ZZZZZZc,false);}else{$ZZZZZZd=null;}ZZZZZZb($ZZZZZZd);} else if ($ZZZZZh["f"]){$ZZZZZZe=$ZZZZZh["f"];$ZZZZZZf=Zx($ZZZZZZe);$ZZZZZZg=true;if( in_array ($ZZZZZZf['ext'],$b['media_types']) ){$ZZZZZZc=ZZZZs($ZZZZZZe);if( file_exists ($ZZZZZZc) ){$ZZZZZZg=false;ZZZZx($ZZZZZZc,$ZZZZZZf['filename'],"application/octet-stream");}}if($ZZZZZZg){ZZZZZl();}} else if ($ZZZZZh["jj"]){$ZZZZZZc=ZZZZs ( $ZZZZZh["jj"] );$ZZZZZZg=true;if( file_exists ($ZZZZZZc) ){$b['getID3info']=true;$b['getID3image']=true;ZZZZZf(true);$ZZZr=ZZZs($ZZZZZZc);if( isset($ZZZr["image"]) ){$ZZZZZZg=false;$ZZZZZZh=$ZZZr["image"];$ZZZZz=$ZZZr["imageMime"];header('Content-type: '.$ZZZZz);echo $ZZZZZZh;}else{$ZZZZZZi=ZZZn($Zd['sys'].slash.$b['coverartBasename']);if($ZZZZZZi){$ZZZZZZg=false;$ZZZZZZf=Zx($ZZZZZZi);header("Content-Type: image/".$ZZZZZZf['ext']);readfile($ZZZZZZi);}}}if($ZZZZZZg){ZZZZZl();}}else{ZZZZZf();if($b['playlistKind']=="xml"){ZZZZZa(ZZs($Zd['sys'],$findAllMedia,false));}else{ZZZZZd(ZZs($Zd['sys'],$findAllMedia,false));}}?>