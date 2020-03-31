	</div><!--/container-->
	<footer class="globalFooter globalFooter--amp">
		<div class="globalFooter__inner">
			<ul class="globalFooter__nav">
					<li class="globalFooter__navItem">
						<!-- <a href="<?php echo $officialSite; ?>" target="_blank">コーポレートサイト</a> -->
						<a href="https://musee-pla.com/corporate/" target="_blank">コーポレートサイト</a>
					</li>
					<li class="globalFooter__navItem">
						<a href="/privacy/">プライバシーポリシー</a>
					</li>
					<li class="globalFooter__navItem">
						<a href="/company/">運営会社</a>
					</li>
					<li class="globalFooter__navItem">
						<a href="/sitemap/">サイトマップ</a>
					</li>

			</ul>
			<div class="globalFooter__copyright">
				&copy; <?php the_field('sitesetting_sitename-en', 'option'); ?> All Rights Reserved.
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
</html>
