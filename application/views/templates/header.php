<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo isset($title) ? $title : "CI"; ?></title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/app.css') ?>">


        <script>
            var BASE_URL = "<?php echo base_url(); ?>";
            var pathname_array = window.location.pathname.split('/');
            var PROJECT_BASE = pathname_array[1];
            if (PROJECT_BASE == undefined || PROJECT_BASE == "") {
                PROJECT_BASE = "bizcase";
            }
        </script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="my-navigation">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><h3>Logo</h3></div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <a href="<?php echo base_url('welcome/c1') ?>" class="ajax-view" data-title="content1">Content1</a> | 
                    <a href="<?php echo base_url('welcome/c2') ?>" class="ajax-view" data-title="content2">Content2</a> | 
                    <a href="<?php echo base_url('welcome/c3') ?>" class="ajax-view" data-title="content3">Content3</a> |
                    <a href="<?php echo base_url('welcome/form1') ?>" class="ajax-view" data-title="form1">Form1</a> 
                    
                </div>
            </div>
        </div>
        <hr/>

        <div class="row">
            <div class="col-lg-12">
                <div id="success-block" class="alert alert-success alert-dismissible fade in <?php echo $this->session->flashdata('success_message') == "" ? "hidden" : "" ?>" role="alert">
<!--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>-->
                    <span id="success-message">
                        <?php if ($this->session->flashdata('success_message') != "") { ?>
                            <?php echo $this->session->flashdata('success_message'); ?>
                        <?php } ?>
                    </span>
                </div>
            </div>
        </div>


        <div id="my-content">