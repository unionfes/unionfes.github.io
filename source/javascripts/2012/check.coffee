check = ->
  document.mform.submit() if in_check()

in_check = ->
  if document.mform.name.value is ""
    alert "名前を入力してください"
    return false

  if document.mform.from.value is ""
    alert "メールアドレスを入力してください"
    return false
  true
