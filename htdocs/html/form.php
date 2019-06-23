<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
<title></title>
<link rel='stylesheet' id='style-css'  href='/assets/css/style.css?ver=1.2' type='text/css' media='all' />
<style><?php include $_SERVER['DOCUMENT_ROOT'].'/assets/css/site.css'; ?></style>
</head>
<body class="pageHome">
  <header class="globalHeader">
    <div class="globalHeader__band exceptSmall">
      <div class="globalHeader__bandInner">

        <ul class="siteLinks">
          <li class="siteLinks__item">
            <a href="/"><span class="Icon -facebook"></span>TOP</a>
          </li>
          <li class="siteLinks__item">
            <a href="#"><span class="Icon -facebook"></span>クリップした質問</a>
          </li>
          <li class="siteLinks__item">
            <a href="#"><span class="Icon -facebook"></span>質問をする</a>
          </li>
          <li class="siteLinks__item">
            <a href="#"><span class="Icon -facebook"></span>公式サイト</a>
          </li>
        </ul>

        <div class="siteInfo">
          <ul class="siteInfo__sns">
            <li class="siteInfo__snsList">
              <a href="#"><span class="Icon -facebook"></a>
            </li>
            <li class="siteInfo__snsList">
              <a href="#"><span class="Icon -twitter"></a>
            </li>
            <li class="siteInfo__snsList">
              <a href="#"><span class="Icon -instagram"></a>
            </li>
          </ul>
          <div class="siteInfo__data">
            2019年6月1日現在　Q&A数：<em>650</em>件
          </div>
        </div>
      </div>
    </div>

    <div class="globalHeader__header">
      <div class="globalHeader__logo">
        <a href="/">
          <img src="/images/logo.png" alt="ミュゼプラチナム" class="globalHeader__logoImg">
        </a>
      </div>
      <div class="globalHeader__hamburger">
        <span></span>
      </div>
    </div>

    <h1 class="globalHeader__catch">あなたもミュゼプラチナムの一員として一緒に成長してみませんか？</h1>

    <h1 class="globalHeader__title">
      ミュゼプラチナム　質問フォーム
    </h1>
  </header>

  <div class="container">
    <div class="container__main">
      <section class="container__mainSection">
        <ul class="formStatus">
          <li class="formStatus__step formStatus__step--current">
            <div class="formStatus__stepInner">
              <span>step1</span>
              質問フォームに記入
            </div>
          </li>
          <li class="formStatus__step">
            <div class="formStatus__stepInner">
              <span>step2</span>
              内容確認
            </div>
          </li>
          <li class="formStatus__step">
            <div class="formStatus__stepInner">
              <span>step3</span>
              質問完了
            </div>
          </li>
        </ul>
      </section>

      <section class="container__mainSection container__mainSection--wht container__mainSection--padding">
        <p>
          こちらのページでは求人に関する質問を受け付けております。<br>必要事項をご記入の上「入力内容の確認画面へ」を押してください
        </p>
        <div class="formContainer">
          <div class="contentBlock">
            <h2 class="formContainer__title">よく見られている質問</h2>
            <ul class="popularQuestion">
              <li class="popularQuestion__item">
                <a href="#">未経験でも応募可能ですか？未経験でも応募可能ですか？未経験でも応募可能ですか？</a>
              </li>
              <li class="popularQuestion__item">
                <a href="#">未経験でも応募可能ですか？</a>
              </li>
              <li class="popularQuestion__item">
                <a href="#">未経験でも応募可能ですか？</a>
              </li>
              <li class="popularQuestion__item">
                <a href="#">未経験でも応募可能ですか？</a>
              </li>
              <li class="popularQuestion__item">
                <a href="#">未経験でも応募可能ですか？</a>
              </li>
              <li class="popularQuestion__item">
                <a href="#">未経験でも応募可能ですか？</a>
              </li>
            </ul>
          </div>

          <div class="contentBlock">
            <div class="contentBlock__title">
              過去の質問をキーワードで検索もできます
            </div>
            <div class="searchForm">
              <div class="searchForm__inner">
                <div class="searchForm__text">
                  Q&Aをキーワードを入力して検索する
                </div>
                <form action="/" method="get" class="searchForm__form" autocomplete="off">
                  <input type="text" name="s" value="">
                  <button>検索</button>
                </form>
              </div>
            </div>
          </div>

          <div class="contentBlock">
            <ul class="tagCloud--small">
              <li class="tagCloud__tag">
                <a href="#">タグ</a>
              </li>
              <li class="tagCloud__tag">
                <a href="#">タグタグタグタグ</a>
              </li>
              <li class="tagCloud__tag">
                <a href="#">タグ</a>
              </li>
              <li class="tagCloud__tag">
                <a href="#">タグタグタグタグ</a>
              </li>
              <li class="tagCloud__tag">
                <a href="#">タグ</a>
              </li>
            </ul>
          </div>

          <div class="contentBlock">
            <h2 class="formContainer__title">新たに質問をする</h2>
            <table class="formTable">
              <tr>
                <th>
                  お名前<div class="formTable__require"><span class="formTable__requireTag">必須</span></div>
                </th>
                <td>
                  <input type="text" name="name" class="formTable__textInput required" size="60" value="" required>
                </td>
              </tr>
              <tr>
                <th>
                  フリガナ<div class="formTable__require"><span class="formTable__requireTag">必須</span></div>
                </th>
                <td>
                  <input type="text" name="kana" class="formTable__textInput required" size="60" value="" required>
                </td>
              </tr>
              <tr>
                <th>
                  メールアドレス<div class="formTable__require"><span class="formTable__requireTag">必須</span></div>
                </th>
                <td>
                  <input type="email" name="mail" class="formTable__textInput required" size="60" value="" data-conv-half-alphanumeric="true" required>
                  <div class="formTable__caption">
                    確認のため、再度メールアドレスの入力をお願いします。
                  </div>
                  <input type="email" name="mail" class="formTable__textInput required" size="60" value="" data-conv-half-alphanumeric="true" required>
                </td>
              </tr>
              <tr>
                <th>
                  質問内容<div class="formTable__require"><span class="formTable__requireTag">必須</span></div>
                </th>
                <td>
                  <textarea name="question" class="formTable__multilineInput required" cols="50" rows="5" required></textarea>
                </td>
              </tr>
            </table>
          </div>

          <div class="contentBlock">
            <h2 class="formContainer__title">個人情報の取り扱いについて</h2>
            <p>
              下記事項をご確認の上、同意していただける場合は「同意する」にチェックしてください。
            </p>
            <div class="formContainer__textBlock">
              ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。
            </div>
            <div class="formContainer__agreement">
              <span class="mwform-checkbox-field horizontal-item">
            		<label>
            			<input type="checkbox" name="agreement[data][]" value="同意します" class="mwform-checkbox-field-text">
            			<span class="mwform-checkbox-field-text">個人情報の取り扱いに同意する</span>
            		</label>
            	</span>
            </div>

            <div class="formContainer__buttons">
              <p>
                　「入力内容の確認へ」ボタンをクリックして入力内容のご確認をお願いします。<br>
                ご入力、誠にありがとうございました。
              </p>
              <input type="submit" name="submitConfirm" value="入力内容を確認" class="formContainer__primaryButton" disabled>
            </div>
          </div>
        </div>

      </section>

    </div>
  </div>

  <footer class="globalFooter">
    <div class="globalFooter__inner">
      <ul class="globalFooter__nav">
          <li class="globalFooter__navItem">
            <a href="/company/">会社概要</a>
          </li>
          <li class="globalFooter__navItem">
            <a href="/privacy/">個人情報保護方針</a>
          </li>
          <li class="globalFooter__navItem">
            <a href="/copyright/">コピーライト・免責事項</a>
          </li>
          <li class="globalFooter__navItem">
            <a href="/terms/">応募規約・プライバシーポリシー</a>
          </li>

      </ul>
      <div class="globalFooter__copyright">
        &copy; MUSEE PLATINUM All Rights Reserved.
      </div>
    </div>
  </footer>

  <div class="onlySmall">
    <div class="spFooter">
      <ul class="siteLinks">
        <li class="siteLinks__item">
          <a href="/"><span class="Icon -facebook"></span>TOP</a>
        </li>
        <li class="siteLinks__item">
          <a href="#"><span class="Icon -facebook"></span>クリップした質問</a>
        </li>
        <li class="siteLinks__item">
          <a href="#"><span class="Icon -facebook"></span>質問をする</a>
        </li>
        <li class="siteLinks__item">
          <a href="#"><span class="Icon -facebook"></span>公式サイト</a>
        </li>
      </ul>
    </div>
  </div>

  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700,900&amp;subset=japanese" rel="stylesheet">
  <script type='text/javascript' src='/assets/js/bundle.js'></script>
</body>
</html>
