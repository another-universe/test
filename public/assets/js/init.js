(self["webpackChunk"] = self["webpackChunk"] || []).push([["/assets/js/init"],{

/***/ "./resources/js/init/axios.js":
/*!************************************!*\
  !*** ./resources/js/init/axios.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);

window.axios = axios__WEBPACK_IMPORTED_MODULE_0___default().create({
  baseURL: "".concat(location.protocol, "//").concat(location.hostname),
  timeout: 1500,
  headers: {
    common: {
      Accept: 'application/json, */*',
      'X-Requested-With': 'XMLHttpRequest'
    }
  }
});

/***/ }),

/***/ "./resources/js/init/bootstrap-components.js":
/*!***************************************************!*\
  !*** ./resources/js/init/bootstrap-components.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

window.Bootstrap = __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.esm.js");

/***/ }),

/***/ "./resources/js/init/index.js":
/*!************************************!*\
  !*** ./resources/js/init/index.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _bootstrap_components_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./bootstrap-components.js */ "./resources/js/init/bootstrap-components.js");
/* harmony import */ var _bootstrap_components_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_bootstrap_components_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _axios_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./axios.js */ "./resources/js/init/axios.js");



/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["/assets/js/vendor"], () => (__webpack_exec__("./resources/js/init/index.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=init.js.map