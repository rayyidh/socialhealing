<!DOCTYPE HTML>
<html>
<head>
<title>Social Healing</title>
<link rel="stylesheet" href="<?php echo base_url() ?>styles/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>styles/css/bootstrap-responsive.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>styles/css/jquery-ui-1.8.20.custom.css" type="text/css">

<script src="<?php echo base_url() ?>styles/js/jqueryy.js"></script>
<script src="<?php echo base_url() ?>styles/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>styles/js/script.js"></script>
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
       
   </script> 
</head>
<body>
   <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <div class="nav-collapse">
          <ul class="nav">
            <li class="active"><a href="<?php echo base_url() ?>index.php/admin/home">Home</a></li>
            <li><a href="<?php echo base_url() ?>admin/about">About us</a></li>
            <li><a href="<?php echo base_url() ?>admin/contact">Contact us</a></li>
            <li class="dropdown">
                   <a data-toggle="dropdown" class="dropdown-toggle" href="#">News<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?php foreach ($parent as $cr) : ?>
                   <li><a href="<?php echo base_url() ?>news/admin/newscat/<?php echo $cr->category_id; ?>" title="<?php echo $cr->name; ?>"><?php echo $cr->name; ?></a></li>
                    <?php endforeach;  ?>
             </ul>
              </li>
            <li><a href="<?php echo base_url() ?>index.php/admin/events">Events</a></li>
          </ul>
          <ul class="nav pull-right">
            <form action="" class="navbar-search pull-left">
            <input type="text" placeholder="Search" class="search-query span2">
            </form>
            <li><a href="#">RSS</a></li>
            <li class="divider-vertical"></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
    </div>
  <div class="container">
    <div class="row">
      <div class="span12">
      <header class="jumbotron subhead" id="overview">
        <p><strong>Quotes of the day ==> </strong> Peace is happiness.</p>
        <BR>
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
              <li><a href="<?php echo base_url() ?>index.php/admin/category" title="Sub Nav Link 1">Categories</a></li>
              <li><a href="<?php echo base_url() ?>index.php/admin/post" title="Sub Nav Link 1">Posts</a></li>
              <li><a href="<?php echo base_url() ?>index.php/admin/events" title="Sub Nav Link 1">Events</a></li>
              <li><a href="<?php echo base_url() ?>index.php/admin/members" title="Sub Nav Link 1">Members</a></li>
              <li><a href="<?php echo base_url() ?>index.php/admin/comment" title="Sub Nav Link 1">Comment</a></li>
              <li><a href="<?php echo base_url() ?>index.php/admin/quotes" title="Sub Nav Link 1">Quotes</a></li>
              <li><a href="#" title="Sub Nav Link 1">County</a></li>
          </ul>
         </div>
        </div>
      </div>
    </div>
   </div>
  </div>
      <!-- Main hero unit for a primary marketing message or call to action -->
<div class="row">
    <div class="span7">