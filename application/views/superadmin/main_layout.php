<!doctype html>
<html lang="en">
<head>
<title><?=$title;?></title>
<?php 
    $this->load->view('head'); 
    //print_r($this->session->userdata());
?>
</head>
<body style="overflow-y: hidden;">
    <div class="wrapper">
        <div class="sidebar" style="height:120%" data-active-color="maroon" data-background-color="white" >
            <!--
                Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
                Tip 2: you can also add an image using data-image tag
                Tip 3: you can change the color of the sidebar with data-background-color="white | black"
            -->
            <div class="logo">
                <?php 
                    echo '<center>Admin Panel</center>';
                ?>
            </div>
            <div class="logo logo-mini">
                <center><img class="img  img-responsive" style="width:50px" src="<?=base_url()?>'main_asset/assets/img/my school solution logo.jpg" alt="Logo"></center>
            </div>

        <?php 
            $this->load->view('sidebar/superadmin');
        ?>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolut" style="margin-bottom:10px;">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse nav navbar-nav navbar-right">
                        <ul class="nav navbar-nav navbar-right">
                            <center>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <?php
                                          
                                            $superadmin = base_url().'main_asset/school_docs/superadmin';
                                            //$src = $superadmin.'/'.$this->session->loginuserphoto;
                                            $src = $superadmin.'/default.png';
                                        ?>
                                        <img class="img img-thumbnail" style="width:50px" src="<?=$src?>" />
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Profile</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('admin/logout')?>">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </center>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <?php 
                $this->load->view($subview); 
            ?>
           
        </div>
    </div>
</body>
<?php 
    $this->load->view('script'); 
    $src = base_url('main_asset/assets/superapp_js/').$app_script;
    echo "<script src='".$src."'></script>";
    if($script)
        $this->load->view($script);
?>
</html>