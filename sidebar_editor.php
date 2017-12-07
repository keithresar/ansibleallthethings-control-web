<?php

$GLOBALS['SCRIPTS_ARR']['/js/sidebar_editor_new_file.js'] = true;



function ProcessDirectory($path)
{
    $blob = "";

    $files = preg_grep('/^([^.])/', scandir($path)); 
    
    foreach ($files as $file)  {
        if (preg_match("/^\..*/",$file))  continue;
        if (preg_match("/\.retry*/",$file))  continue;

        $file_f = preg_replace("/[^a-z0-9\.\-_]/","_",strtolower($file));
        $full_path = sprintf("%s/%s",$path,$file);

        if (is_dir(sprintf("%s/%s",$path,$file)))  {
            $blob[] = "
                    <a class='nav-link' data-toggle='collapse' style='padding: 0 1rem;' href='#sidebar_".$file_f."'>
                      <i class='fa fa-folder' aria-hidden='true'></i>
                      ".$file."/</a>
                    <div class='collapse' id='sidebar_".$file_f."' style='margin-left: 1em;'>
                      <ul class='nav nav-pills flex-column' style='margin-bottom:0;'>
                ";
            $blob[] = ProcessDirectory($full_path);
            $blob[] = "
                        <li class='nav-item'>
                          <a class='nav-link add_item' data-path='".$full_path."' style='padding: 0 1rem; color:gray;font-style:italic;' href='#'>+ new file</a>
                        </li>
                      </ul>
                    </div><!-- end ".$file_f." -->
                ";
        }
        else  $blob[] = "
                    <li class='nav-item'>
                      <a class='nav-link ".($_REQUEST['path']==$full_path?'active':'')."' style='padding: 0 1rem;' href='/i/editor/?path=".urlencode($full_path)."'>⌞ ".$file."</a>
                    </li>
                ";
    }

    return(join("\n",$blob));
}


?>
<nav class="col-sm-3 col-md-3 d-none d-sm-block bg-light sidebar">

  <a class='nav-link' data-toggle='collapse' style='padding: 0 1rem;' href='#sidebar_root'>
    <i class='fa fa-folder' aria-hidden='true'></i>
    ~
  </a>
  <div class='_collapse' id='sidebar_root' style='margin-left: 1em;'>
    <ul class='nav nav-pills flex-column' style='margin-bottom:0;'>
  <?php 
        echo ProcessDirectory(sprintf("/home/%s",$_SESSION['user']));
  ?>
      <li class='nav-item'>
        <a class='nav-link add_item' data-path='/home/<?php echo $_SESSION['user'];?>' style='padding: 0 1rem; color:gray;font-style:italic;' href='#'>+ new file</a>
      </li>
    </ul>
  </div><!-- end root -->


</nav>



<div class="modal fade" id="filename_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Name of New File to Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <span id="path"></span>
          <input type="text" id="filename" placeholder="filename.yml" autocomplete="off">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="create_file_btn" class="btn btn-primary">Create File</button>
      </div>
    </div>
  </div>
</div>




