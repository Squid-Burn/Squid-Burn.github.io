function checkTokenExists() {
  var cookies = document.cookie.split(';');
  var token = '';
  for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i].trim();
    if (cookie.startsWith('token=')) {
      token = cookie.substring('token='.length, cookie.length);
      break;
    }
  }
  return token !== '';
}

document.addEventListener('DOMContentLoaded', function () {
  var tokenExists = checkTokenExists();
  console.log(tokenExists);

  if (!tokenExists) {
    window.location.href = "/login/";
    return;
  }

  var xhr = new XMLHttpRequest();
  xhr.open('GET', '/login/verify.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      var token = '';
      var promise = new Promise(function (resolve, reject) {
        try {
          var response = JSON.parse(xhr.responseText);
          var tokens = response.tokens; // 获取所有的token值
          resolve(tokens);
        } catch (error) {
          reject(error);
        }
      });

      promise.then(function (tokens) {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
          var cookie = cookies[i].trim();
          if (cookie.startsWith('token=')) {
            token = cookie.substring('token='.length, cookie.length);
            break;
          }
        }

        var tokenMatch = false;
        for (var i = 0; i < tokens.length; i++) {
          if (token === tokens[i]) {
            tokenMatch = true;
            break;
          }
        }

        if (tokenMatch) {
          console.log("Token 匹配");
        } else {
          console.log("Token 不匹配");
          window.location.href = "/login/";
          console.log(token);
          console.log(tokens);
        }
      }).catch(function (error) {
        console.log("Error: " + error);
      });
    }
  };

  xhr.send(); // 可以在send()中传递要发送的数据
});