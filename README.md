## gitのコマンド

- githubとの連携
  - ```git remote add origin リポジトリURL``` (初回)
  - ```git remote set-url origin リポジトリURL``` (二回目以降変更時)

- 現在連携しているgithubの確認
  - ```git remote -v```

- 現在のgit管理下の変更状況の確認
  - ```git status```
- gitへファイルを追加
  - ```git add ファイル名``` (対象のファイルのみ追加)
  - ```git add *``` (全てのファイルを追加)
- git管理下からファイルを外す
  - 対象のファイルを削除したい場合  
  ``` git rm ファイル名 ```
  - 対象のフォルダを削除したい場合  
  ```git rm -r フォルダ名```

  - 対象のファイルを残したい場合  
  ```git rm --cached ファイル名``` (特定のファイルのみ除外)
- git管理下の状態をsaveする
  - ```git commit -m"コミットメッセージ"```

- localのgit管理下の状態をgit hubに反映する
  - ```git push origin ブランチ名```

- ブランチの確認
  - ```git branch```

- ローカルとリモートのブランチ確認
  - ```git branch -a```

- リモートのブランチをローカルに反映
  - ```git checkout -b <ローカルのブランチ名> <ローカルに反映したいリモートのブランチ名>```

- ブランチの作成＆そのブランチに移動
  - ```git checkout -b ブランチ名```
- ブランチの移動
  - ```git checkout ブランチ名```
- ブランチの削除
  - ``` git branch -d ブランチ名```

- Cloneの仕方
  - ```git clone リポジトリURL -b ブランチ名```(ブランチ名を指定しないとデフォルトブランチが採用される.)

- pullの仕方
  - ```git pull origin ブランチ名```



