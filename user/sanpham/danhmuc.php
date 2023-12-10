<main>
	<div class="top_banner">
		<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
			<div class="container">
				<div class="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Category</a></li>
						<li>Page active</li>
					</ul>
				</div>
				<h1>Shoes - Grid listing</h1>
			</div>
		</div>
		<img src="img/brands/banner_ADIDAS.webp" class="img-fluid" alt="">
	</div>
	<!-- /top_banner -->
	<div id="stick_here"></div>
	<div class="toolbox elemento_stick">
		<div class="container">
			<ul class="clearfix">
				<li>
					<div class="sort_select">
						<select name="sort" id="sort">
							<option value="popularity" selected="selected">Sort by popularity</option>
							<option value="rating">Sort by average rating</option>
							<option value="date">Sort by newness</option>
							<option value="price">Sort by price: low to high</option>
							<option value="price-desc">Sort by price: high to
						</select>
					</div>
				</li>
				<li>
					<a href="#0"><i class="ti-view-grid"></i></a>
					<a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
				</li>
				<li>
					<a href="#0" class="open_filters">
						<i class="ti-filter"></i><span>Filters</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /toolbox -->

	<div class="container margin_30">

		<div class="row">
			<aside class="col-lg-3" id="sidebar_fixed">
				<div class="filter_col">
					<form method="POST" action="index.php?act=danhmuc">
						<div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
						<div class="filter_type version_2">
							<h4><a href="#filter_1" data-bs-toggle="collapse">Danh mục</a></h4>
							<div class="collapse show" id="filter_1">
								<ul>
									<?php
									foreach ($danhmuc as $dm) {
										extract($dm);
										echo '<li>
										<label class="container_check">' . $ten_dm . '
												<input type="checkbox" name="danhmuc[]" value="' . $id_dm . '" >
												<span class="checkmark"></span>
											</label>
										</li>';
									}
									?>
								</ul>
							</div>
							<!-- /filter_type -->
						</div>
						<div class="filter_type version_2">
							<h4><a href="#filter_4" data-bs-toggle="collapse">Giá</a></h4>
							<div class="collapse show" id="filter_4">
								<ul>
									<li>
										<label class="container_check">
											0₫ ~ 1.000.000₫
											<input type="checkbox" name="price_range[]" value="0-1000000">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_check">
											1.000.000₫ ~ 2.000.000₫
											<input type="checkbox" name="price_range[]" value="1000000-2000000">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_check">
											2.000.000₫ ~ 3.000.000₫
											<input type="checkbox" name="price_range[]" value="2000000-3000000">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_check">
											3.000.000₫ ~ 6.000.000₫
											<input type="checkbox" name="price_range[]" value="3000000-6000000">
											<span class="checkmark"></span>
										</label>
									</li>
								</ul>
							</div>
						</div>
						<!-- /filter_type -->
						<div class="buttons">
							<button type="submit">Filter</button> <button type="reset">Reset</button>
							<a href="index.php?act=danhmuc">Reset All Filters</a>
					</form>
				</div>
			</aside>
			<!-- /col -->
			<div class="col-lg-9">
				<div class="row small-gutters">
					<?php
					foreach ($dssp as $sp) {
						extract($sp);
						$hinh = $img_path . $img;
						$linksp = "index.php?act=ct_sanpham&id_sp=" . $id_sp;
						echo '<div class="col-6 col-md-4">
							<div class="grid_item">
								<span class="ribbon off">-30%</span>
								<figure>
									<a href="' . $linksp . '">
										<img class="img-fluid lazy" src="'. $hinh .'">
									</a>
									<div data-countdown="2019/05/15" class="countdown"></div>
								</figure>
								<a href="' . $linksp . '">
									<h3>' . $ten_sp . '</h3>
								</a>
								<div class="price_box">
									<span class="new_price">' . $gia_khuyenmai . '₫</span>
									<span class="old_price">' . $gia_goc . '₫</span>
								</div>
							</div>
							<!-- /grid_item -->
						</div>';
					}
					?>
				</div>
				<div class="pagination__wrapper">
					<ul class="pagination">
						<?php
						if ($current_page > 1 && $total_page > 1) {
							echo '<li><a href="index.php?act=danhmuc&page=' . ($current_page - 1) . '">Prev</a> </li>';
						}
						for ($i = 1; $i <= $total_page; $i++) {

							if ($i == $current_page) {
								echo '<li>' . $i . '</li>';
							} else {
								echo '<li><a href="index.php?act=danhmuc&page=' . $i . '">' . $i . '</a></li>';
							}
						}

						// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
						if ($current_page < $total_page && $total_page > 1) {
							echo '<li><a href="index.php?act=danhmuc&page=' . ($current_page + 1) . '">Next</a> </li>';
						}
						?>
					</ul>
				</div>
			</div>
			<!-- /col -->
		</div>
		<!-- /row -->

	</div>
	<!-- /container -->
</main>
<!-- /main -->