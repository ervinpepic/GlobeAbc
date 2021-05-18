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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools.js":
/*!****************************************************************************************************************************************************************!*\
  !*** E:/Work/Webs/WP/Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools.js ***!
  \****************************************************************************************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tools_database_upgrade__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tools/database/upgrade */ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools/database/upgrade.js");
/* harmony import */ var _tools_database_create_indexs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./tools/database/create_indexs */ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools/database/create_indexs.js");
/* harmony import */ var _tools_database_re_upgrade_db__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./tools/database/re-upgrade-db */ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools/database/re-upgrade-db.js");




(function ($) {
  var $doc = $(document);
  var isRunning = false;

  var installSampleCourse = function installSampleCourse(e) {
    e.preventDefault();
    var $button = $(this);

    if (isRunning) {
      return;
    }

    if (!confirm(lpGlobalSettings.i18n.confirm_install_sample_data)) {
      return;
    }

    $button.addClass('disabled').html($button.data('installing-text'));
    $('.lp-install-sample__response').remove();
    isRunning = true;
    $.ajax({
      url: $button.attr('href'),
      data: $('.lp-install-sample__options').serializeJSON(),
      success: function success(response) {
        $button.removeClass('disabled').html($button.data('text'));
        isRunning = false;
        $(response).insertBefore($button.parent());
      },
      error: function error() {
        $button.removeClass('disabled').html($button.data('text'));
        isRunning = false;
        $(response).insertBefore($button.parent());
      }
    });
  };

  var uninstallSampleCourse = function uninstallSampleCourse(e) {
    e.preventDefault();
    var $button = $(this);

    if (isRunning) {
      return;
    }

    if (!confirm(lpGlobalSettings.i18n.confirm_uninstall_sample_data)) {
      return;
    }

    $button.addClass('disabled').html($button.data('uninstalling-text'));
    isRunning = true;
    $.ajax({
      url: $button.attr('href'),
      success: function success(response) {
        $button.removeClass('disabled').html($button.data('text'));
        isRunning = false;
        $(response).insertBefore($button.parent());
      },
      error: function error() {
        $button.removeClass('disabled').html($button.data('text'));
        isRunning = false;
        $(response).insertBefore($button.parent());
      }
    });
  };

  var clearHardCache = function clearHardCache(e) {
    e.preventDefault();
    var $button = $(this);

    if ($button.hasClass('disabled')) {
      return;
    }

    $button.addClass('disabled').html($button.data('cleaning-text'));
    $.ajax({
      url: $button.attr('href'),
      data: {},
      success: function success(response) {
        $button.removeClass('disabled').html($button.data('text'));
      },
      error: function error() {
        $button.removeClass('disabled').html($button.data('text'));
      }
    });
  };

  var toggleHardCache = function toggleHardCache() {
    $.ajax({
      url: 'admin.php?page=lp-toggle-hard-cache-option',
      data: {
        v: this.checked ? 'yes' : 'no'
      },
      success: function success(response) {},
      error: function error() {}
    });
  };

  var toggleOptions = function toggleOptions(e) {
    e.preventDefault();
    $('.lp-install-sample__options').toggleClass('hide-if-js');
  };

  $(function () {
    Object(_tools_database_upgrade__WEBPACK_IMPORTED_MODULE_0__["default"])();
    Object(_tools_database_create_indexs__WEBPACK_IMPORTED_MODULE_1__["default"])();
    Object(_tools_database_re_upgrade_db__WEBPACK_IMPORTED_MODULE_2__["default"])();
    $doc.on('click', '.lp-install-sample__install', installSampleCourse).on('click', '.lp-install-sample__uninstall', uninstallSampleCourse).on('click', '#learn-press-clear-cache', clearHardCache).on('click', 'input[name="enable_hard_cache"]', toggleHardCache).on('click', '.lp-install-sample__toggle-options', toggleOptions);
  });
})(jQuery);

/***/ }),

/***/ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools/database/create_indexs.js":
/*!***************************************************************************************************************************************************************************************!*\
  !*** E:/Work/Webs/WP/Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools/database/create_indexs.js ***!
  \***************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../utils/lp-modal-overlay */ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/utils/lp-modal-overlay.js");
/* harmony import */ var _utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../utils/handle-ajax-api */ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/utils/handle-ajax-api.js");



var createIndexes = function createIndexes() {
  var elCreateIndexTables = document.querySelector('#lp-tool-create-indexes-tables');

  if (!elCreateIndexTables) {
    return;
  }

  var elBtnCreateIndexes = elCreateIndexTables.querySelector('.lp-btn-create-indexes');
  elBtnCreateIndexes.addEventListener('click', function (e) {
    e.preventDefault();
    var elLoading = elCreateIndexTables.querySelector('.wrapper-lp-loading');

    if (!_utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].init()) {
      return;
    }

    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elLPOverlay.show();
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setContentModal(elLoading.innerHTML);
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setTitleModal(elCreateIndexTables.querySelector('h2').textContent);
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnYes[0].style.display = 'inline-block';
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnYes[0].textContent = 'Run';
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnNo[0].textContent = 'Close';
    var url = '/lp/v1/tools/list-tables-indexs';
    var params = {};
    var functions = {
      success: function success(res) {
        var status = res.status,
            message = res.message,
            _res$data = res.data,
            tables = _res$data.tables,
            table = _res$data.table;
        var elSteps = document.querySelector('.example-lp-group-step');
        _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setContentModal(elSteps.innerHTML);
        var elGroupStep = _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elLPOverlay[0].querySelector('.lp-group-step '); // Show progress when upgrading.

        var showProgress = function showProgress(stepCurrent, percent) {
          var elItemStepCurrent = elGroupStep.querySelector('input[value=' + stepCurrent + ']').closest('.lp-item-step');
          elItemStepCurrent.classList.add('running');

          if (100 === percent) {
            elItemStepCurrent.classList.remove('running');
            elItemStepCurrent.classList.add('completed');
          }

          var progressBar = elItemStepCurrent.querySelector('.progress-bar');
          progressBar.style.width = percent;
        }; // Scroll to step current.


        var scrollToStepCurrent = function scrollToStepCurrent(stepCurrent) {
          var elItemStepCurrent = elGroupStep.querySelector('input[value=' + stepCurrent + ']').closest('.lp-item-step');
          console.log(elItemStepCurrent.offsetTop, _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elMainContent[0].offsetTop);
          var offset = elItemStepCurrent.offsetTop - _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elMainContent[0].offsetTop + _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elMainContent[0].scrollTop;
          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elMainContent.stop().animate({
            scrollTop: offset
          }, 600);
        };

        for (var _table in tables) {
          var elItemStep = _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elLPOverlay[0].querySelector('.lp-item-step').cloneNode(true);
          var input = elItemStep.querySelector('input');
          var label = elItemStep.querySelector('label');
          label.textContent = "Table: ".concat(_table);
          input.value = _table;
          elGroupStep.append(elItemStep);
        }

        _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].callBackYes = function () {
          var url = '/lp/v1/tools/create-indexs';
          var params = {
            tables: tables,
            table: table
          };
          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnNo[0].style.display = 'none';
          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnYes[0].style.display = 'none';
          showProgress(table, 0.1);
          var functions = {
            success: function success(res) {
              var status = res.status,
                  message = res.message,
                  _res$data2 = res.data,
                  table = _res$data2.table,
                  percent = _res$data2.percent;
              showProgress(params.table, percent);

              if (undefined !== table) {
                if (params.table !== table) {
                  showProgress(table, 0.1);
                  scrollToStepCurrent(table);
                }

                params.table = table;
              }

              if ('success' === status) {
                Object(_utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__["default"])(url, params, functions);
              } else if ('finished' === status) {
                console.log('finished');
                _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnNo[0].style.display = 'inline-block';
                _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnNo[0].textContent = 'Finish';
              } else {
                console.log(message);
              }
            },
            error: function error(err) {
              console.log(err);
            },
            completed: function completed() {}
          };
          Object(_utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__["default"])(url, params, functions);
        };
      },
      error: function error(err) {},
      completed: function completed() {}
    };
    Object(_utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__["default"])(url, params, functions);
  });
};

/* harmony default export */ __webpack_exports__["default"] = (createIndexes);

/***/ }),

/***/ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools/database/re-upgrade-db.js":
/*!***************************************************************************************************************************************************************************************!*\
  !*** E:/Work/Webs/WP/Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools/database/re-upgrade-db.js ***!
  \***************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../utils/lp-modal-overlay */ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/utils/lp-modal-overlay.js");
/* harmony import */ var _utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../utils/handle-ajax-api */ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/utils/handle-ajax-api.js");



var reUpgradeDB = function reUpgradeDB() {
  var elToolReUpgradeDB = document.querySelector('#lp-tool-re-upgrade-db');

  if (!elToolReUpgradeDB) {
    return;
  } // Check valid to show popup re-upgrade


  var url = 'lp/v1/database/check-db-valid-re-upgrade';
  Object(_utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__["default"])(url, {}, {
    success: function success(res) {
      var can_re_upgrade = res.data.can_re_upgrade;

      if (!can_re_upgrade) {
        return;
      }

      elToolReUpgradeDB.style.display = 'block';
      var elBtnReUpradeDB = elToolReUpgradeDB.querySelector('.lp-btn-re-upgrade-db');
      var elMessage = elToolReUpgradeDB.querySelector('.learn-press-message');
      elBtnReUpradeDB.addEventListener('click', function () {
        // eslint-disable-next-line no-alert
        if (confirm('Are want Re Upgrade!')) {
          url = 'lp/v1/database/del-tb-lp-upgrade-db';
          Object(_utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__["default"])(url, {}, {
            success: function success(res) {
              var status = res.status,
                  message = res.message,
                  url = res.data.url;

              if ('success' === status && undefined !== url) {
                window.location.href = url;
              }
            },
            error: function error(err) {
              elMessage.classList.add('error');
              elMessage.textContent = err.message;
              elMessage.style.display = 'block';
            }
          });
        }
      });
    },
    error: function error(err) {}
  });
};

/* harmony default export */ __webpack_exports__["default"] = (reUpgradeDB);

/***/ }),

/***/ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools/database/upgrade.js":
/*!*********************************************************************************************************************************************************************************!*\
  !*** E:/Work/Webs/WP/Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/admin/pages/tools/database/upgrade.js ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../utils/lp-modal-overlay */ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/utils/lp-modal-overlay.js");
/* harmony import */ var _utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../utils/handle-ajax-api */ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/utils/handle-ajax-api.js");


var $ = jQuery;
var elToolUpgradeDB = $('#lp-tool-upgrade-db');

var upgradeDB = function upgradeDB() {
  var isUpgrading = 0;
  var elWrapperTermsUpgrade = elToolUpgradeDB.find('.wrapper-terms-upgrade');
  var elStatusUpgrade = elToolUpgradeDB.find('.wrapper-lp-status-upgrade');
  var elWrapperUpgradeMessage = elToolUpgradeDB.find('.wrapper-lp-upgrade-message');
  var checkValidBeforeUpgrade = null;

  if (elWrapperTermsUpgrade.length) {
    // Show Terms Upgrade.
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setContentModal(elWrapperTermsUpgrade.html());
    var elTermUpdate = _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elLPOverlay.find('.terms-upgrade');
    var elLPAgreeTerm = elTermUpdate.find('input[name=lp-agree-term]');
    var elTermMessage = elTermUpdate.find('.error');
    var elMessageUpgrading = $('input[name=message-when-upgrading]').val();

    checkValidBeforeUpgrade = function checkValidBeforeUpgrade() {
      elTermMessage.hide();
      elTermMessage.removeClass('learn-press-message');

      if (elLPAgreeTerm.is(':checked')) {
        Object(_utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__["default"])('/lp/v1/database/agree_terms', {
          agree_terms: 1
        }, {});
        _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elFooter.find('.learn-press-notice').remove();
        _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elFooter.prepend('<span class="learn-press-notice">' + elMessageUpgrading + '</span>');
        _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setContentModal(elStatusUpgrade.html());
        return true;
      }

      elTermMessage.show();
      elTermMessage.addClass('learn-press-message');
      _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elMainContent.animate({
        scrollTop: elTermMessage.offset().top
      });
      return false;
    };
  } else {
    // Show Steps Upgrade.
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setContentModal(elStatusUpgrade.html());

    checkValidBeforeUpgrade = function checkValidBeforeUpgrade() {
      return true;
    };
  }

  _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setTitleModal(elToolUpgradeDB.find('h2').html());
  _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnYes.text('Upgrade');
  _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnYes.show();
  _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnNo.text('close');

  _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].callBackYes = function () {
    if (!checkValidBeforeUpgrade()) {
      return;
    }

    isUpgrading = 1;
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnYes.hide();
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnNo.hide();
    var urlHandle = '/lp/v1/database/upgrade';
    var elGroupStep = _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elLPOverlay.find('.lp-group-step');
    var elItemSteps = elToolUpgradeDB.find('.lp-item-step'); // Get params.

    var steps = [];
    $.each(elItemSteps, function (i, el) {
      var elItemStepsTmp = $(el);

      if (!elItemStepsTmp.hasClass('completed')) {
        var step = elItemStepsTmp.find('input').val();
        steps.push(step);
      }
    });
    var params = {
      steps: steps,
      step: steps[0]
    };
    var elItemStepCurrent = null; // Show progress when upgrading.

    var showProgress = function showProgress(stepCurrent, percent) {
      elItemStepCurrent = elGroupStep.find('input[value=' + stepCurrent + ']').closest('.lp-item-step');
      elItemStepCurrent.addClass('running');

      if (100 === percent) {
        elItemStepCurrent.removeClass('running').addClass('completed');
      }

      elItemStepCurrent.find('.progress-bar').css('width', percent + '%');
      elItemStepCurrent.find('.percent').text(percent + '%');
    }; // Scroll to step current.


    var scrollToStepCurrent = function scrollToStepCurrent(stepCurrent) {
      elItemStepCurrent = elGroupStep.find('input[value=' + stepCurrent + ']').closest('.lp-item-step');
      var offset = elItemStepCurrent.offset().top - _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elMainContent.offset().top + _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elMainContent.scrollTop();
      _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elMainContent.stop().animate({
        scrollTop: offset
      }, 600);
    };

    showProgress(steps[0], 0.1);
    var funcCallBack = {
      success: function success(res) {
        showProgress(params.step, res.percent);

        if (params.step !== res.name) {
          showProgress(res.name, 0.1);
        }

        scrollToStepCurrent(params.step);

        if ('success' === res.status) {
          params.step = res.name;
          params.data = res.data;
          setTimeout(function () {
            Object(_utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__["default"])(urlHandle, params, funcCallBack);
          }, 800);
        } else if ('finished' === res.status) {
          isUpgrading = 0;
          elItemStepCurrent.removeClass('running').addClass('completed');
          setTimeout(function () {
            _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setContentModal(elWrapperUpgradeMessage.html());
          }, 1000);
          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elFooter.find('.learn-press-notice').remove();
          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnNo.show();
          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnNo.on('click', function () {
            window.location.reload();
          });
        } else {
          isUpgrading = 0;
          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elFooter.find('.learn-press-notice').remove();
          elItemStepCurrent.removeClass('running').addClass('error');
          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setContentModal(elWrapperUpgradeMessage.html(), function () {
            _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnYes.text('Retry').show();

            _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].callBackYes = function () {
              window.location.href = 'wp-admin/admin.php?page=learn-press-tools&tab=database&action=upgrade-db';
            };

            _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnNo.show();

            if (!res.message) {
              res.message = 'Upgrade not success! Please clear cache, restart sever then retry or contact to LP to help';
            }

            _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elMainContent.find('.learn-press-message').addClass('error').html(res.message);
          });
        }
      },
      error: function error(err) {
        isUpgrading = 0;
        _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setContentModal(elWrapperUpgradeMessage.html(), function () {
          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnYes.text('Retry').show();

          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].callBackYes = function () {
            window.location.location = 'wp-admin/admin.php?page=learn-press-tools&tab=database&action=upgrade-db';
          };

          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elBtnNo.show();

          if (!err.message) {
            err.message = 'Upgrade not success! Something wrong. Please clear cache, restart sever then retry or contact to LP to help';
          }

          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elMainContent.find('.learn-press-message').addClass('error').html(err.message);
        });
      },
      completed: function completed() {}
    };
    Object(_utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__["default"])(urlHandle, params, funcCallBack);
  }; // Show confirm if, within upgrading, the user reload the page.


  window.onbeforeunload = function () {
    if (isUpgrading) {
      return 'LP is upgrading Database. Are you want to reload page?';
    }
  }; // Show confirm if, within upgrading, the user close the page.


  window.onclose = function () {
    if (isUpgrading) {
      return 'LP is upgrading Database. Are you want to close page?';
    }
  };
};

var getStepsUpgradeStatus = function getStepsUpgradeStatus() {
  if (!elToolUpgradeDB.length) {
    return;
  } // initial LP Modal Overlay


  if (!_utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].init()) {
    return;
  }

  var elWrapperStatusUpgrade = $('.wrapper-lp-status-upgrade');
  var urlHandle = '/lp/v1/database/get_steps'; // Show dialog upgrade database.

  var queryString = window.location.search;
  var urlParams = new URLSearchParams(queryString);
  var action = urlParams.get('action');

  if ('upgrade-db' === action) {
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elLPOverlay.show();
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setTitleModal(elToolUpgradeDB.find('h2').html());
    _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].setContentModal($('.wrapper-lp-loading').html());
  }

  var funcCallBack = {
    success: function success(res) {
      var steps_completed = res.steps_completed,
          steps_default = res.steps_default;

      if (undefined === steps_completed || undefined === steps_default) {
        console.log('invalid steps_completed and steps_default');
        return false;
      } // Render show Steps.


      var htmlStep = '';

      for (var k_gr_steps in steps_default) {
        var step_group = steps_default[k_gr_steps];
        var steps = step_group.steps;
        htmlStep = '<div class="lp-group-step">';
        htmlStep += '<h3>' + step_group.label + '</h3>';

        for (var k_step in steps) {
          var step = steps[k_step];
          var completed = '';

          if (undefined !== steps_completed[k_step]) {
            completed = 'completed';
          }

          htmlStep += '<div class="lp-item-step ' + completed + '">';
          htmlStep += '<div class="lp-item-step-left"><input type="hidden" name="lp_steps_upgrade_db[]" value="' + step.name + '"  /></div>';
          htmlStep += '<div class="lp-item-step-right">';
          htmlStep += '<label for=""><strong></strong>' + step.label + '</label>';
          htmlStep += '<div class="description">' + step.description + '</div>';
          htmlStep += '<div class="percent"></div>';
          htmlStep += '<span class="progress-bar"></span>';
          htmlStep += '</div>';
          htmlStep += '</div>';
        }

        htmlStep += '</div>';
        elWrapperStatusUpgrade.append(htmlStep);
        var elBtnUpgradeDB = $('.lp-btn-upgrade-db');

        if ('upgrade-db' === action) {
          upgradeDB();
        }

        elBtnUpgradeDB.on('click', function () {
          _utils_lp_modal_overlay__WEBPACK_IMPORTED_MODULE_0__["default"].elLPOverlay.show();
          upgradeDB();
        });
      }
    },
    error: function error(err) {},
    completed: function completed() {}
  };
  Object(_utils_handle_ajax_api__WEBPACK_IMPORTED_MODULE_1__["default"])(urlHandle, {}, funcCallBack);
};

/* harmony default export */ __webpack_exports__["default"] = (getStepsUpgradeStatus);

/***/ }),

/***/ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/utils/handle-ajax-api.js":
/*!********************************************************************************************************************************************************************!*\
  !*** E:/Work/Webs/WP/Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/utils/handle-ajax-api.js ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var handleAjax = function handleAjax(url, params, functions) {
  wp.apiFetch({
    path: url,
    method: 'POST',
    data: params
  }).then(function (res) {
    if ('function' === typeof functions.success) {
      functions.success(res);
    }
  })["catch"](function (err) {
    if ('function' === typeof functions.error) {
      functions.error(err);
    }
  }).then(function () {
    if ('function' === typeof functions.completed) {
      functions.completed();
    }
  });
};

/* harmony default export */ __webpack_exports__["default"] = (handleAjax);

/***/ }),

/***/ "../../../Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/utils/lp-modal-overlay.js":
/*!*********************************************************************************************************************************************************************!*\
  !*** E:/Work/Webs/WP/Clouds/Thimpress/Plugins/github.com/learnpress_v4_modify_step_install_after_activated/learnpress/assets/src/apps/js/utils/lp-modal-overlay.js ***!
  \*********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var $ = jQuery;
var elLPOverlay = null;
var lpModalOverlay = {
  elLPOverlay: null,
  elMainContent: null,
  elTitle: null,
  elBtnYes: null,
  elBtnNo: null,
  elFooter: null,
  elCalledModal: null,
  callBackYes: null,
  instance: null,
  init: function init() {
    if (this.instance) {
      return true;
    }

    this.elLPOverlay = $('.lp-overlay');

    if (!this.elLPOverlay.length) {
      return false;
    }

    elLPOverlay = this.elLPOverlay;
    this.elMainContent = elLPOverlay.find('.main-content');
    this.elTitle = elLPOverlay.find('.modal-title');
    this.elBtnYes = elLPOverlay.find('.btn-yes');
    this.elBtnNo = elLPOverlay.find('.btn-no');
    this.elFooter = elLPOverlay.find('.lp-modal-footer');
    $(document).on('click', '.close, .btn-no', function () {
      elLPOverlay.hide();
    });
    $(document).on('click', '.btn-yes', function (e) {
      e.preventDefault();
      e.stopPropagation();

      if ('function' === typeof lpModalOverlay.callBackYes) {
        lpModalOverlay.callBackYes();
      }
    });
    this.instance = this;
    return true;
  },
  setElCalledModal: function setElCalledModal(elCalledModal) {
    this.elCalledModal = elCalledModal;
  },
  setContentModal: function setContentModal(content, event) {
    this.elMainContent.html(content);

    if ('function' === typeof event) {
      event();
    }
  },
  setTitleModal: function setTitleModal(content) {
    this.elTitle.html(content);
  }
};
/* harmony default export */ __webpack_exports__["default"] = (lpModalOverlay);

/***/ })

/******/ });
//# sourceMappingURL=tools.js.map