// Start Dashboard
if (window.location.pathname === '/dashboard') {

  var xhr = new XMLHttpRequest();
  xhr.open('GET', '/api/userinfo');
  xhr.onload = function() {
    if (xhr.status === 200) {
      var userinfo = JSON.parse(xhr.responseText);
      document.getElementById('username').innerHTML = userinfo.username;
      document.getElementById('usertype').innerHTML = userinfo.usertype;
      document.getElementById('csrf').innerHTML = userinfo.csrf_token;
    }
  };
  xhr.send();
}


// End Dashboard

else if (window.location.pathname === '/login') {
  // run code specific to the login page
} else {
  // run default code
}
