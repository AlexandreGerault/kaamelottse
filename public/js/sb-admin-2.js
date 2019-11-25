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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/sb-admin-2.js":
/*!************************************!*\
  !*** ./resources/js/sb-admin-2.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("(function ($) {\n  \"use strict\"; // Start of use strict\n  // Toggle the side navigation\n\n  $(\"#sidebarToggle, #sidebarToggleTop\").on('click', function (e) {\n    $(\"body\").toggleClass(\"sidebar-toggled\");\n    $(\".sidebar\").toggleClass(\"toggled\");\n\n    if ($(\".sidebar\").hasClass(\"toggled\")) {\n      $('.sidebar .collapse').collapse('hide');\n    }\n\n    ;\n  }); // Close any open menu accordions when window is resized below 768px\n\n  $(window).resize(function () {\n    if ($(window).width() < 768) {\n      $('.sidebar .collapse').collapse('hide');\n    }\n\n    ;\n  }); // Prevent the content wrapper from scrolling when the fixed side navigation hovered over\n\n  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {\n    if ($(window).width() > 768) {\n      var e0 = e.originalEvent,\n          delta = e0.wheelDelta || -e0.detail;\n      this.scrollTop += (delta < 0 ? 1 : -1) * 30;\n      e.preventDefault();\n    }\n  }); // Scroll to top button appear\n\n  $(document).on('scroll', function () {\n    var scrollDistance = $(this).scrollTop();\n\n    if (scrollDistance > 100) {\n      $('.scroll-to-top').fadeIn();\n    } else {\n      $('.scroll-to-top').fadeOut();\n    }\n  }); // Smooth scrolling using jQuery easing\n\n  $(document).on('click', 'a.scroll-to-top', function (e) {\n    var $anchor = $(this);\n    $('html, body').stop().animate({\n      scrollTop: $($anchor.attr('href')).offset().top\n    }, 1000, 'easeInOutExpo');\n    e.preventDefault();\n  });\n})(jQuery); // End of use strict//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2ItYWRtaW4tMi5qcz9lZTAwIl0sIm5hbWVzIjpbIiQiLCJvbiIsImUiLCJ0b2dnbGVDbGFzcyIsImhhc0NsYXNzIiwiY29sbGFwc2UiLCJ3aW5kb3ciLCJyZXNpemUiLCJ3aWR0aCIsImUwIiwib3JpZ2luYWxFdmVudCIsImRlbHRhIiwid2hlZWxEZWx0YSIsImRldGFpbCIsInNjcm9sbFRvcCIsInByZXZlbnREZWZhdWx0IiwiZG9jdW1lbnQiLCJzY3JvbGxEaXN0YW5jZSIsImZhZGVJbiIsImZhZGVPdXQiLCIkYW5jaG9yIiwic3RvcCIsImFuaW1hdGUiLCJhdHRyIiwib2Zmc2V0IiwidG9wIiwialF1ZXJ5Il0sIm1hcHBpbmdzIjoiQUFBQSxDQUFDLFVBQVNBLENBQVQsRUFBWTtBQUNYLGVBRFcsQ0FDRztBQUVkOztBQUNBQSxHQUFDLENBQUMsbUNBQUQsQ0FBRCxDQUF1Q0MsRUFBdkMsQ0FBMEMsT0FBMUMsRUFBbUQsVUFBU0MsQ0FBVCxFQUFZO0FBQzdERixLQUFDLENBQUMsTUFBRCxDQUFELENBQVVHLFdBQVYsQ0FBc0IsaUJBQXRCO0FBQ0FILEtBQUMsQ0FBQyxVQUFELENBQUQsQ0FBY0csV0FBZCxDQUEwQixTQUExQjs7QUFDQSxRQUFJSCxDQUFDLENBQUMsVUFBRCxDQUFELENBQWNJLFFBQWQsQ0FBdUIsU0FBdkIsQ0FBSixFQUF1QztBQUNyQ0osT0FBQyxDQUFDLG9CQUFELENBQUQsQ0FBd0JLLFFBQXhCLENBQWlDLE1BQWpDO0FBQ0Q7O0FBQUE7QUFDRixHQU5ELEVBSlcsQ0FZWDs7QUFDQUwsR0FBQyxDQUFDTSxNQUFELENBQUQsQ0FBVUMsTUFBVixDQUFpQixZQUFXO0FBQzFCLFFBQUlQLENBQUMsQ0FBQ00sTUFBRCxDQUFELENBQVVFLEtBQVYsS0FBb0IsR0FBeEIsRUFBNkI7QUFDM0JSLE9BQUMsQ0FBQyxvQkFBRCxDQUFELENBQXdCSyxRQUF4QixDQUFpQyxNQUFqQztBQUNEOztBQUFBO0FBQ0YsR0FKRCxFQWJXLENBbUJYOztBQUNBTCxHQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkMsRUFBN0IsQ0FBZ0MsaUNBQWhDLEVBQW1FLFVBQVNDLENBQVQsRUFBWTtBQUM3RSxRQUFJRixDQUFDLENBQUNNLE1BQUQsQ0FBRCxDQUFVRSxLQUFWLEtBQW9CLEdBQXhCLEVBQTZCO0FBQzNCLFVBQUlDLEVBQUUsR0FBR1AsQ0FBQyxDQUFDUSxhQUFYO0FBQUEsVUFDRUMsS0FBSyxHQUFHRixFQUFFLENBQUNHLFVBQUgsSUFBaUIsQ0FBQ0gsRUFBRSxDQUFDSSxNQUQvQjtBQUVBLFdBQUtDLFNBQUwsSUFBa0IsQ0FBQ0gsS0FBSyxHQUFHLENBQVIsR0FBWSxDQUFaLEdBQWdCLENBQUMsQ0FBbEIsSUFBdUIsRUFBekM7QUFDQVQsT0FBQyxDQUFDYSxjQUFGO0FBQ0Q7QUFDRixHQVBELEVBcEJXLENBNkJYOztBQUNBZixHQUFDLENBQUNnQixRQUFELENBQUQsQ0FBWWYsRUFBWixDQUFlLFFBQWYsRUFBeUIsWUFBVztBQUNsQyxRQUFJZ0IsY0FBYyxHQUFHakIsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRYyxTQUFSLEVBQXJCOztBQUNBLFFBQUlHLGNBQWMsR0FBRyxHQUFyQixFQUEwQjtBQUN4QmpCLE9BQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9Ca0IsTUFBcEI7QUFDRCxLQUZELE1BRU87QUFDTGxCLE9BQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CbUIsT0FBcEI7QUFDRDtBQUNGLEdBUEQsRUE5QlcsQ0F1Q1g7O0FBQ0FuQixHQUFDLENBQUNnQixRQUFELENBQUQsQ0FBWWYsRUFBWixDQUFlLE9BQWYsRUFBd0IsaUJBQXhCLEVBQTJDLFVBQVNDLENBQVQsRUFBWTtBQUNyRCxRQUFJa0IsT0FBTyxHQUFHcEIsQ0FBQyxDQUFDLElBQUQsQ0FBZjtBQUNBQSxLQUFDLENBQUMsWUFBRCxDQUFELENBQWdCcUIsSUFBaEIsR0FBdUJDLE9BQXZCLENBQStCO0FBQzdCUixlQUFTLEVBQUdkLENBQUMsQ0FBQ29CLE9BQU8sQ0FBQ0csSUFBUixDQUFhLE1BQWIsQ0FBRCxDQUFELENBQXdCQyxNQUF4QixHQUFpQ0M7QUFEaEIsS0FBL0IsRUFFRyxJQUZILEVBRVMsZUFGVDtBQUdBdkIsS0FBQyxDQUFDYSxjQUFGO0FBQ0QsR0FORDtBQVFELENBaERELEVBZ0RHVyxNQWhESCxFLENBZ0RZIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3NiLWFkbWluLTIuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oJCkge1xuICBcInVzZSBzdHJpY3RcIjsgLy8gU3RhcnQgb2YgdXNlIHN0cmljdFxuXG4gIC8vIFRvZ2dsZSB0aGUgc2lkZSBuYXZpZ2F0aW9uXG4gICQoXCIjc2lkZWJhclRvZ2dsZSwgI3NpZGViYXJUb2dnbGVUb3BcIikub24oJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xuICAgICQoXCJib2R5XCIpLnRvZ2dsZUNsYXNzKFwic2lkZWJhci10b2dnbGVkXCIpO1xuICAgICQoXCIuc2lkZWJhclwiKS50b2dnbGVDbGFzcyhcInRvZ2dsZWRcIik7XG4gICAgaWYgKCQoXCIuc2lkZWJhclwiKS5oYXNDbGFzcyhcInRvZ2dsZWRcIikpIHtcbiAgICAgICQoJy5zaWRlYmFyIC5jb2xsYXBzZScpLmNvbGxhcHNlKCdoaWRlJyk7XG4gICAgfTtcbiAgfSk7XG5cbiAgLy8gQ2xvc2UgYW55IG9wZW4gbWVudSBhY2NvcmRpb25zIHdoZW4gd2luZG93IGlzIHJlc2l6ZWQgYmVsb3cgNzY4cHhcbiAgJCh3aW5kb3cpLnJlc2l6ZShmdW5jdGlvbigpIHtcbiAgICBpZiAoJCh3aW5kb3cpLndpZHRoKCkgPCA3NjgpIHtcbiAgICAgICQoJy5zaWRlYmFyIC5jb2xsYXBzZScpLmNvbGxhcHNlKCdoaWRlJyk7XG4gICAgfTtcbiAgfSk7XG5cbiAgLy8gUHJldmVudCB0aGUgY29udGVudCB3cmFwcGVyIGZyb20gc2Nyb2xsaW5nIHdoZW4gdGhlIGZpeGVkIHNpZGUgbmF2aWdhdGlvbiBob3ZlcmVkIG92ZXJcbiAgJCgnYm9keS5maXhlZC1uYXYgLnNpZGViYXInKS5vbignbW91c2V3aGVlbCBET01Nb3VzZVNjcm9sbCB3aGVlbCcsIGZ1bmN0aW9uKGUpIHtcbiAgICBpZiAoJCh3aW5kb3cpLndpZHRoKCkgPiA3NjgpIHtcbiAgICAgIHZhciBlMCA9IGUub3JpZ2luYWxFdmVudCxcbiAgICAgICAgZGVsdGEgPSBlMC53aGVlbERlbHRhIHx8IC1lMC5kZXRhaWw7XG4gICAgICB0aGlzLnNjcm9sbFRvcCArPSAoZGVsdGEgPCAwID8gMSA6IC0xKSAqIDMwO1xuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIH1cbiAgfSk7XG5cbiAgLy8gU2Nyb2xsIHRvIHRvcCBidXR0b24gYXBwZWFyXG4gICQoZG9jdW1lbnQpLm9uKCdzY3JvbGwnLCBmdW5jdGlvbigpIHtcbiAgICB2YXIgc2Nyb2xsRGlzdGFuY2UgPSAkKHRoaXMpLnNjcm9sbFRvcCgpO1xuICAgIGlmIChzY3JvbGxEaXN0YW5jZSA+IDEwMCkge1xuICAgICAgJCgnLnNjcm9sbC10by10b3AnKS5mYWRlSW4oKTtcbiAgICB9IGVsc2Uge1xuICAgICAgJCgnLnNjcm9sbC10by10b3AnKS5mYWRlT3V0KCk7XG4gICAgfVxuICB9KTtcblxuICAvLyBTbW9vdGggc2Nyb2xsaW5nIHVzaW5nIGpRdWVyeSBlYXNpbmdcbiAgJChkb2N1bWVudCkub24oJ2NsaWNrJywgJ2Euc2Nyb2xsLXRvLXRvcCcsIGZ1bmN0aW9uKGUpIHtcbiAgICB2YXIgJGFuY2hvciA9ICQodGhpcyk7XG4gICAgJCgnaHRtbCwgYm9keScpLnN0b3AoKS5hbmltYXRlKHtcbiAgICAgIHNjcm9sbFRvcDogKCQoJGFuY2hvci5hdHRyKCdocmVmJykpLm9mZnNldCgpLnRvcClcbiAgICB9LCAxMDAwLCAnZWFzZUluT3V0RXhwbycpO1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgfSk7XG5cbn0pKGpRdWVyeSk7IC8vIEVuZCBvZiB1c2Ugc3RyaWN0XG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/sb-admin-2.js\n");

/***/ }),

/***/ 2:
/*!******************************************!*\
  !*** multi ./resources/js/sb-admin-2.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/kaamelottse.fr/resources/js/sb-admin-2.js */"./resources/js/sb-admin-2.js");


/***/ })

/******/ });