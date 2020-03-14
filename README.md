Union Fes Web Site
==================

https://unionfes.tojok-on.com

TOJO K-ON Union Fesの[公式ウェブサイト](https://unionfes.tojok-on.com)です。
ドメイン、リポジトリの管理は @nownabe ([GitHub](https://github.com/nownabe), [Twitter](https://twitter.com/nownabe)) がやっています。

共同管理者絶賛募集中です！！！

質問やドキュメントの不備等があればTwitterやDiscordで連絡してください。

# Web担当者の方へ

新しい年度のサイトを作るためのドキュメントです。
いろいろ登録したりしますが無料なので安心してください。

## 前提

HTMLがわかって、ターミナルでコマンドを実行できればなんとかなると思います。
GitやGitHubの知識があればなお良いですが、多分なくても大丈夫です。

また、MacかLinuxだと操作しやすいと思います。

## Discord

連絡や質問は[Discord](https://discordapp.com/)でやりとりしています。
Discordに登録して次のURLから参加してください。

https://discord.gg/q5TVkVj

## 準備

### GitHub

サイトを編集するためにはGitHubへ登録する必要があります。
次の記事を参考にGitHubへの登録、SSH鍵の登録を行ってください。

* [Githubのアカウント作成方法](https://qiita.com/rshibasa/items/f62db870ed573ca4dced)
* [SSHの公開鍵を作成しGithubに登録する手順](http://monsat.hatenablog.com/entry/generating-ssh-keys-for-github)

その後、DiscordでGitHubのアカウント名を教えてください。
管理者が以降の作業ができるようにアカウントをunionfesのリポジトリに登録します。

管理者からDiscordで設定が終わったと連絡があったら、以降の作業をすすめてください。

### Setup

次のコマンドを実行してGitHubから自分のPCにサイトのソースをコピーしてください。

```bash
git clone ssh://github.com/unionfes/unionfes.github.io
```

新しいディレクトリができるのでそこに移動しておきます。

```bash
cd unionfes.github.io
```

### ローカルサーバの起動

これからコピーしてきたソースを編集していきます。
編集過程のサイトを自分のPC上で確認できるように、自分のPCでサーバを起動します。

次の内いずれかのコマンドを実行しましょう。どれかがうまくいけばOKです。

```bash
python -m http.server 8080
python3 -m http.server 8080
python -m SimpleHTTPServer 8080
ruby -run -e httpd . -p 8080
```

うまくいけば、こんな感じのメッセージが表示されます。

```
Serving HTTP on 0.0.0.0 port 8000 (http://0.0.0.0:8000/) ...

とか

[2020-03-09 21:35:11] INFO  WEBrick::HTTPServer#start: pid=15551 port=8080

とか
```

また、うまくいったっぽかったらブラウザで http://localhost:8080/ にアクセスしてみてください。
うまくいっていればUnionFesのサイトが表示されます。

どれもうまくいかなかったらDiscordで相談してください。

## 開発

ローカルサーバを起動して、ブラウザで確認しながらサイトを編集していきましょう。

新しい年度の作り方は2通りあります。

* いちから新しく作る
* 前年のソースをコピーして編集する

Webサイト制作が得意な人はぜひ前者でやってみてください。

以下、それぞれの方法について説明します。

### いちから新しく作る方法

まず、新しい年度のディレクトリを作りましょう。
例えば新しく2020年のサイトを作るなら、次のコマンドを実行します。

```bash
mkdir 2020
```

次に、 `index.html` を編集しましょう。

5行目を次のように修正してください。

```diff
-<meta content="10; URL=./2019/" http-equiv="refresh" />
+<meta content="10; URL=./2020/" http-equiv="refresh" />
```

そして、他の年度と同じように2020年ページへのリンクを追加してください。

```diff
   <li><a href="/2019">Union Fes '19</a></li>
+  <li><a href="/2020">Union Fes '20</a></li>
 </ul>
```

あとは、`2020/index.html` を作成し、HTML/CSS/JavaScript等で好きなようにサイトを作成してください。

### コピーする方法

前年のソースをコピーして、同じデザインのままで内容を変えていきます。
例えば[2016年](https://unionfes.tojok-on.com/2016/)から[2019年](https://unionfes.tojok-on.com/2019/)のサイトは[2015年](https://unionfes.tojok-on.com/2015/)のソースをコピーして作られています。

2019年のサイトをコピーして2020年のサイトを作るには、まず次のコマンドを実行してコピーしてください。

```bash
cp -r 2019 2020
```

コピーができたら、`2020/index.html`や`2020/images`の画像、`2020/main.js`などを編集してください。

## デプロイ

新しい年度のサイトができたら、次の手順を経て https://unionfes.tojok-on.com に反映されます。

* 新しいサイトのGitブランチをGitHubにプッシュする
* GitHubでPull Requestを作る
* レビューしてもらう
* masterブランチにマージする

Web担当者がやるのは前半2つだけです。順番に詳しく説明します。

まず、新しいブランチを作成します。

```bash
git checkout -b create-2020
```

新しい年度のサイトを追加するために加えたソースコードの変更をコミット対象にします。

```
git add -A
```

コミットします。

```bash
git commit -m "2020年サイトを追加"
```

GitHubにプッシュします。

```bash
git push -u origin create-2020
```

これでGitHubにソースコードの変更をプッシュできたので、GitHub上でPull Requestを作成します。

[New Pull Request](https://github.com/unionfes/unionfes.github.io/compare)にアクセスして、baseを`master`、compareを`create-2020`にしましょう。
ソースコードの差分が表示されるので、そのまま「Create pull request」をクリックしてください。

Pull Requestの作成画面が表示されるので、次のようにタイトルやコメントを入力して「Create pull request」をクリックしてください。

![pull request](https://user-images.githubusercontent.com/1286807/43994261-3900cff8-9dd5-11e8-87b2-ccdb581233a1.png)

これでPull Requestの作成が完了しました。少し待ったら管理者がレビューしてマージして本番サイトに変更が反映されます。

# 参考

* [Gitの参考リンク集](https://github.com/unionfes/unionfes.github.io/wiki/Reference#git)
