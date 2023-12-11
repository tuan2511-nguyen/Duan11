<main>
	<div class="container margin_60_35">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<form action="index.php?act=binhluan&id_sp=<?=$id_sp?>" method="post">
					<div class="write_review">
						<h1><?php echo $ctsp['ten_sp'] ?></h1>
						<div class="rating_submit">
							<div class="form-group">
								<label class="d-block">Overall rating</label>
								<span class="rating mb-0">
									<input type="radio" class="rating-input" id="5_star" name="rating" value="5"><label for="5_star" class="rating-star" require></label>
									<input type="radio" class="rating-input" id="4_star" name="rating" value="4"><label for="4_star" class="rating-star" require></label>
									<input type="radio" class="rating-input" id="3_star" name="rating" value="3"><label for="3_star" class="rating-star" require></label>
									<input type="radio" class="rating-input" id="2_star" name="rating" value="2"><label for="2_star" class="rating-star" require></label>
									<input type="radio" class="rating-input" id="1_star" name="rating" value="1"><label for="1_star" class="rating-star" require></label>
								</span>
							</div>
						</div>
						<!-- /rating_submit -->
						<div class="form-group">
							<label>Your review</label>
							<input type="hidden" name="id_sp" value="<?= $id_sp ?>">
							<textarea class="form-control" name="noidung" style="height: 180px;" placeholder="Write your review to help others learn about this online business"></textarea>
						</div>
						<button type="submit" class="btn_1">Submit review</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</main>

<!--/main-->