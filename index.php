<?php 

// include('database/db.php');
include("controllers/products/topics.php");

$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_GET['t_id'])) {
	$posts = getPostByTopicId($_GET['t_id']);
	$postsTitle ="You searched for posts under '" . $_GET['name'] . "'";
} else if (isset($_POST['search-term'])) {
	$postsTitle ="You searched for '" . $_POST['search-term'] . "'";
	$posts =searchPosts($_POST['search-term']);
} else {
	$posts = getPublishedPosts();		
}


if (isset($_POST['search'])) {

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!--fONT Awesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

	<!--goggle fonts-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	
	<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Merriweather&display=swap" rel="stylesheet">

	<!--style,css-->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<title>Blog</title>

	<!--
                             ,
                             B
                            BMB.
                          3BBBMBX
                       .PMBMBMBMBBD,
                     7MBMBMBMBMBMBMBMs
                  :EBMBMBMBMx iMBMBMBMBO:
                7BMBMBBBMBJ     vBBBBBMBMBs
              xMBMBBBMBH,    .    .UBMBMBMBBF
 .          .BMBBBMBX:      :Br      .FBMBMBBB:
 LR;,.:rUOBMBMBMBM;       ;MBMBBr       :OBMBMBBBRSr:.,:EU
  MBMBMBBBMBMBMM.      :0BMBBEMBMBD:       WMBBBMBMBMBMBM
  HMB.::.  BBMc     .HBMBMBK   FBBBMBZ,     ;BBB  .::.BBM
  MBM      UMP    .BMBMBZ:       ,HBMBMB:    LBM      MBM
  BBB   BMBMBr   cBMBW:     0BM     .0BMBF   .BMBMB   BMB:
 WBBx   cBL.iB   BMR     cMBM1MBM3     PMB   M7,;BK   ;BMB
 MBM    BM:  .J  BB    RBMB;   :RMBM    RM  c:   MB    MBM
:BM7    BB     , ,M   MBr         ;BM   Or .     BM:   :MBi
:MB,   7B7        .i  B             B  ::        :BS    BM
 BMG    BK             :           .,            cM:   2MB
  BMH   .Mi     : :                 E:          :M:   sMB
   ;MRui  ;:.   :Fui:;  :;;7i   .;;;rS:,  rr   ,:  :7EO:
        ::::::,   .UUi:77;::37s7Lv7;  ,;3SD,....:;;,
     BM: ..:i7rJLxS:  .      rs: 7   ..;LxxUWRFU;::7OW
      S2r:::iis0r;J3Or.:rvLi:::rBL.  .:;,  .   :ri:.,
                    .ZL. .:L;,r7;i7r;7:
                            xMc     ,
                           :. 3v
                           :S  ;
                            LB;
                             7
-->
</head>
<body>
	
	<?php include("views/partials/nav.php"); ?>
	<?php include("views/partials/messages.php"); ?>
		
	<div class="page-wrapper">
		<div class="post-slider">
			<h1 class="slider-title">Trending Post</h1>
			<i class="far fa-chevron-left prev"></i>
			<i class="far fa-chevron-right next"></i>


			<div class="post-wrapper">
				<?php foreach ($posts as $post): ?>
					<div class="post">
						<img src="<?php echo 'assets/img' . $post['image']; ?>" alt="" class="slider-image">
						<div class="post-info">
							<h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
							<i class="far fa-user"><?php echo $post['username']; ?></i>
							<i class="far fa-calendar"><?php echo date('F j, Y', strtotime($post['create_at'])); ?></i>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>	

	</div>

	<div class="content clearfix">


		<div class="main-content">
			<h1 class="recent-post-title"><?php echo $postsTitle; ?></h1>

			<?php foreach ($posts as $post): ?>
				<div class="post clearfix">
					<img src="<?php echo 'assets/img' . $post['image']; ?>" alt="" class="post-image">
					<div class="post-preview">
						<h2><a href="single.html"><?php echo $post['title']; ?></a></h2>
						<i class="far fa-user"><?php echo $post['username']; ?></i>
						&nbsp;
						<i class="far calender"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
						<p class="preview-text">
							<?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
						</p>
						<a href="single.php?id<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
					</div>
				</div>
			<?php endforeach; ?>	

				

			<!-- <div class="post clearfix">
				<img src="assets/img/dab.gif" alt="" class="post-image">
				<div class="post-preview">
					<h2><a href="single.php">The Strongest and sweetest song yet remain to be sung</a></h2>
					<i class="far fa-user">Fenis Banana</i>
					&nbsp;
					<i class="far calender">Mar 11, 2021</i>
					<p class="preview-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					.</p>
					<a href="single.php" class="btn read-more">Read More</a>
				</div>
			</div>

			<div class="post clearfix">
				<img src="assets/img/dab.gif" alt="" class="post-image">
				<div class="post-preview">
					<h2><a href="single.php">The Strongest and sweetest song yet remain to be sung</a></h2>
					<i class="far fa-user">Fenis Banana</i>
					&nbsp;
					<i class="far calender">Mar 11, 2021</i>
					<p class="preview-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					.</p>
					<a href="single.php" class="btn read-more">Read More</a>
				</div>
			</div>

			<div class="post clearfix">
				<img src="assets/img/dab.gif" alt="" class="post-image">
				<div class="post-preview">
					<h2><a href="single.php">The Strongest and sweetest song yet remain to be sung</a></h2>
					<i class="far fa-user">Fenis Banana</i>
					&nbsp;
					<i class="far calender">Mar 11, 2021</i>
					<p class="preview-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					.</p>
					<a href="single.php" class="btn read-more">Read More</a>
				</div>
			</div> -->
		</div>

		<div class="sidebar">
			<div class="section search">
				<h2 class="section title"><?php echo $postsTitle ?></h2>
				<form action="index.html" method="post">
					<input type="text" name="search-term" class="text-input" placeholder="Search...">
				</form>	
			</div>

			<div class="section topics">
				<h2 class="section-title">Topics</h2>
				<ul>
					<?php foreach ($topics as $key => $topic): ?>
						<li><a href="<?php echo 'index.php?_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
					<?php endforeach; ?>

				

					<!--<li><a href="#">Qoutes</a></li>
					<li><a href="#">Fiction</a></li>
					<li><a href="#">Biography</a></li>
					<li><a href="#">Motivation</a></li>
					<li><a href="#">Inpiration</a></li>
					<li><a href="#">Life Lessons</a></li> -->
				</ul>
			</div>
		</div>
	</div>

	<?php include("views/partials/footer.php"); ?>
	


	<!--JQuery-->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>				


	<!-- Slick Carousel -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
				

	<!--Custom Script-->
	<script type="js/script.js"></script>
</body>
</html>