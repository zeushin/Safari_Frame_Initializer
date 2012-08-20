<?php
/**
 * Examples for how to use CFPropertyList
 * Read an XML PropertyList
 * @package plist
 * @subpackage plist.examples
 */

// just in case...
error_reporting( E_ALL );
ini_set( 'display_errors', 'on' );

/**
 * Require CFPropertyList
 */
require_once(dirname(__FILE__).'/CFPropertyList.php');

/*
 * create a new CFPropertyList instance which loads the sample.plist on construct.
 * since we know it's an XML file, we can skip format-determination
 */
$plist = new CFPropertyList('/Users/masher/Library/Preferences/com.apple.Safari.plist', CFPropertyList::FORMAT_BINARY );
/*
 * retrieve the array structure of sample.plist and dump to stdout
 */

$arr = $plist->toArray();
/*
 * 'safari origin x, safari origin y, safari width, safari height, display width, display height'
 */
$arr['NSWindow Frame BrowserWindowFrame'] = '448 70 1024 988 0 0 1920 1058';

$td = new CFTypeDetector();
$structure = $td->toCFType($arr);

$plist = new CFPropertyList();
$plist->add($structure);

$plist->saveBinary('/Users/masher/Library/Preferences/com.apple.Safari.plist');

echo time() . "\n";

?>
