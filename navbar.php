    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">Ansible Workshop</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo preg_match("/^editor/",$_REQUEST['pn'])?'active':'';?>">
              <a class="nav-link" href="/i/editor">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Online Editor
              </a>
            </li>
            <li class="nav-item <?php echo preg_match("/^terminal/",$_REQUEST['pn'])?'active':'';?>">
              <a class="nav-link" href="http://<?php echo preg_replace("/:\d+/",":8080",$_SERVER['HTTP_HOST']);?>/ssh/host/127.0.0.1" target="_blank">
                <i class="fa fa-terminal" aria-hidden="true"></i>
                Terminal Session
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

