<?php get_header(); ?>
<?php
//カテゴリ一覧から来た場合
if(isset($_SESSION['category'])){
	$sameCategory = true;
	$back = '/case/casecat/'.$_SESSION['category']['slug'].'/';
	$backText = $_SESSION['category']['name'].'の一覧に戻る';
}else{
	// echo 'sessionなし';
	$sameCategory = false;
	$back = '/case/';
	$backText = '成功事例の一覧に戻る';
}
?>
<div class="ContentsHeader -case">
	<div class="ContentsHeader__Inner">
		<div class="ContentsHeader__Category">
			<?php the_field('case_subtitle'); ?>
		</div>
		<h1 class="ContentsHeader__Title">
			<?php the_title(); ?>
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
			<a href="/case/">
				リフォーム・リノベーションの成功事例
			</a>
		</li>
		<li>
			<?php the_field('case_subtitle'); ?>
		</li>
	</ul>
</div>

<?php the_post(); the_content(); ?>

<?php /*
<div class="CaseIntro">
	<div class="CaseIntro__Inner">
		<div
			class="CaseIntro__Image"
			style="background-image: url( https://img.oyamada.ne.jp/540x420 )"
		></div>
		<div class="CaseIntro__Heading">
			PACKAGE PLAN
		</div>
		<div class="CaseIntro__Lead">
			ワコーレ錦糸町Part1
		</div>
		<div class="CaseIntro__Text">
			<p>
				このリノベーション工事は、まず入居者像を「20～30代の独身女性」に定めるところから始めました。活動的でセンスの良い女性が入居くださる部屋はどういうものか、オーナー様と一緒に考え、プランを練りました。
			</p>
		</div>
	</div>
</div>


<div class="CaseSummary">
	<div class="CaseSummary__Inner">
		<h3 class="CaseSummary__Title">
			解決策を「パフェリノベ」でご提案
		</h3>

		<div class="CaseSummary__Wrapper">
			<div class="CaseSummary__CostGroup">
				<h4 class="CaseSummary__Heading">
					工事金額
				</h4>
				<div class="CaseSummary__Cost">
					約<em>140</em>万円
				</div>
				<div class="CaseSummary__CostNotice">
					※家賃UP分だけで投資利回り15％
				</div>
			</div>
			<div class="CaseSummary__TextGroup">
				<h4 class="CaseSummary__Heading">
					女性目線での内装とは？
				</h4>
				<p>
					プラン検討の結果、バス・トイレ・洗面台をすべて分離させたうえで、「赤と黒」を要所要所で使うことと、収納に一工夫こらすことを決めました。<br>
					結果は狙い通り、建築を学んでいる20代の独身女性が入居してくださることになりました。
				</p>
			</div>
			<div class="CaseSummary__FigureGroup">
				<h4 class="CaseSummary__Heading">
					物件平面図
				</h4>
				<p>
					3点式ユニットバスから浴室・トイレ・洗面を分離し、さらに居室とキッチンを分離させることで、使い勝手の良い空間へと生まれ変わりました。
				</p>
				<div class="CaseSummary__Image">
					<img
						src="https://img.oyamada.ne.jp/360x360"
						alt=""
						class="lazyload"
					>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="CaseResult">
	<div class="CaseResult__Inner">
		<h3 class="CaseResult__Title">
			BEFORE &amp; AFTER
		</h3>

		<div class="CaseResult__Images">
			<div class="CaseResult__Before">
				<img
					src="https://img.oyamada.ne.jp/470x290"
					alt=""
					class="lazyload"
				>
			</div>
			<div class="CaseResult__After">
				<img
					src="https://img.oyamada.ne.jp/470x290"
					alt=""
					class="lazyload"
				>
			</div>
		</div>

		<h4 class="CaseResult__Heading">
			<span class="CaseResult__HeadingIndex">
				01
			</span>
			<span class="CaseResult__HeadingText">
				<span class="CaseResult__HeadingEn">
					KITCHEN
				</span>
				<span class="CaseResult__HeadingJa">
					キッチン
				</span>
			</span>
		</h4>

		<p>
			カウンターキッチンを撤去し、居室とキッチンを分離黒いレンジフードと赤い扉がインパクト大
		</p>

		<div class="CaseResult__Images">
			<div class="CaseResult__Before">
				<img
					src="https://img.oyamada.ne.jp/470x290"
					alt=""
					class="lazyload"
				>
			</div>
			<div class="CaseResult__After">
				<img
					src="https://img.oyamada.ne.jp/470x290"
					alt=""
					class="lazyload"
				>
			</div>
		</div>

		<h4 class="CaseResult__Heading">
			<span class="CaseResult__HeadingIndex">
				02
			</span>
			<span class="CaseResult__HeadingText">
				<span class="CaseResult__HeadingEn">
					ENTRANCE
				</span>
				<span class="CaseResult__HeadingJa">
					玄関
				</span>
			</span>
		</h4>

		<p>
			一人暮らしには大きすぎる下駄箱をコンパクトにし、居室の収納力をカバーするためのハンガーパイプ＆棚板を設置カーテンで隠せばすっきり<br>
			室内に入って最初に目に入る壁には、ワインレッドのアクセントクロスでインパクトを
		</p>

		<div class="CaseResult__Images">
			<div class="CaseResult__Before">
				<img
					src="https://img.oyamada.ne.jp/470x290"
					alt=""
					class="lazyload"
				>
			</div>
			<div class="CaseResult__After">
				<img
					src="https://img.oyamada.ne.jp/470x290"
					alt=""
					class="lazyload"
				>
			</div>
		</div>

		<h4 class="CaseResult__Heading">
			<span class="CaseResult__HeadingIndex">
				03
			</span>
			<span class="CaseResult__HeadingText">
				<span class="CaseResult__HeadingEn">
					BATHROOM
				</span>
				<span class="CaseResult__HeadingJa">
					バスルーム
				</span>
			</span>
		</h4>

		<p>
			3点式ユニットバスから、浴室・トイレ・洗面を完全分離<br>
			浴室はシックな「グランボルドー」のアクセントパネルが印象的
		</p>

	</div>
</div>


<div class="CaseReview">
	<h3 class="CaseReview__Heading">
		入居者様の声
	</h3>
	<div class="CaseReview__Image">
		<img
			src="https://img.oyamada.ne.jp/320x220"
			alt=""
			class="lazyload"
		>
	</div>
	<div class="CaseReview__Text">
		<p>
			<em>室内のキレイさ、清潔感を重視して</em>部屋を探していました。前の住まいも白めのフローリングと黄色のキッチンが気に入っていましたが、色合いにはこだわるほうで、今回の配色も気に入りました。また<em>玄関のコートをかけれるハンガーパイプや姿見も便利</em>だと思いました。全体的に<em>女性目線の内装</em>だと感じました。（20代・女性・大学院生）
		</p>
		<p>
			お部屋のカラーに合わせて、内見用に黒い玄関マットと赤いスリッパを用意しました。入居様に気に入っていただき、「欲しい」とおっしゃったのでプレゼントしました。
		</p>
	</div>
</div>
*/ ?>

<nav class="ArticlePagination">
	<div class="ArticlePagination__Inner">
		<?php next_post_link('%link','%title', $sameCategory, '', 'casecat'); ?>
		<a
			class="ArticlePagination__Back"
			href="<?php echo $back; ?>"
		>
			<?php echo $backText; ?>
		</a>
		<?php previous_post_link('%link','%title', $sameCategory, '', 'casecat'); ?>
	</div>
</nav>

<?php get_footer(); ?>
