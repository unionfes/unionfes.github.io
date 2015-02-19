UnionFes Web Site
=================

いえーぱちぱち。

UnionFesはアイアンサーバじゃなくてGithub Pagesを使って公開することにしました。
無料最高！

Github Pagesを使うので、HTML + Javascriptで作る必要があります。

そのうちJekyllなんかを使ったほうがいいかも。


# サイト一覧
* [TOP](http://unionfes.tojok-on.com/)
* [2012](http://unionfes.tojok-on.com/2012/)
* [2013](http://unionfes.tojok-on.com/2013/)
* [2014](http://unionfes.tojok-on.com/2014/)

# 開発について
## 準備
コードをGithubからとってくる。

```bash
git clone git@github.com:unionfes/unionfes.github.io.git
cd unionfes.github.io
git checkout source
```

Middlemanとかをインストール。

```bash
bundle install --path vendor/bundle
```

## 開発中のサイト確認
Middlemanのサーバを実行すればおk。

```bash
bundle exec middleman
```

これでローカルにサーバがたつので、`http://localhost:4567/`で開発中のサイトが確認できる。
