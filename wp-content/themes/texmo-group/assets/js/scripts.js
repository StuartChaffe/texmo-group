/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/components/fade.js":
/*!***********************************!*\
  !*** ./src/js/components/fade.js ***!
  \***********************************/
/***/ (() => {

eval("jQuery(function ($) {\n  function Animation() {\n    $('.fade').each(function () {\n      //var ImageHeight = $(window).height() / 2;\n      var screenHeight = $(window).height() - 200;\n\n      if ($(document).scrollTop() >= $(this).offset().top - screenHeight) {\n        $(this).addClass('fade--visible');\n      }\n    });\n  }\n\n  ;\n  Animation();\n  $(document).scroll(function () {\n    Animation();\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9vcmlnaW4vLi9zcmMvanMvY29tcG9uZW50cy9mYWRlLmpzP2VmMzAiXSwibmFtZXMiOlsialF1ZXJ5IiwiJCIsIkFuaW1hdGlvbiIsImVhY2giLCJzY3JlZW5IZWlnaHQiLCJ3aW5kb3ciLCJoZWlnaHQiLCJkb2N1bWVudCIsInNjcm9sbFRvcCIsIm9mZnNldCIsInRvcCIsImFkZENsYXNzIiwic2Nyb2xsIl0sIm1hcHBpbmdzIjoiQUFBQUEsTUFBTSxDQUFDLFVBQVVDLENBQVYsRUFBYTtBQUNuQixXQUFTQyxTQUFULEdBQXFCO0FBQ3BCRCxJQUFBQSxDQUFDLENBQUMsT0FBRCxDQUFELENBQVdFLElBQVgsQ0FBZ0IsWUFBVTtBQUN6QjtBQUNBLFVBQUlDLFlBQVksR0FBR0gsQ0FBQyxDQUFDSSxNQUFELENBQUQsQ0FBVUMsTUFBVixLQUFxQixHQUF4Qzs7QUFDQSxVQUFHTCxDQUFDLENBQUNNLFFBQUQsQ0FBRCxDQUFZQyxTQUFaLE1BQTJCUCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFRLE1BQVIsR0FBaUJDLEdBQWpCLEdBQXVCTixZQUFyRCxFQUFtRTtBQUNuRUgsUUFBQUEsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRVSxRQUFSLENBQWlCLGVBQWpCO0FBQ0M7QUFDRCxLQU5EO0FBT0E7O0FBQUE7QUFDRFQsRUFBQUEsU0FBUztBQUNSRCxFQUFBQSxDQUFDLENBQUNNLFFBQUQsQ0FBRCxDQUFZSyxNQUFaLENBQW1CLFlBQVU7QUFDN0JWLElBQUFBLFNBQVM7QUFDVCxHQUZBO0FBR0QsQ0FkSyxDQUFOIiwic291cmNlc0NvbnRlbnQiOlsialF1ZXJ5KGZ1bmN0aW9uICgkKSB7XG5cdGZ1bmN0aW9uIEFuaW1hdGlvbigpIHtcblx0XHQkKCcuZmFkZScpLmVhY2goZnVuY3Rpb24oKXtcblx0XHRcdC8vdmFyIEltYWdlSGVpZ2h0ID0gJCh3aW5kb3cpLmhlaWdodCgpIC8gMjtcblx0XHRcdHZhciBzY3JlZW5IZWlnaHQgPSAkKHdpbmRvdykuaGVpZ2h0KCkgLSAyMDA7XG5cdFx0XHRpZigkKGRvY3VtZW50KS5zY3JvbGxUb3AoKSA+PSAkKHRoaXMpLm9mZnNldCgpLnRvcCAtIHNjcmVlbkhlaWdodCkge1xuXHRcdFx0JCh0aGlzKS5hZGRDbGFzcygnZmFkZS0tdmlzaWJsZScpO1xuXHRcdFx0fSBcblx0XHR9KTtcblx0fTtcblx0QW5pbWF0aW9uKCk7XG5cdFx0JChkb2N1bWVudCkuc2Nyb2xsKGZ1bmN0aW9uKCl7XG5cdFx0QW5pbWF0aW9uKCk7XG5cdH0pO1xufSkiXSwiZmlsZSI6Ii4vc3JjL2pzL2NvbXBvbmVudHMvZmFkZS5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/js/components/fade.js\n");

/***/ }),

/***/ "./src/js/components/menu.js":
/*!***********************************!*\
  !*** ./src/js/components/menu.js ***!
  \***********************************/
/***/ (() => {

eval("jQuery(document).ready(function ($) {\n  // Primary nav\n  var $menuBtn = $(\".global-header--nav-btn\");\n  var $menuContainer = $(\".global-header--nav__mobile\");\n  $menuBtn.click(function () {\n    $(this).toggleClass(\"is-active\");\n    $(\"body\").toggleClass(\"menu-active\");\n    $(\".global-header\").toggleClass(\"global-header-active\");\n    $menuContainer.toggleClass(\"is-active\");\n  });\n  $(window).on(\"scroll\", function () {\n    if ($(window).scrollTop() > 80) {\n      $(\"header\").addClass(\"global-header-active\");\n    } else {\n      //remove the background property so it comes transparent again (defined in your css)\n      $(\"header\").removeClass(\"global-header-active\");\n    }\n  });\n}); // jQuery(document).ready(function($) {\n// // Hide Header on on scroll down\n// var didScroll;\n// var lastScrollTop = 0;\n// var delta = 5;\n// var navbarHeight = $('header').outerHeight();\n// $(window).scroll(function(event){\n//     didScroll = true;\n// });\n// setInterval(function() {\n//     if (didScroll) {\n//         hasScrolled();\n//         didScroll = false;\n//     }\n// }, 250);\n// function hasScrolled() {\n//     var st = $(this).scrollTop();\n//     // Make sure they scroll more than delta\n//     if(Math.abs(lastScrollTop - st) <= delta)\n//         return;\n//     // If they scrolled down and are past the navbar, add class .nav-up.\n//     // This is necessary so you never see what is \"behind\" the navbar.\n//     if (st > lastScrollTop && st > navbarHeight){\n//         // Scroll Down\n//         $('header').removeClass('nav-down').addClass('global-header__hide');\n//     } else {\n//         // Scroll Up\n//         if(st + $(window).height() < $(document).height()) {\n//             $('header').removeClass('global-header__hide').addClass('nav-down');\n//         }\n//     }\n//     lastScrollTop = st;\n// }\n// });//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9vcmlnaW4vLi9zcmMvanMvY29tcG9uZW50cy9tZW51LmpzP2ViOTEiXSwibmFtZXMiOlsialF1ZXJ5IiwiZG9jdW1lbnQiLCJyZWFkeSIsIiQiLCIkbWVudUJ0biIsIiRtZW51Q29udGFpbmVyIiwiY2xpY2siLCJ0b2dnbGVDbGFzcyIsIndpbmRvdyIsIm9uIiwic2Nyb2xsVG9wIiwiYWRkQ2xhc3MiLCJyZW1vdmVDbGFzcyJdLCJtYXBwaW5ncyI6IkFBQUFBLE1BQU0sQ0FBQ0MsUUFBRCxDQUFOLENBQWlCQyxLQUFqQixDQUF1QixVQUFTQyxDQUFULEVBQVk7QUFFbEM7QUFDQSxNQUFJQyxRQUFRLEdBQUdELENBQUMsQ0FBQyx5QkFBRCxDQUFoQjtBQUNBLE1BQUlFLGNBQWMsR0FBR0YsQ0FBQyxDQUFDLDZCQUFELENBQXRCO0FBQ0FDLEVBQUFBLFFBQVEsQ0FBQ0UsS0FBVCxDQUFlLFlBQVc7QUFDekJILElBQUFBLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUksV0FBUixDQUFvQixXQUFwQjtBQUNBSixJQUFBQSxDQUFDLENBQUMsTUFBRCxDQUFELENBQVVJLFdBQVYsQ0FBc0IsYUFBdEI7QUFDQUosSUFBQUEsQ0FBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JJLFdBQXBCLENBQWdDLHNCQUFoQztBQUNBRixJQUFBQSxjQUFjLENBQUNFLFdBQWYsQ0FBMkIsV0FBM0I7QUFDQSxHQUxEO0FBT0FKLEVBQUFBLENBQUMsQ0FBQ0ssTUFBRCxDQUFELENBQVVDLEVBQVYsQ0FBYSxRQUFiLEVBQXVCLFlBQVc7QUFDakMsUUFBR04sQ0FBQyxDQUFDSyxNQUFELENBQUQsQ0FBVUUsU0FBVixLQUF3QixFQUEzQixFQUErQjtBQUM5QlAsTUFBQUEsQ0FBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZUSxRQUFaLENBQXFCLHNCQUFyQjtBQUNBLEtBRkQsTUFFTztBQUNOO0FBQ0FSLE1BQUFBLENBQUMsQ0FBQyxRQUFELENBQUQsQ0FBWVMsV0FBWixDQUF3QixzQkFBeEI7QUFDQTtBQUNELEdBUEQ7QUFTQSxDQXJCRCxFLENBdUJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7QUFFQTtBQUNBO0FBQ0E7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUE7QUFDQTtBQUVBIiwic291cmNlc0NvbnRlbnQiOlsialF1ZXJ5KGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigkKSB7XG5cblx0Ly8gUHJpbWFyeSBuYXZcblx0dmFyICRtZW51QnRuID0gJChcIi5nbG9iYWwtaGVhZGVyLS1uYXYtYnRuXCIpO1xuXHR2YXIgJG1lbnVDb250YWluZXIgPSAkKFwiLmdsb2JhbC1oZWFkZXItLW5hdl9fbW9iaWxlXCIpO1xuXHQkbWVudUJ0bi5jbGljayhmdW5jdGlvbigpIHtcblx0XHQkKHRoaXMpLnRvZ2dsZUNsYXNzKFwiaXMtYWN0aXZlXCIpO1xuXHRcdCQoXCJib2R5XCIpLnRvZ2dsZUNsYXNzKFwibWVudS1hY3RpdmVcIik7XG5cdFx0JChcIi5nbG9iYWwtaGVhZGVyXCIpLnRvZ2dsZUNsYXNzKFwiZ2xvYmFsLWhlYWRlci1hY3RpdmVcIik7XG5cdFx0JG1lbnVDb250YWluZXIudG9nZ2xlQ2xhc3MoXCJpcy1hY3RpdmVcIik7XG5cdH0pO1xuXG5cdCQod2luZG93KS5vbihcInNjcm9sbFwiLCBmdW5jdGlvbigpIHtcblx0XHRpZigkKHdpbmRvdykuc2Nyb2xsVG9wKCkgPiA4MCkge1xuXHRcdFx0JChcImhlYWRlclwiKS5hZGRDbGFzcyhcImdsb2JhbC1oZWFkZXItYWN0aXZlXCIpO1xuXHRcdH0gZWxzZSB7XG5cdFx0XHQvL3JlbW92ZSB0aGUgYmFja2dyb3VuZCBwcm9wZXJ0eSBzbyBpdCBjb21lcyB0cmFuc3BhcmVudCBhZ2FpbiAoZGVmaW5lZCBpbiB5b3VyIGNzcylcblx0XHRcdCQoXCJoZWFkZXJcIikucmVtb3ZlQ2xhc3MoXCJnbG9iYWwtaGVhZGVyLWFjdGl2ZVwiKTtcblx0XHR9XG5cdH0pO1xuXG59KTtcblxuLy8galF1ZXJ5KGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigkKSB7XG4vLyAvLyBIaWRlIEhlYWRlciBvbiBvbiBzY3JvbGwgZG93blxuLy8gdmFyIGRpZFNjcm9sbDtcbi8vIHZhciBsYXN0U2Nyb2xsVG9wID0gMDtcbi8vIHZhciBkZWx0YSA9IDU7XG4vLyB2YXIgbmF2YmFySGVpZ2h0ID0gJCgnaGVhZGVyJykub3V0ZXJIZWlnaHQoKTtcblxuLy8gJCh3aW5kb3cpLnNjcm9sbChmdW5jdGlvbihldmVudCl7XG4vLyAgICAgZGlkU2Nyb2xsID0gdHJ1ZTtcbi8vIH0pO1xuXG4vLyBzZXRJbnRlcnZhbChmdW5jdGlvbigpIHtcbi8vICAgICBpZiAoZGlkU2Nyb2xsKSB7XG4vLyAgICAgICAgIGhhc1Njcm9sbGVkKCk7XG4vLyAgICAgICAgIGRpZFNjcm9sbCA9IGZhbHNlO1xuLy8gICAgIH1cbi8vIH0sIDI1MCk7XG5cbi8vIGZ1bmN0aW9uIGhhc1Njcm9sbGVkKCkge1xuLy8gICAgIHZhciBzdCA9ICQodGhpcykuc2Nyb2xsVG9wKCk7XG4gICAgXG4vLyAgICAgLy8gTWFrZSBzdXJlIHRoZXkgc2Nyb2xsIG1vcmUgdGhhbiBkZWx0YVxuLy8gICAgIGlmKE1hdGguYWJzKGxhc3RTY3JvbGxUb3AgLSBzdCkgPD0gZGVsdGEpXG4vLyAgICAgICAgIHJldHVybjtcbiAgICBcbi8vICAgICAvLyBJZiB0aGV5IHNjcm9sbGVkIGRvd24gYW5kIGFyZSBwYXN0IHRoZSBuYXZiYXIsIGFkZCBjbGFzcyAubmF2LXVwLlxuLy8gICAgIC8vIFRoaXMgaXMgbmVjZXNzYXJ5IHNvIHlvdSBuZXZlciBzZWUgd2hhdCBpcyBcImJlaGluZFwiIHRoZSBuYXZiYXIuXG4vLyAgICAgaWYgKHN0ID4gbGFzdFNjcm9sbFRvcCAmJiBzdCA+IG5hdmJhckhlaWdodCl7XG4vLyAgICAgICAgIC8vIFNjcm9sbCBEb3duXG4vLyAgICAgICAgICQoJ2hlYWRlcicpLnJlbW92ZUNsYXNzKCduYXYtZG93bicpLmFkZENsYXNzKCdnbG9iYWwtaGVhZGVyX19oaWRlJyk7XG4vLyAgICAgfSBlbHNlIHtcbi8vICAgICAgICAgLy8gU2Nyb2xsIFVwXG4vLyAgICAgICAgIGlmKHN0ICsgJCh3aW5kb3cpLmhlaWdodCgpIDwgJChkb2N1bWVudCkuaGVpZ2h0KCkpIHtcbi8vICAgICAgICAgICAgICQoJ2hlYWRlcicpLnJlbW92ZUNsYXNzKCdnbG9iYWwtaGVhZGVyX19oaWRlJykuYWRkQ2xhc3MoJ25hdi1kb3duJyk7XG4vLyAgICAgICAgIH1cbi8vICAgICB9XG4gICAgXG4vLyAgICAgbGFzdFNjcm9sbFRvcCA9IHN0O1xuLy8gfVxuXG4vLyB9KTsiXSwiZmlsZSI6Ii4vc3JjL2pzL2NvbXBvbmVudHMvbWVudS5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/js/components/menu.js\n");

/***/ }),

/***/ "./src/js/components/modal.js":
/*!************************************!*\
  !*** ./src/js/components/modal.js ***!
  \************************************/
/***/ (() => {

eval("jQuery(document).ready(function ($) {\n  $('.featherlight').featherlight({\n    closeIcon: 'close'\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9vcmlnaW4vLi9zcmMvanMvY29tcG9uZW50cy9tb2RhbC5qcz8yYTEwIl0sIm5hbWVzIjpbImpRdWVyeSIsImRvY3VtZW50IiwicmVhZHkiLCIkIiwiZmVhdGhlcmxpZ2h0IiwiY2xvc2VJY29uIl0sIm1hcHBpbmdzIjoiQUFBQUEsTUFBTSxDQUFDQyxRQUFELENBQU4sQ0FBaUJDLEtBQWpCLENBQXVCLFVBQVNDLENBQVQsRUFBWTtBQUNsQ0EsRUFBQUEsQ0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUFtQkMsWUFBbkIsQ0FBZ0M7QUFDL0JDLElBQUFBLFNBQVMsRUFBRTtBQURvQixHQUFoQztBQUdBLENBSkQiLCJzb3VyY2VzQ29udGVudCI6WyJqUXVlcnkoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCQpIHtcblx0JCgnLmZlYXRoZXJsaWdodCcpLmZlYXRoZXJsaWdodCh7XG5cdFx0Y2xvc2VJY29uOiAnY2xvc2UnLFxuXHR9KTtcbn0pOyJdLCJmaWxlIjoiLi9zcmMvanMvY29tcG9uZW50cy9tb2RhbC5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/js/components/modal.js\n");

/***/ }),

/***/ "./src/js/components/no-js.js":
/*!************************************!*\
  !*** ./src/js/components/no-js.js ***!
  \************************************/
/***/ (() => {

"use strict";
eval("\n\ndocument.addEventListener(\"DOMContentLoaded\", function () {\n  document.body.classList.remove(\"no-js\");\n  document.body.classList.add(\"js\");\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9vcmlnaW4vLi9zcmMvanMvY29tcG9uZW50cy9uby1qcy5qcz9lMzk5Il0sIm5hbWVzIjpbImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsImJvZHkiLCJjbGFzc0xpc3QiLCJyZW1vdmUiLCJhZGQiXSwibWFwcGluZ3MiOiJBQUFhOztBQUViQSxRQUFRLENBQUNDLGdCQUFULENBQTBCLGtCQUExQixFQUE4QyxZQUFXO0FBQ3hERCxVQUFRLENBQUNFLElBQVQsQ0FBY0MsU0FBZCxDQUF3QkMsTUFBeEIsQ0FBK0IsT0FBL0I7QUFDQUosVUFBUSxDQUFDRSxJQUFULENBQWNDLFNBQWQsQ0FBd0JFLEdBQXhCLENBQTRCLElBQTVCO0FBQ0EsQ0FIRCIsImZpbGUiOiIuL3NyYy9qcy9jb21wb25lbnRzL25vLWpzLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xuXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiRE9NQ29udGVudExvYWRlZFwiLCBmdW5jdGlvbigpIHtcblx0ZG9jdW1lbnQuYm9keS5jbGFzc0xpc3QucmVtb3ZlKFwibm8tanNcIik7XG5cdGRvY3VtZW50LmJvZHkuY2xhc3NMaXN0LmFkZChcImpzXCIpO1xufSk7XG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./src/js/components/no-js.js\n");

/***/ }),

/***/ "./src/js/components/toggle.js":
/*!*************************************!*\
  !*** ./src/js/components/toggle.js ***!
  \*************************************/
/***/ (() => {

"use strict";
eval("\n/**\n * Toggle script that is useful for showing navigation, modals, etc.\n *\n * The following data attributes are supported:\n *\n * data-toggle\n * data-toggle-class\n * data-toggle-body-class\n */\n\n(function () {\n  var elements = document.querySelectorAll('[data-toggle]');\n\n  if (elements.length === 0) {\n    return false;\n  }\n\n  elements.forEach(function (element) {\n    var targetElement = document.querySelector(element.dataset.toggle);\n\n    if (!targetElement) {\n      return;\n    }\n\n    var bodyClass = element.dataset.toggleBodyClass;\n    var toggleClass = element.dataset.toggleClass || 'is-toggled';\n    element.addEventListener('click', function () {\n      var isToggled = element.classList.contains(toggleClass);\n      targetElement.classList.toggle(toggleClass);\n      element.classList.toggle(toggleClass);\n      element.setAttribute('aria-expanded', isToggled ? 'false' : 'true');\n      targetElement.setAttribute('aria-hidden', isToggled ? 'true' : 'false');\n\n      if (bodyClass) {\n        document.body.classList.toggle(bodyClass);\n      }\n    }, false);\n  });\n})();//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9vcmlnaW4vLi9zcmMvanMvY29tcG9uZW50cy90b2dnbGUuanM/OTVjMCJdLCJuYW1lcyI6WyJlbGVtZW50cyIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvckFsbCIsImxlbmd0aCIsImZvckVhY2giLCJlbGVtZW50IiwidGFyZ2V0RWxlbWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJkYXRhc2V0IiwidG9nZ2xlIiwiYm9keUNsYXNzIiwidG9nZ2xlQm9keUNsYXNzIiwidG9nZ2xlQ2xhc3MiLCJhZGRFdmVudExpc3RlbmVyIiwiaXNUb2dnbGVkIiwiY2xhc3NMaXN0IiwiY29udGFpbnMiLCJzZXRBdHRyaWJ1dGUiLCJib2R5Il0sIm1hcHBpbmdzIjoiQUFBYTtBQUViO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQyxhQUFZO0FBQ1osTUFBTUEsUUFBUSxHQUFHQyxRQUFRLENBQUNDLGdCQUFULENBQTBCLGVBQTFCLENBQWpCOztBQUVBLE1BQUlGLFFBQVEsQ0FBQ0csTUFBVCxLQUFvQixDQUF4QixFQUEyQjtBQUMxQixXQUFPLEtBQVA7QUFDQTs7QUFFREgsVUFBUSxDQUFDSSxPQUFULENBQWlCLFVBQUFDLE9BQU8sRUFBSTtBQUMzQixRQUFNQyxhQUFhLEdBQUdMLFFBQVEsQ0FBQ00sYUFBVCxDQUF1QkYsT0FBTyxDQUFDRyxPQUFSLENBQWdCQyxNQUF2QyxDQUF0Qjs7QUFFQSxRQUFJLENBQUNILGFBQUwsRUFBb0I7QUFDbkI7QUFDQTs7QUFFRCxRQUFNSSxTQUFTLEdBQUdMLE9BQU8sQ0FBQ0csT0FBUixDQUFnQkcsZUFBbEM7QUFDQSxRQUFNQyxXQUFXLEdBQUdQLE9BQU8sQ0FBQ0csT0FBUixDQUFnQkksV0FBaEIsSUFBK0IsWUFBbkQ7QUFFQVAsV0FBTyxDQUFDUSxnQkFBUixDQUF5QixPQUF6QixFQUFrQyxZQUFNO0FBQ3ZDLFVBQU1DLFNBQVMsR0FBR1QsT0FBTyxDQUFDVSxTQUFSLENBQWtCQyxRQUFsQixDQUEyQkosV0FBM0IsQ0FBbEI7QUFDQU4sbUJBQWEsQ0FBQ1MsU0FBZCxDQUF3Qk4sTUFBeEIsQ0FBK0JHLFdBQS9CO0FBQ0FQLGFBQU8sQ0FBQ1UsU0FBUixDQUFrQk4sTUFBbEIsQ0FBeUJHLFdBQXpCO0FBRUFQLGFBQU8sQ0FBQ1ksWUFBUixDQUFxQixlQUFyQixFQUFzQ0gsU0FBUyxHQUFHLE9BQUgsR0FBYSxNQUE1RDtBQUNBUixtQkFBYSxDQUFDVyxZQUFkLENBQTJCLGFBQTNCLEVBQTBDSCxTQUFTLEdBQUcsTUFBSCxHQUFZLE9BQS9EOztBQUVBLFVBQUlKLFNBQUosRUFBZTtBQUNkVCxnQkFBUSxDQUFDaUIsSUFBVCxDQUFjSCxTQUFkLENBQXdCTixNQUF4QixDQUErQkMsU0FBL0I7QUFDQTtBQUNELEtBWEQsRUFXRyxLQVhIO0FBWUEsR0F0QkQ7QUF1QkEsQ0E5QkEsR0FBRCIsImZpbGUiOiIuL3NyYy9qcy9jb21wb25lbnRzL3RvZ2dsZS5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JztcblxuLyoqXG4gKiBUb2dnbGUgc2NyaXB0IHRoYXQgaXMgdXNlZnVsIGZvciBzaG93aW5nIG5hdmlnYXRpb24sIG1vZGFscywgZXRjLlxuICpcbiAqIFRoZSBmb2xsb3dpbmcgZGF0YSBhdHRyaWJ1dGVzIGFyZSBzdXBwb3J0ZWQ6XG4gKlxuICogZGF0YS10b2dnbGVcbiAqIGRhdGEtdG9nZ2xlLWNsYXNzXG4gKiBkYXRhLXRvZ2dsZS1ib2R5LWNsYXNzXG4gKi9cblxuKGZ1bmN0aW9uICgpIHtcblx0Y29uc3QgZWxlbWVudHMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCdbZGF0YS10b2dnbGVdJyk7XG5cdFxuXHRpZiAoZWxlbWVudHMubGVuZ3RoID09PSAwKSB7XG5cdFx0cmV0dXJuIGZhbHNlO1xuXHR9XG5cdFxuXHRlbGVtZW50cy5mb3JFYWNoKGVsZW1lbnQgPT4ge1xuXHRcdGNvbnN0IHRhcmdldEVsZW1lbnQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKGVsZW1lbnQuZGF0YXNldC50b2dnbGUpO1xuXHRcblx0XHRpZiAoIXRhcmdldEVsZW1lbnQpIHtcblx0XHRcdHJldHVybjtcblx0XHR9XG5cdFx0XG5cdFx0Y29uc3QgYm9keUNsYXNzID0gZWxlbWVudC5kYXRhc2V0LnRvZ2dsZUJvZHlDbGFzcztcblx0XHRjb25zdCB0b2dnbGVDbGFzcyA9IGVsZW1lbnQuZGF0YXNldC50b2dnbGVDbGFzcyB8fCAnaXMtdG9nZ2xlZCc7XG5cdFxuXHRcdGVsZW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiB7XG5cdFx0XHRjb25zdCBpc1RvZ2dsZWQgPSBlbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyh0b2dnbGVDbGFzcyk7XG5cdFx0XHR0YXJnZXRFbGVtZW50LmNsYXNzTGlzdC50b2dnbGUodG9nZ2xlQ2xhc3MpO1xuXHRcdFx0ZWxlbWVudC5jbGFzc0xpc3QudG9nZ2xlKHRvZ2dsZUNsYXNzKTtcblx0XHRcdFxuXHRcdFx0ZWxlbWVudC5zZXRBdHRyaWJ1dGUoJ2FyaWEtZXhwYW5kZWQnLCBpc1RvZ2dsZWQgPyAnZmFsc2UnIDogJ3RydWUnKTtcblx0XHRcdHRhcmdldEVsZW1lbnQuc2V0QXR0cmlidXRlKCdhcmlhLWhpZGRlbicsIGlzVG9nZ2xlZCA/ICd0cnVlJyA6ICdmYWxzZScpO1xuXHRcdFx0XG5cdFx0XHRpZiAoYm9keUNsYXNzKSB7XG5cdFx0XHRcdGRvY3VtZW50LmJvZHkuY2xhc3NMaXN0LnRvZ2dsZShib2R5Q2xhc3MpO1xuXHRcdFx0fVxuXHRcdH0sIGZhbHNlKTtcblx0fSk7XG59KCkpO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/js/components/toggle.js\n");

/***/ }),

/***/ "./src/js/scripts.js":
/*!***************************!*\
  !*** ./src/js/scripts.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _components_no_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/no-js */ \"./src/js/components/no-js.js\");\n/* harmony import */ var _components_no_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_components_no_js__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _components_toggle__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/toggle */ \"./src/js/components/toggle.js\");\n/* harmony import */ var _components_toggle__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_components_toggle__WEBPACK_IMPORTED_MODULE_1__);\n/* harmony import */ var _components_menu__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/menu */ \"./src/js/components/menu.js\");\n/* harmony import */ var _components_menu__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_components_menu__WEBPACK_IMPORTED_MODULE_2__);\n/* harmony import */ var _components_fade__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/fade */ \"./src/js/components/fade.js\");\n/* harmony import */ var _components_fade__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_components_fade__WEBPACK_IMPORTED_MODULE_3__);\n/* harmony import */ var _components_modal__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./components/modal */ \"./src/js/components/modal.js\");\n/* harmony import */ var _components_modal__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_components_modal__WEBPACK_IMPORTED_MODULE_4__);\n\n\n // import './components/cookie';\n\n\n\n\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9vcmlnaW4vLi9zcmMvanMvc2NyaXB0cy5qcz9hMzA0Il0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7O0FBQWE7O0NBR2I7O0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6Ii4vc3JjL2pzL3NjcmlwdHMuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIndXNlIHN0cmljdCc7XG5cbmltcG9ydCAnLi9jb21wb25lbnRzL25vLWpzJztcbi8vIGltcG9ydCAnLi9jb21wb25lbnRzL2Nvb2tpZSc7XG5pbXBvcnQgJy4vY29tcG9uZW50cy90b2dnbGUnO1xuaW1wb3J0ICcuL2NvbXBvbmVudHMvbWVudSc7XG5pbXBvcnQgJy4vY29tcG9uZW50cy9mYWRlJztcbmltcG9ydCAnLi9jb21wb25lbnRzL21vZGFsJztcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./src/js/scripts.js\n");

/***/ }),

/***/ "./src/styles/styles.scss":
/*!********************************!*\
  !*** ./src/styles/styles.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9vcmlnaW4vLi9zcmMvc3R5bGVzL3N0eWxlcy5zY3NzP2E2ZjkiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IjtBQUFBIiwiZmlsZSI6Ii4vc3JjL3N0eWxlcy9zdHlsZXMuc2Nzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./src/styles/styles.scss\n");

/***/ }),

/***/ "./src/styles/editor-style.scss":
/*!**************************************!*\
  !*** ./src/styles/editor-style.scss ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9vcmlnaW4vLi9zcmMvc3R5bGVzL2VkaXRvci1zdHlsZS5zY3NzPzNhM2MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IjtBQUFBIiwiZmlsZSI6Ii4vc3JjL3N0eWxlcy9lZGl0b3Itc3R5bGUuc2Nzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./src/styles/editor-style.scss\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/******/ 	// the startup function
/******/ 	// It's empty as some runtime module handles the default behavior
/******/ 	__webpack_require__.x = x => {};
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// Promise = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/scripts": 0
/******/ 		};
/******/ 		
/******/ 		var deferredModules = [
/******/ 			["./src/js/scripts.js"],
/******/ 			["./src/styles/styles.scss"],
/******/ 			["./src/styles/editor-style.scss"]
/******/ 		];
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		var checkDeferredModules = x => {};
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime, executeModules] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0, resolves = [];
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					resolves.push(installedChunks[chunkId][0]);
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			while(resolves.length) {
/******/ 				resolves.shift()();
/******/ 			}
/******/ 		
/******/ 			// add entry modules from loaded chunk to deferred list
/******/ 			if(executeModules) deferredModules.push.apply(deferredModules, executeModules);
/******/ 		
/******/ 			// run deferred modules when all chunks ready
/******/ 			return checkDeferredModules();
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkorigin"] = self["webpackChunkorigin"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 		
/******/ 		function checkDeferredModulesImpl() {
/******/ 			var result;
/******/ 			for(var i = 0; i < deferredModules.length; i++) {
/******/ 				var deferredModule = deferredModules[i];
/******/ 				var fulfilled = true;
/******/ 				for(var j = 1; j < deferredModule.length; j++) {
/******/ 					var depId = deferredModule[j];
/******/ 					if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferredModules.splice(i--, 1);
/******/ 					result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 				}
/******/ 			}
/******/ 			if(deferredModules.length === 0) {
/******/ 				__webpack_require__.x();
/******/ 				__webpack_require__.x = x => {};
/******/ 			}
/******/ 			return result;
/******/ 		}
/******/ 		var startup = __webpack_require__.x;
/******/ 		__webpack_require__.x = () => {
/******/ 			// reset startup function so it can be called again when more startup code is added
/******/ 			__webpack_require__.x = startup || (x => {});
/******/ 			return (checkDeferredModules = checkDeferredModulesImpl)();
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// run startup
/******/ 	var __webpack_exports__ = __webpack_require__.x();
/******/ 	
/******/ })()
;