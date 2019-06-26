<?php
/*
Template Name: ご入居者様へ - 設備不具合お問い合わせ
*/
?>
<?php get_header(); ?>

<div class="ContentsHeader -residentSupport">
	<div class="ContentsHeader__Inner">
		<div class="ContentsHeader__Category">
			ご入居者様へ
		</div>
		<h1 class="ContentsHeader__Title">
			設備不具合<br class="-ignoreLargeScreen">お問い合わせ
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
			<a href="../">
				ご入居者様へ
			</a>
		</li>
		<li>
			設備不具合お問い合わせ
		</li>
	</ul>
</div>


<div class="ResidentSupportIntro">
	<div class="ResidentSupportIntro__Lead">
		当社管理物件にお住いの方が設備不具合について、ご連絡をいただく場合にご利用いただけます。
	</div>
	<ul class="ResidentSupportIntro__NoticeList">
		<li>
			※順次ご対応をさせていただきますが、緊急の場合は、上記番号までお電話でのご連絡をお願いいたします。
		</li>
		<li>
			※設備不具合状況により、弊社協力会社からご連絡をさせていただく場合があります。予めご了承をお願いいたします。
		</li>
		<li>
			※不具合状況などにより、お問い合わせいただいた後に、不具合箇所等を写真で撮影いただきメールでの送信をお願いする場合があります。ご協力をいただける場合には、修理期間の短縮ができる場合がありますので、ご理解をお願いいたします。
		</li>
	</ul>
</div>


<div class="UserProgress">
	<ol>
		<li class="-current">
			入力
		</li>
		<li>
			内容の確認
		</li>
		<li>
			完了
		</li>
	</ol>
</div>

<?php the_post(); the_content(); ?>
<?php /*
<form
	class="ContactForm"
	method="post"
	action="http://www.union-ca.co.jp.s-rep.net/template-facilityform/"
	enctype="multipart/form-data"
>
	<table class="ContactForm__Main">
		<tr>
			<th>
				お住まいのマンション名
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="text"
					name="estatename"
					required
				>
				<div class="ContactForm__Help">
					※弊社管理物件に限ります
				</div>
			</td>
		</tr>

		<tr>
			<th>
				部屋番号
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="text"
					name="roomnumber"
					required
				>
			</td>
		</tr>

		<tr>
			<th>
				会社名（法人契約などの場合）
			</th>
			<td>
				<input
					class="TextInput"
					type="text"
					name="companyname"
				>
			</td>
		</tr>

		<tr>
			<th>
				お名前
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="text"
					name="name"
					required
					placeholder="例：山田太郎"
				>
			</td>
		</tr>

		<tr>
			<th>
				お名前（フリガナ）
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="text"
					name="namekana"
					required
					placeholder="例：ヤマダタロウ"
				>
			</td>
		</tr>

		<tr>
			<th>
				性別
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<div class="ContactForm__InputListMwform">
					<span class="mwform-radio-field horizontal-item">
						<label>
							<input type="radio" name="sex" value="男性">
							<span class="mwform-radio-field-text">男性</span>
						</label>
					</span>
					<span class="mwform-radio-field horizontal-item">
						<label>
							<input type="radio" name="sex" value="女性">
							<span class="mwform-radio-field-text">女性</span>
						</label>
					</span>
				</div>

				<input
					type="hidden"
					name="__children[sex][]"
					value="{&quot;\u7537\u6027&quot;:&quot;\u7537\u6027&quot;,&quot;\u5973\u6027&quot;:&quot;\u5973\u6027&quot;}"
				>
			</td>
		</tr>

		<tr>
			<th>
				希望の連絡方法
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<div class="ContactForm__InputListMwform">
					<span class="mwform-radio-field horizontal-item">
						<label>
							<input type="radio" name="com" value="メール">
							<span class="mwform-radio-field-text">メール</span>
						</label>
					</span>
					<span class="mwform-radio-field horizontal-item">
						<label>
							<input type="radio" name="com" value="携帯電話">
							<span class="mwform-radio-field-text">携帯電話</span>
						</label>
					</span>
					<span class="mwform-radio-field horizontal-item">
						<label>
							<input type="radio" name="com" value="固定電話">
							<span class="mwform-radio-field-text">固定電話</span>
						</label>
					</span>
				</div>

				<input
					type="hidden"
					name="__children[com][]"
					value="{&quot;\u30e1\u30fc\u30eb&quot;:&quot;\u30e1\u30fc\u30eb&quot;,&quot;\u643a\u5e2f\u96fb\u8a71&quot;:&quot;\u643a\u5e2f\u96fb\u8a71&quot;,&quot;\u56fa\u5b9a\u96fb\u8a71&quot;:&quot;\u56fa\u5b9a\u96fb\u8a71&quot;}"
				>
			</td>
		</tr>

		<tr>
			<th>
					メールアドレス
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="email"
					name="mail"
					required
					placeholder="例：sample@yamadahp.jp"
				>
				<div class="ContactForm__Help">
					※希望の連絡方法で電話を選択された方にも、入力をお願いしております。
				</div>
			</td>
		</tr>

		<tr>
			<th>
				メールアドレス（再確認）
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="email"
					name="mailre"
					required
					placeholder="例：sample@yamadahp.jp"
				>
				<div class="ContactForm__Help">
					※確認のため、もう一度入力してください。
				</div>
			</td>
		</tr>

		<tr>
			<th>
				固定電話番号
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="tel"
					name="tel"
					required
					placeholder="例：03-0000-0000"
				>
			</td>
		</tr>

		<tr>
			<th>
				携帯電話番号
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="tel"
					name="cel"
					required
					placeholder="例：090-0000-0000"
				>
				<div class="ContactForm__Help">
					※携帯電話をお持ちでない方は、ここに固定電話番号を入力ください。<br>
					※希望の連絡方法で電話を選択された方にも、入力をお願いしております。
				</div>
			</td>
		</tr>

		<tr>
			<th>
				希望連絡曜日・時間帯
			</th>
			<td>
				<textarea
					class="MultilineInput"
					name="contacttime"
				></textarea>
				<div class="ContactForm__Help">
					※希望の連絡方法で電話を選択された方で、希望の連絡曜日・時間帯などがあれば入力ください。<br>
					（時間については、9：00～18：00対応可能時間帯となります。上記時間帯が不可の場合、希望の連絡方法でメールを選択ください。
				</div>
			</td>
		</tr>

		<tr>
			<th>
				設備種類
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="text"
					name="kind"
					required
					placeholder="例：エアコン、ユニットバス、トイレ、ガスコンロ、水道"
				>
			</td>
		</tr>

		<tr>
			<th>
					不具合の具体的状況
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<textarea
					class="MultilineInput"
					name="situation"
					required
					placeholder="例：エアコン本体から風が出るが、冷たい空気にならず部屋が冷えない"
				></textarea>
			</td>
		</tr>

		<tr>
			<th>
				不具合発生時期
			</th>
			<td>
				<input
					class="TextInput"
					type="text"
					name="time"
				></textarea>
			</td>
		</tr>

		<tr>
			<th>
				設備・メーカー名
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="text"
					name="maker"
					required
				>
				<div class="ContactForm__Help">
					※設置本体の表示を確認して入力してください。不明の場合は「表示がなく不明」などと入力してください。
				</div>
			</td>
		</tr>

		<tr>
			<th>
				設備・型番
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="text"
					name="modelnumber"
					required
				>
				<div class="ContactForm__Help">
					※設置本体に貼られているシールなどを確認して入力してください。型番が分かると修理期間を短縮できる場合があります。不明の場合は「表示がなく不明」などと入力してください。
				</div>
			</td>
		</tr>

		<tr>
			<th>
				設備・年式
				<span class="ContactForm__RequiredTag">必須</span>
			</th>
			<td>
				<input
					class="TextInput"
					type="text"
					name="modelyear"
					required
				>
				<div class="ContactForm__Help">
					※設置本体に貼られているシールなどを確認して入力してください。年式により修理方法などの参考にさせていただきます。不明の場合は「表示がなく不明」などと入力してください。
				</div>
			</td>
		</tr>

		<tr>
			<th>
				その他
			</th>
			<td>
				<textarea
					class="MultilineInput"
					name="other"
				></textarea>
				<div class="ContactForm__Help">
					※その他連絡事項などがある場合に入力してください。
				</div>
			</td>
		</tr>

	</table>

	<div class="ContactForm__AgreementLine">
		<span class="mwform-checkbox-field horizontal-item">
			<label>
				<input type="checkbox" name="agreement[data][]" value="同意します">
				<span class="mwform-checkbox-field-text">同意します</span>
			</label>
		</span>
		弊社の「<a href="#">個人情報保護方針</a>」をご確認の上、同意いただけましたらチェックを入れて「入力内容を確認」をクリックしてください。
	</div>

	<input
		type="hidden"
		name="mw_wp_form_token"
		value="433195dcae"
	/>
	<input
		type="hidden"
		name="_wp_http_referer"
		value="/template-facilityform/"
	/>
	<input
		type="hidden"
		name="mw-wp-form-form-id"
		value="110"
	/>
	<input
		type="hidden"
		name="mw-wp-form-form-verify-token"
		value="dcdc2a9e6db0b9ccb7934f7b30d37d5ded788b38"
	/>

	<div class="ContactForm__Buttons">
		<button class="ContactForm__PrimaryButton">
			入力内容を確認
		</button>
	</div>

</form>
*/ ?>

<?php get_footer(); ?>
