<?php



	if ($page == "album") {

		require_once "lib/albums.php";

		if (isset($_GET["album"])) {

			$album_current = $_GET["album"];

		}

		else {

			$album_current = "portfolio";

		};

		$target = $album[$album_current];

	};





	function index_featured ($array) {

		for ($i = 0; $i < count($array); $i++) {

			$type = $array[$i][0];
			$image = $array[$i][1];
			$title = $array[$i][2];
			$subtitle = $array[$i][3];
			$link = $array[$i][5];

			if ($type == "work") {

				echo '

					<article class="work">

						<div class="featured-image"><a href="' . $link . '"><img src="' . $image . '" alt="" /></a></div>

						<div class="featured-content">

							<h2><a href="' . $link . '">' . $title . '</a></h2>
							<h3>' . $subtitle . '</h3>

							<a class="featured-link" href="' . $link . '">View More</a>

						</div>

						<div class="cf"></div>

					</article>

				';

			}

			else if ($type == "photo") {

				echo '

					<article class="photo">

						<a href="' . $link . '">

							<div class="featured-caption">

								<h2>' . $title. '</h2>
								<h3>' . $subtitle . '</h3>

							</div>

							<img src="' . $image . '" alt="" />

						</a>

					</article>

				';

			};

		};


	};














	function work_list ($array) {

		for ($i = 0; $i < count($array); $i++) {

			$type = $array[$i][0];
			$image = $array[$i][1];
			$title = $array[$i][2];
			$subtitle = $array[$i][3];

			if ($type == "work") {

				$responsibilities = $array[$i][4];
				$technology = $array[$i][5];
				$timeframe = $array[$i][6];

				$search = strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $title . " " . $subtitle . " " . $responsibilities . " " . $technology));

				$link = $array[$i][7];

				echo '

					<article class="work-item webdesign" data-search="' . $search . '">

						<div class="image"><a href="' . $link . '"><img src="' . $image . '" alt="" /></a></div>

						<div class="details">

							<h2><a href="' . $link . '">' . $title . '</a></h2>
							<h3>' . $subtitle . '</h3>

							<ul>
								<li><span>Responsibilities:</span> ' . $responsibilities . '</li>
								<li><span>Technology:</span> ' . $technology . '</li>
								<li><span>Timeframe:</span> ' . $timeframe . '</li>
							</ul>

							<a class="view" href="' . $link . '">View Project</a>

							<div class="cf"></div>

						</div>

					</article>

				';

			}

			else if ($type == "photo") {

				$search = strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $title . " " . $subtitle));

				$link = $array[$i][4];

				echo '

					<article class="work-item photo" data-search="' . $search . '">

						<div class="image"><a href="' . $link . '"><img src="' . $image . '" alt="" /></a></div>

						<div class="details">

							<h2><a href="' . $link . '">' . $title . '</a></h2>
							<h3>' . $subtitle . '</h3>

							<a class="view" href="' . $link . '">View Album</a>

							<div class="cf"></div>

						</div>

					</article>

				';

			};

		};






	};




















	function project_preview ($array) {

		echo '

			<div class="project-preview">

				<img src="' . $array[0] . '" class="project-preview-large" alt="" />
				<img src="' . $array[1] . '" class="project-preview-medium" alt="" />
				<img src="' . $array[2] . '" class="project-preview-small" alt="" />

			</div>

		';

	};


?>