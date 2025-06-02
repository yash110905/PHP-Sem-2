<?php
//before i  include the header i will add my values to the page title and descripyion
  $pageDesc ="This page is our first page.";
  $pageTitle ="First Page | Week 2";
  require './includes/header.php';

?>
<section class="main-masthead">
    <div class = "mask">
        <h1>Week 2 - Connecting to a database & Templating</h1>
    </div>    
</section>
<div class= "row">
    <main class="col-sm-12 col-md-9 col-lg-8">
    <?php
      include  './includes/templateOne.php';
      include  './includes/templateTwo.php';
    ?>
    </main>
    <?php
      include './includes/sidebar.php';
    ?>
</div>
<?php 
  require './includes/footer.php';
?>