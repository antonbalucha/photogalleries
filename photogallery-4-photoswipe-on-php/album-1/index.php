<?php
    session_start();
	if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == "logged") {
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Album of American Indians" />
		<meta name="keywords" content="Album, American Indians" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="UTF-8">
		
		<title>American Indians</title>
		<link rel="stylesheet prefetch" href="../photoswipe/4.1.1/photoswipe.min.css"></link>
		<link rel="stylesheet prefetch" href="../photoswipe/4.1.1/default-skin/default-skin.min.css"></link>
		<link rel="stylesheet" href="../photoswipe/style.css"></link>
		
		<!-- This style is for PHP discussion form. -->
		<style>
			.container {
				position: relative;
				font-family: Calibri, sans-serif, serif;
			}
			
			section {
				padding-left: 10px;
				border: 0px solid #CCC;
				height: 100%;
				margin-bottom: 10px;
			}
			
			#name {
				width: 300px;
			}
			
			#commentary {
				width: 298px;
			}
			
			.commentary_time {
				font-family: Calibri, sans-serif, serif;
				font-size: 9px;
			}
			
			.commentary_name {
				font-family: Calibri, sans-serif, serif;
				font-weight: bold;
				margin-top: 10px;
			}
			
			.commentary_post {
				font-family: Calibri, sans-serif, serif;
				margin-right: 10px;
				margin-left: 10px;
			}
		</style>
	</head>

	<body>
	
		<div class="container">
			
			<section>
				<div class="my-gallery" itemscope itemtype="american-indians-1">
					<figure itemprop="associatedMedia" itemscope itemtype="american-indians-1">
						<a href="./indian-1.jpg" itemprop="contentUrl" data-size="1200x1600">
							<img src="./indian-1-thumb.jpg" itemprop="thumbnail" alt="American Indian 1" />
						</a>
						<figcaption itemprop="caption description">American Indian 1</figcaption>
					</figure>
					
					<figure itemprop="associatedMedia" itemscope itemtype="american-indians-1">
						<a href="./indian-2.jpg" itemprop="contentUrl" data-size="1180x787">
							<img src="./indian-2-thumb.jpg" itemprop="thumbnail" alt="American Indian 2" />
						</a>
						<figcaption itemprop="caption description">American Indian 2</figcaption>
					</figure>
					
					<figure itemprop="associatedMedia" itemscope itemtype="american-indians-1">
						<a href="./indian-3.jpg" itemprop="contentUrl" data-size="793x1024">
							<img src="./indian-3-thumb.jpg" itemprop="thumbnail" alt="American Indian 3" />
						</a>
						<figcaption itemprop="caption description">American Indian 3</figcaption>
					</figure>
					
					<figure itemprop="associatedMedia" itemscope itemtype="american-indians-1">
						<a href="./indian-4.jpg" itemprop="contentUrl" data-size="736x953">
							<img src="./indian-4-thumb.jpg" itemprop="thumbnail" alt="American Indian 4" />
						</a>
						<figcaption itemprop="caption description">American Indian 4</figcaption>
					</figure>
					
					<figure itemprop="associatedMedia" itemscope itemtype="american-indians-1">
						<a href="./indian-5.jpg" itemprop="contentUrl" data-size="742x960">
							<img src="./indian-5-thumb.jpg" itemprop="thumbnail" alt="American Indian 5" />
						</a>
						<figcaption itemprop="caption description">American Indian 5</figcaption>
					</figure>
					
					<figure itemprop="associatedMedia" itemscope itemtype="american-indians-1">
						<a href="./indian-6.jpg" itemprop="contentUrl" data-size="494x640">
							<img src="./indian-6-thumb.jpg" itemprop="thumbnail" alt="American Indian 6" />
						</a>
						<figcaption itemprop="caption description">American Indian 6</figcaption>
					</figure>
					
					<figure itemprop="associatedMedia" itemscope itemtype="american-indians-1">
						<a href="./indian-7.jpg" itemprop="contentUrl" data-size="409x576">
							<img src="./indian-7-thumb.jpg" itemprop="thumbnail" alt="American Indian 7" />
						</a>
						<figcaption itemprop="caption description">American Indian 7</figcaption>
					</figure>
					
					<figure itemprop="associatedMedia" itemscope itemtype="american-indians-1">
						<a href="./indian-8.jpg" itemprop="contentUrl" data-size="650x873">
							<img src="./indian-8-thumb.jpg" itemprop="thumbnail" alt="American Indian 8" />
						</a>
						<figcaption itemprop="caption description">American Indian 8</figcaption>
					</figure>
				</div>
			</section>
			
			<!-- This <section> tag is part of discussion form in PHP and can be deleted when you are interested only on photogallery -->
			<section>
			
				<form action="discussion.php" method="post">
					<table>
						<tr>
							<td>
								<label for="name">Meno</label>
							</td>
							<td>
								<input type="text" id="name" name="name" size="64" maxlength="64"><br/>
							</td>
						</tr>
						<tr>
							<td>
								<label for="commentary">Komentár</label>
							</td>
							<td>
								<textarea id="commentary" name="commentary" rows="5" size="512" maxlength="512"></textarea><br/>
							</td>
						</tr>
						<tr>
							<td>
								&nbsp;
							</td>
							<td>
								<input type="submit">
							</td>
					</table>					
				</form>
				
				<?php
					$myfile = fopen("discussion.txt", "r") or die("Unable to open file!");
					echo "<table>";
					while(!feof($myfile)) {
						$line = fgets($myfile);
						if (!empty($line)) {
							
							echo "<tr>";
							
								$parts = explode(";;;", $line);
								
								echo "<td>";
									$parts[1] = str_replace("\"", "", $parts[1]);
									$parts[1] = cleanXss($parts[1]);
									echo "<div class=\"commentary_name\">" . $parts[1] . "</div>";
																								
									$parts[0] = str_replace("\"", "", $parts[0]);
									$parts[0] = cleanXss($parts[0]);
									echo "<div class=\"commentary_time\">" . $parts[0] . "</div>";
								echo "</td>";
								
								echo "<td>";
									$parts[2] = str_replace("\"", "", $parts[2]);
									$parts[2] = cleanXss($parts[2]);
									echo "<div class=\"commentary_post\">" . $parts[2] . "</div>";
								echo "</td>";

							echo "</tr>";
						}
					}
					echo "</table>";
										
					fclose($myfile);
				?>
			</section>
		</div>
		

		<!-- Root element of PhotoSwipe. Must have class pswp. -->
		<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

			<!-- Background of PhotoSwipe. 
				 It's a separate element, as animating opacity is faster than rgba(). -->
			<div class="pswp__bg"></div>

			<!-- Slides wrapper with overflow:hidden. -->
			<div class="pswp__scroll-wrap">

				<!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
				<!-- don't modify these 3 pswp__item elements, data is added later on. -->
				<div class="pswp__container">
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
				</div>

				<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
				<div class="pswp__ui pswp__ui--hidden">

					<div class="pswp__top-bar">

						<!--  Controls are self-explanatory. Order can be changed. -->

						<div class="pswp__counter"></div>

						<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

						<button class="pswp__button pswp__button--share" title="Share"></button>

						<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

						<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

						<!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
						<!-- element will get class pswp__preloader--active when preloader is running -->
						<div class="pswp__preloader">
							<div class="pswp__preloader__icn">
							  <div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							  </div>
							</div>
						</div>
					</div>

					<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
						<div class="pswp__share-tooltip"></div> 
					</div>

					<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
					</button>

					<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
					</button>

					<div class="pswp__caption">
						<div class="pswp__caption__center"></div>
					</div>

				  </div>

				</div>

		</div>
		
		<script src='../photoswipe/4.1.1/photoswipe.min.js'></script>
		<script src='../photoswipe/4.1.1/photoswipe-ui-default.min.js'></script>
		<script src="../photoswipe/index.js"></script>

	</body>
</html>

<?php
	} else {
		header("Location: ./../unauthorized.php");
	}
	
	function cleanXss($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
