<!DOCTYPE HTML>
<html>
<head>
<title>Social Healing</title>
<link rel="stylesheet" href="<?php echo base_url() ?>styles/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>styles/css/bootstrap-responsive.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>styles/css/style.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>styles/css/post.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>styles/css/jquery-ui-1.8.20.custom.css" type="text/css">

<script src="<?php echo base_url() ?>styles/js/jqueryy.js"></script>
<script src="<?php echo base_url() ?>styles/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>styles/js/bootstrap-carousel.js"></script>
<script src="<?php echo base_url() ?>styles/js/jquery.ui.core.js"></script>
<script src="<?php echo base_url() ?>styles/js/jquery.ui.datepicker.js"></script>
<script src="<?php echo base_url() ?>styles/js/jquery.ui.widget.js"></script>
<script type="text/javascript">
   $(function() {
           $("#startdate").datepicker({ dateFormat: "yy-mm-dd" ,minDate: +1, maxDate: "+1M +10D" }).val()
   });

       $(function() {
           $("#enddate").datepicker({ dateFormat: "yy-mm-dd" ,minDate: +2, maxDate: "+1M +10D" }).val()
   });
    $(document).ready(function() {
    $("#datepicker").datepicker();
  });
   </script> 
</head>
<body>
   <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <div class="nav-collapse">
          <ul class="nav">
            <li class="active"><a href="<?php echo base_url() ?>home">Home</a></li>
            <li><a href="<?php echo base_url() ?>about">About us</a></li>
            <li><a href="<?php echo base_url() ?>contact">Contact us</a></li>
            <li><a href="<?php echo base_url() ?>events">Events</a></li>
          </ul>
          <ul class="nav pull-right">
            <form action="" class="navbar-search pull-left">
            <input type="text" placeholder="Search" class="search-query span2">
            </form>
            <li><a href="<?php echo base_url() ?>map">Geo RSS</a></li>
            <li class="divider-vertical"></li>
            <?php if(! $this->session->userdata('validated')){
                $this->load->view('users/notlogged');
            }
            else{
                $this->load->view('users/logged');
            }
            ?> 
          </ul>
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
    </div>

<div class="container">

  <div class="row">
      <div class="span12">
        <header class="jumbotron subhead" id="overview">
        <img alt="" src="<?php echo base_url()?>images/social.png" width="700" height="100">
        </header>
      </div>
      <div class="span12">
         <div class="navbar">
        <div class="navbar-inner-m">
          <div class="container">
            <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
          <div class="nav-collapse">
           <ul class="nav">
             <li class="dropdown">
                   <a data-toggle="dropdown" class="dropdown-toggle" href="#">Crime<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?php foreach ($crime as $cr) : ?>
                   <li><a href="<?php echo base_url() ?>post/postcat/<?php echo $cr->category_id; ?>" title="<?php echo $cr->name; ?>"><?php echo $cr->name; ?></a></li>
                    <?php endforeach;  ?>
                  </ul>
              </li>
             <li class="dropdown">
                   <a data-toggle="dropdown" class="dropdown-toggle" href="#">Politics<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?php foreach ($politics as $pl) : ?>
                   <li><a href="<?php echo base_url() ?>post/postcat/<?php echo $pl->category_id; ?>" title="<?php echo $pl->name; ?>"><?php echo $pl->name; ?></a></li>
                  <?php endforeach;  ?>
                  </ul>
              </li>
             <li class="dropdown">
                   <a data-toggle="dropdown" class="dropdown-toggle" href="#">Religion<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                     <?php if(isset($religion)) : foreach ($religion as $rl) : ?>
                   <li><a href="<?php echo base_url() ?>post/postcat/<?php echo $rl->category_id; ?>" title="<?php echo $rl->name; ?>"><?php echo $rl->name; ?></a></li>
                  <?php endforeach;  ?>
                  </ul>
                <?php else : ?>
              <?php endif ; ?>
              </li>
            <li class="dropdown">
                   <a data-toggle="dropdown" class="dropdown-toggle" href="#">Resource Distribution<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                     <?php if(isset($resdis)) : foreach ($resdis as $rl) : ?>
                   <li><a href="<?php echo base_url() ?>post/postcat/<?php echo $rl->category_id; ?>" title="<?php echo $rl->name; ?>"><?php echo $rl->name; ?></a></li>
                     <?php endforeach;  ?>
                  </ul>
                <?php else : ?>
              <?php endif ; ?>
              </li>
           <li class="dropdown">
                   <a data-toggle="dropdown" class="dropdown-toggle" href="#">Tribal Conflict<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?php if(isset($tricon)) : foreach ($tricon as $rl) : ?>
                   <li><a href="<?php echo base_url() ?>post/postcat/<?php echo $rl->category_id; ?>" title="<?php echo $rl->name; ?>"><?php echo $rl->name; ?></a></li>
                    <?php endforeach;  ?>
                  </ul>
                <?php else : ?>
              <?php endif ; ?>
              </li>
           <li class="dropdown">
                   <a data-toggle="dropdown" class="dropdown-toggle" href="#">Natural hazard<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?php if(isset($natharz)) : foreach ($natharz as $rl) : ?>
                   <li><a href="<?php echo base_url() ?>post/postcat/<?php echo $rl->category_id; ?>" title="<?php echo $rl->name; ?>"><?php echo $rl->name; ?></a></li>
                    <?php endforeach;  ?>
                  </ul>
                <?php else : ?>
              <?php endif ; ?>
              </li>
             <li class="dropdown">
                   <a data-toggle="dropdown" class="dropdown-toggle" href="#">Wars<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?php if(isset($wars)) : foreach ($wars as $rl) : ?>
                   <li><a href="<?php echo base_url() ?>post/postcat/<?php echo $rl->category_id; ?>" title="<?php echo $rl->name; ?>"><?php echo $rl->name; ?></a></li>
                    <?php endforeach;  ?>
                  </ul>
                <?php else : ?>
              <?php endif ; ?>
              </li>
            <li class="dropdown">
                   <a data-toggle="dropdown" class="dropdown-toggle" href="#">Others<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?php if(isset($wars)) : foreach ($others as $rl) : ?>
                   <li><a href="<?php echo base_url() ?>post/postcat/<?php echo $rl->category_id; ?>" title="<?php echo $rl->name; ?>"><?php echo $rl->name; ?></a></li>
                    <?php endforeach;  ?>
                  </ul>
                <?php else : ?>
              <?php endif ; ?>
              </li>
          </ul>
         </div>
        </div>
      </div>
    </div>
   </div>
  </div>
      <!-- Main hero unit for a primary marketing message or call to action -->
  <div class="row-fluid">
      <div class="span8">