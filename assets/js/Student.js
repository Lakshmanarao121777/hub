function login(usertype)
{
  var uname    = document.forms[usertype+'_login']['username'].value;
  var passwd   = document.forms[usertype+'_login']['password'].value;

  var values =['utype',uname,passwd];
  var msg=SendToPhp(values,"php/controllers/login.php");
  //snackbar(msg);
  alert(msg);
}