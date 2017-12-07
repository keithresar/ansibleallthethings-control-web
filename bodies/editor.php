<?php


$GLOBALS['SCRIPTS_ARR']['/js/sidebar_expand.js'] = true;
$GLOBALS['SCRIPTS_ARR']['https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.9/ace.js'] = true;


// TODO - show formated in textarea
// TODO - monitor for changes, indicate a changed state
// TODO - add saved button

?>

<h1 class="pull-left">
  <i class="fa fa-file-code-o" aria-hidden="true"></i>
  <?php echo preg_replace("/^\/home\/student\d+\//","",$_REQUEST['path']);?>
</h1>
<button type="button" class="btn btn-primary pull-right" id="save_btn">
  <i class="fa fa-floppy-o" aria-hidden="true"></i>
  Save
</button>
<br style="clear:both;">

<!-- <hr> -->

<div id="file_data" style="height: 50em; width: 100%;"><?php echo $GLOBALS['file_data'];?></div>


