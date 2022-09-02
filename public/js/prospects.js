/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/prospects.js ***!
  \***********************************/
request_prospects = {
  get: function get() {
    // fetch('https://massivehome.com.mx/api/v1/public/expo/prospects', options)
    // .then(response => response.json())
    // .then(response => console.log(response))
    // .catch(err => console.error(err));
    var headers = new Headers();
    headers.append('Content-Type', 'application/json');
    headers.append('Accept', 'application/json'); //headers.append('Authorization', 'Basic ' + base64.encode(username + ":" +  password));

    headers.append('Origin', 'http://127.0.0.1:8000/');
    fetch("https://massivehome.com.mx/api/v1/public/expo/prospects", {
      mode: 'no-cors',
      method: 'GET',
      headers: headers
    }).then(function (response) {
      return response.json();
    }).then(function (json) {
      return console.log(json);
    })["catch"](function (error) {
      return console.log('Authorization failed: ' + error.message);
    });
  }
};
/******/ })()
;