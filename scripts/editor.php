<script>

$(document).ready(function() {

    var editor = ace.edit("file_data");
    editor.setTheme("ace/theme/github");

    // set mode
    <?php switch (true)  {
            case preg_match("/\.js$/",$_REQUEST['path']):
                $mode = "javascript";
                break;
            case preg_match("/\.md$/",$_REQUEST['path']):
                $mode = "markdown";
                break;
            case preg_match("/\.yml$/",$_REQUEST['path']):
            case preg_match("/\.yaml$/",$_REQUEST['path']):
                $mode = "yaml";
                break;
            case preg_match("/^(inventory|ansible.cfg)$/",$_REQUEST['path']):
                $mode = "ini";
                break;
            default:
                $mode = false;
                break;
    }; ?>
    <?php if ($mode)  { ?>
    editor.getSession().setMode("ace/mode/<?php echo $mode;?>");
    <?php } ?>


    // Listener for changes, activate save button 
    file_dirty = false;
    $("#save_btn").hide();
    editor.getSession().on('change', function(e) {
        if (!file_dirty)  {
            file_dirty = true;
            $("#save_btn").show();
        }
    });

    $("#save_btn").on("click",function(){
        $(this).hide();

        $.post("/i/editor", 
               { path: "<?php echo $_REQUEST['path'];?>", action: 'save', data: editor.getValue() },
               function() {
                   file_dirty = false;
        });
    })


});

</script>

