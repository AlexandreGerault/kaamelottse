/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/no-pending-order-username-autocomplete.js":
/*!****************************************************************!*\
  !*** ./resources/js/no-pending-order-username-autocomplete.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var input = document.getElementById(\"autocomplete\");\nautocomplete({\n  input: input,\n  emptyMsg: \"Aucun résultats correspondant\",\n  fetch: function (_fetch) {\n    function fetch(_x, _x2) {\n      return _fetch.apply(this, arguments);\n    }\n\n    fetch.toString = function () {\n      return _fetch.toString();\n    };\n\n    return fetch;\n  }(function (text, update) {\n    text = text.toLowerCase(); // you can also use AJAX requests instead of preloaded data\n\n    var suggestions = fetch('/backoffice/username_autocomplete?email=' + text).then(function (r) {\n      return r.json();\n    }).then(function (data) {\n      update(data);\n    });\n  }),\n  onSelect: function onSelect(item) {\n    input.value = item.email;\n  },\n  render: function render(item, currentValue) {\n    var itemElement = document.createElement('div');\n    itemElement.classList.add('border', 'pointer');\n    var link = document.createElement('a');\n    link.setAttribute('href', '#');\n    link.classList.add('autocomplete-item');\n    link.textContent = item.email;\n    link.addEventListener('click', function (e) {\n      e.preventDefault();\n    });\n    itemElement.appendChild(link);\n    return itemElement;\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbm8tcGVuZGluZy1vcmRlci11c2VybmFtZS1hdXRvY29tcGxldGUuanM/YjViYSJdLCJuYW1lcyI6WyJpbnB1dCIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJhdXRvY29tcGxldGUiLCJlbXB0eU1zZyIsImZldGNoIiwidGV4dCIsInVwZGF0ZSIsInRvTG93ZXJDYXNlIiwic3VnZ2VzdGlvbnMiLCJ0aGVuIiwiciIsImpzb24iLCJkYXRhIiwib25TZWxlY3QiLCJpdGVtIiwidmFsdWUiLCJlbWFpbCIsInJlbmRlciIsImN1cnJlbnRWYWx1ZSIsIml0ZW1FbGVtZW50IiwiY3JlYXRlRWxlbWVudCIsImNsYXNzTGlzdCIsImFkZCIsImxpbmsiLCJzZXRBdHRyaWJ1dGUiLCJ0ZXh0Q29udGVudCIsImFkZEV2ZW50TGlzdGVuZXIiLCJlIiwicHJldmVudERlZmF1bHQiLCJhcHBlbmRDaGlsZCJdLCJtYXBwaW5ncyI6IkFBQUEsSUFBSUEsS0FBSyxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsY0FBeEIsQ0FBWjtBQUVBQyxZQUFZLENBQUM7QUFDVEgsT0FBSyxFQUFFQSxLQURFO0FBRVRJLFVBQVEsRUFBRSwrQkFGRDtBQUdUQyxPQUFLO0FBQUE7QUFBQTtBQUFBOztBQUFBO0FBQUE7QUFBQTs7QUFBQTtBQUFBLElBQUUsVUFBU0MsSUFBVCxFQUFlQyxNQUFmLEVBQXVCO0FBRTFCRCxRQUFJLEdBQUdBLElBQUksQ0FBQ0UsV0FBTCxFQUFQLENBRjBCLENBRzFCOztBQUNBLFFBQUlDLFdBQVcsR0FBR0osS0FBSyxDQUFDLDZDQUE2Q0MsSUFBOUMsQ0FBTCxDQUNiSSxJQURhLENBQ1IsVUFBQUMsQ0FBQyxFQUFJO0FBQ1AsYUFBT0EsQ0FBQyxDQUFDQyxJQUFGLEVBQVA7QUFDSCxLQUhhLEVBR1hGLElBSFcsQ0FHTixVQUFBRyxJQUFJLEVBQUk7QUFDWk4sWUFBTSxDQUFDTSxJQUFELENBQU47QUFDSCxLQUxhLENBQWxCO0FBTUgsR0FWSSxDQUhJO0FBY1RDLFVBQVEsRUFBRSxrQkFBU0MsSUFBVCxFQUFlO0FBQ3JCZixTQUFLLENBQUNnQixLQUFOLEdBQWNELElBQUksQ0FBQ0UsS0FBbkI7QUFDSCxHQWhCUTtBQWlCVEMsUUFBTSxFQUFFLGdCQUFTSCxJQUFULEVBQWVJLFlBQWYsRUFBNkI7QUFDakMsUUFBTUMsV0FBVyxHQUFHbkIsUUFBUSxDQUFDb0IsYUFBVCxDQUF1QixLQUF2QixDQUFwQjtBQUNBRCxlQUFXLENBQUNFLFNBQVosQ0FBc0JDLEdBQXRCLENBQTBCLFFBQTFCLEVBQW9DLFNBQXBDO0FBQ0EsUUFBTUMsSUFBSSxHQUFHdkIsUUFBUSxDQUFDb0IsYUFBVCxDQUF1QixHQUF2QixDQUFiO0FBQ0FHLFFBQUksQ0FBQ0MsWUFBTCxDQUFrQixNQUFsQixFQUEwQixHQUExQjtBQUNBRCxRQUFJLENBQUNGLFNBQUwsQ0FBZUMsR0FBZixDQUFtQixtQkFBbkI7QUFDQUMsUUFBSSxDQUFDRSxXQUFMLEdBQW1CWCxJQUFJLENBQUNFLEtBQXhCO0FBQ0FPLFFBQUksQ0FBQ0csZ0JBQUwsQ0FBc0IsT0FBdEIsRUFBK0IsVUFBVUMsQ0FBVixFQUFhO0FBQ3hDQSxPQUFDLENBQUNDLGNBQUY7QUFDSCxLQUZEO0FBR0FULGVBQVcsQ0FBQ1UsV0FBWixDQUF3Qk4sSUFBeEI7QUFFQSxXQUFPSixXQUFQO0FBQ0g7QUE5QlEsQ0FBRCxDQUFaIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL25vLXBlbmRpbmctb3JkZXItdXNlcm5hbWUtYXV0b2NvbXBsZXRlLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsidmFyIGlucHV0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJhdXRvY29tcGxldGVcIik7XHJcblxyXG5hdXRvY29tcGxldGUoe1xyXG4gICAgaW5wdXQ6IGlucHV0LFxyXG4gICAgZW1wdHlNc2c6IFwiQXVjdW4gcsOpc3VsdGF0cyBjb3JyZXNwb25kYW50XCIsXHJcbiAgICBmZXRjaDogZnVuY3Rpb24odGV4dCwgdXBkYXRlKSB7XHJcblxyXG4gICAgICAgIHRleHQgPSB0ZXh0LnRvTG93ZXJDYXNlKCk7XHJcbiAgICAgICAgLy8geW91IGNhbiBhbHNvIHVzZSBBSkFYIHJlcXVlc3RzIGluc3RlYWQgb2YgcHJlbG9hZGVkIGRhdGFcclxuICAgICAgICB2YXIgc3VnZ2VzdGlvbnMgPSBmZXRjaCgnL2JhY2tvZmZpY2UvdXNlcm5hbWVfYXV0b2NvbXBsZXRlP2VtYWlsPScgKyB0ZXh0KVxyXG4gICAgICAgICAgICAudGhlbihyID0+IHtcclxuICAgICAgICAgICAgICAgIHJldHVybiByLmpzb24oKTtcclxuICAgICAgICAgICAgfSkudGhlbihkYXRhID0+IHtcclxuICAgICAgICAgICAgICAgIHVwZGF0ZShkYXRhKTtcclxuICAgICAgICAgICAgfSlcclxuICAgIH0sXHJcbiAgICBvblNlbGVjdDogZnVuY3Rpb24oaXRlbSkge1xyXG4gICAgICAgIGlucHV0LnZhbHVlID0gaXRlbS5lbWFpbDtcclxuICAgIH0sXHJcbiAgICByZW5kZXI6IGZ1bmN0aW9uKGl0ZW0sIGN1cnJlbnRWYWx1ZSkge1xyXG4gICAgICAgIGNvbnN0IGl0ZW1FbGVtZW50ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7XHJcbiAgICAgICAgaXRlbUVsZW1lbnQuY2xhc3NMaXN0LmFkZCgnYm9yZGVyJywgJ3BvaW50ZXInKTtcclxuICAgICAgICBjb25zdCBsaW5rID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnYScpXHJcbiAgICAgICAgbGluay5zZXRBdHRyaWJ1dGUoJ2hyZWYnLCAnIycpXHJcbiAgICAgICAgbGluay5jbGFzc0xpc3QuYWRkKCdhdXRvY29tcGxldGUtaXRlbScpXHJcbiAgICAgICAgbGluay50ZXh0Q29udGVudCA9IGl0ZW0uZW1haWw7XHJcbiAgICAgICAgbGluay5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKVxyXG4gICAgICAgIH0pXHJcbiAgICAgICAgaXRlbUVsZW1lbnQuYXBwZW5kQ2hpbGQobGluaylcclxuXHJcbiAgICAgICAgcmV0dXJuIGl0ZW1FbGVtZW50O1xyXG4gICAgfVxyXG59KTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/no-pending-order-username-autocomplete.js\n");

/***/ }),

/***/ 1:
/*!**********************************************************************!*\
  !*** multi ./resources/js/no-pending-order-username-autocomplete.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\kaamelottse\resources\js\no-pending-order-username-autocomplete.js */"./resources/js/no-pending-order-username-autocomplete.js");


/***/ })

/******/ });