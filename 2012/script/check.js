function check(){
res=in_check();
if(res==true){
　　document.mform.submit();
}
}

function in_check(){
if(document.mform.name.value==""){
alert("名前を入力してください");
return false;
}
if(document.mform.from.value==""){
alert("メールアドレスを入力してください");
return false;
}
return true;
}
