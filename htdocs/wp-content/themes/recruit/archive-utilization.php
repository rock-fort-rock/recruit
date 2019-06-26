<?php get_header(); ?>

<div class="ContentsHeader -ownerUtilization">
	<div class="ContentsHeader__Inner">
		<h1 class="ContentsHeader__Title">
			最新の稼働率
		</h1>
	</div>
</div>


<div class="Breadcrumbs">
	<ul>
		<li>
			<a href="/">
				<span class="Icon -home"></span>
			</a>
		</li>
		<li>
			<a href="/owner/">
				UMの賃貸管理
			</a>
		</li>
		<li>
			最新の稼働率
		</li>
	</ul>
</div>

<?php if(have_posts()): ?>
<?php while(have_posts()): the_post(); ?>
<div class="OccupancyTableSection<?php if($wp_query->current_post == 0)echo ' -open'; ?>">
	<button
		type="button"
		class="OccupancyTableSection__Header"
	>
		<?php the_title(); ?>
	</button>
	<?php if( have_rows('utilization_set') ): ?>
	<div class="OccupancyTableSection__Body">
		<div class="OccupancyTable">
			<div class="OccupancyTable__Inner">
				<table class="OccupancyTable__Table">
					<thead>
						<tr>
							<th rowspan="2">
								算出日
							</th>
							<th colspan="3">
								住居物件
							</th>
							<th colspan="3">
								オフィス・店舗物件
							</th>
						</tr>
						<tr>
							<th>
								総戸数
							</th>
							<th>
								空室数
							</th>
							<th class="-highlighted">
								稼働率
							</th>
							<th>
								総戸数
							</th>
							<th>
								空室数
							</th>
							<th class="-highlighted">
								稼働率
							</th>
						</tr>
					</thead>
					<tbody>
					<?php while (have_rows('utilization_set')): the_row(); ?>
						<?php
							$timestamp = strtotime(get_sub_field('utilization_setDate'));
							$date = date('Y年m月d日',$timestamp);
							$residence = get_sub_field('utilization_setResidence');
							$office = get_sub_field('utilization_setOffice');
						?>
						<tr>
							<td>
								<?php echo $date; ?>
							</td>
							<td>
								<?php echo $residence['utilization_setResidenceAll']; ?>戸
							</td>
							<td>
								<?php echo $residence['utilization_setResidenceVacancy']; ?>戸
							</td>
							<td class="-highlighted">
								<?php echo $residence['utilization_setResidenceRate']; ?>％
							</td>
							<td>
								<?php echo $office['utilization_setOfficeAll']; ?>戸
							</td>
							<td>
								<?php echo $office['utilization_setOfficeVacancy']; ?>戸
							</td>
							<td class="-highlighted">
								<?php echo $office['utilization_setOfficeRate']; ?>％
							</td>
						</tr>
					<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?>
</div>
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>
