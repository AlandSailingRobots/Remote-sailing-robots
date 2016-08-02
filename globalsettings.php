/****************************************************************************************
 *
 * Purpose:
 *      Provides global server settings (and potentially other things in the future).
 *      Make sure you include it in all pages that might need it (e.g. database handlers).
 *      The commented lines are for hostǵator so if you make any changes that you have to push
 *      up there, make sure you reverse the commenting.
 *
 * Developer Notes:
 *
 *
 ***************************************************************************************/

<?php

    $GLOBALS['server'] = "http://localhost/Remote-sailing-robots/";
    //$GLOBALS['server'] = "http://www.sailingrobots.com/testdata/";
    $GLOBALS['username'] = 'root';
    //$GLOBALS['username'] = 'ithaax_testdata';
    $GLOBALS['password'] = '';
    //$GLOBALS['password'] = 'test123data';
?>
