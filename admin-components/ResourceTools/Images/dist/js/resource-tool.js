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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(2);
module.exports = __webpack_require__(21);


/***/ }),
/* 2 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_Images__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_Images___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_Images__);


App.booting(function (Vue, router) {
    Vue.component('images-tool', __WEBPACK_IMPORTED_MODULE_0__components_Images___default.a);
});

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(4)
/* template */
var __vue_template__ = __webpack_require__(20)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/Images.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-258c34a3", Component.options)
  } else {
    hotAPI.reload("data-v-258c34a3", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 4 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__LoadArea__ = __webpack_require__(5);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__LoadArea___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__LoadArea__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__LoadedFiles__ = __webpack_require__(8);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__LoadedFiles___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__LoadedFiles__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__Catalog__ = __webpack_require__(14);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__Catalog___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2__Catalog__);
function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }

//
//
//
//
//
//
//
//
//
//
//





/* harmony default export */ __webpack_exports__["default"] = ({
    components: { Catalog: __WEBPACK_IMPORTED_MODULE_2__Catalog___default.a, LoadedFiles: __WEBPACK_IMPORTED_MODULE_1__LoadedFiles___default.a, LoadArea: __WEBPACK_IMPORTED_MODULE_0__LoadArea___default.a },

    props: {
        resourceName: {},
        resourceId: {},
        multiple: {
            type: Boolean,
            default: true
        }
    },

    data: function data() {
        return {
            loadedImages: [],
            images: [],
            loading: false,
            loadingRemove: false,
            loadingSetMain: false
        };
    },
    created: function created() {
        this.fetch();
    },


    methods: {
        fetch: function fetch() {
            var _this = this;

            App.api.request({
                url: 'resource-tool/images/' + this.resourceName + '/' + this.resourceId
            }).then(function (_ref) {
                var images = _ref.images;

                _this.images = images;
            });
        },
        removeLoaded: function removeLoaded(index) {
            this.loadedImages = this.loadedImages.filter(function (value, i) {
                return i !== index;
            });
        },
        load: function load(files) {
            var _this2 = this;

            Array.from(files).forEach(function (file) {
                var errors = file.errors;
                file = new File([file], file.name, { type: file.type });
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var fileData = {
                        file: file,
                        full_urls: {
                            default: reader.result
                        },
                        name: file.name,
                        file_name: file.name,
                        errors: errors,
                        loading: false
                    };
                    if (_this2.multiple) {
                        _this2.loadedImages.push(fileData);
                    } else {
                        _this2.loadedImages = [fileData];
                    }

                    _this2.upload();
                };
            });
        },
        upload: function upload() {
            var index = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;

            if (!this.loadedImages.length) {
                this.loading = false;
                return;
            }

            if (this.loading) return;

            this.loading = true;

            var file = void 0;

            while (true) {
                if (!this.loadedImages[index]) {
                    this.loading = false;
                    return;
                }

                file = this.loadedImages[index];

                if (!file.errors.length) break;

                index++;
            }

            file.loading = true;

            this.uploadRequest(file, index);
        },
        uploadRequest: function uploadRequest(file, index) {
            var _this3 = this;

            var files = [file];

            files = files.filter(function (file) {
                return !file.sending;
            });

            if (!files.length) return;

            files.forEach(function (file) {
                return file.sending = true;
            });

            App.api.request({
                method: 'POST',
                url: 'resource-tool/images/' + this.resourceName + '/' + this.resourceId,
                data: {
                    images: files
                }
            }).then(function (_ref2) {
                var _images;

                var images = _ref2.images;

                App.$emit('imageUploaded', files);
                App.$emit('indexRefresh');

                _this3.loading = false;

                _this3.loadedImages = _this3.loadedImages.filter(function (value, i) {
                    return i !== index;
                });

                (_images = _this3.images).push.apply(_images, _toConsumableArray(images));

                _this3.upload();

                _this3.$toasted.show(files.length > 1 ? _this3.__('The images was uploaded!') : _this3.__('The image was uploaded!'), { type: 'success' });
            });
        },
        remove: function remove(index) {
            var _this4 = this;

            if (this.loadingRemove) return;

            if (!confirm(this.__('Are you sure to delete the image?'))) return;

            this.loadingRemove = true;

            var image = this.images.find(function (value, i) {
                return i === index;
            });
            image.loading = true;

            App.api.request({
                method: 'DELETE',
                url: 'resource-tool/images/' + this.resourceName + '/' + this.resourceId,
                data: {
                    images: [image.id]
                }
            }).then(function () {
                _this4.loadingRemove = false;

                App.$emit('imageRemoved', image);
                App.$emit('indexRefresh');

                _this4.images = _this4.images.filter(function (value, i) {
                    return i !== index;
                });

                if (image.main && _this4.images.length) _this4.images[0].main = true;

                _this4.$toasted.show(_this4.__('The image was removed!'), { type: 'success' });
            }).catch(function () {
                _this4.loadingRemove = false;
            });
        },
        setMain: function setMain(index) {
            var _this5 = this;

            if (this.loadingSetMain) return;

            this.loadingSetMain = true;

            var image = this.images.find(function (value, i) {
                return i === index;
            });
            image.loading = true;

            App.api.request({
                method: 'PUT',
                url: 'resource-tool/images/main/' + image.id
            }).then(function () {
                _this5.loadingSetMain = false;

                App.$emit('imageSetMain', image);
                App.$emit('indexRefresh');

                _this5.images.forEach(function (value, i) {
                    return value.main = i === index;
                });

                _this5.$toasted.show(_this5.__('The image was set as main!'), { type: 'success' });
            }).catch(function () {
                _this5.loadingSetMain = false;
            });
        }
    }
});

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(6)
/* template */
var __vue_template__ = __webpack_require__(7)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/LoadArea.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0364ba7e", Component.options)
  } else {
    hotAPI.reload("data-v-0364ba7e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 6 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    name: "LoadArea",

    props: {
        maxSize: {
            type: Number,
            default: 2
        }
    },

    data: function data() {
        return {
            over: false
        };
    },
    created: function created() {
        document.addEventListener('drop', this.drop);
    },


    methods: {
        checkSize: function checkSize(file) {
            if (!file.errors) file.errors = [];

            if (file.size > this.maxSize * 1000000) {
                file.errors.push(this.__('Max file size is :sizeMB', { size: this.maxSize }));
                return false;
            }

            return true;
        },
        drop: function drop(event) {
            event.preventDefault();
            this.over = false;

            var files = event.dataTransfer.files;

            this.load(files);

            return false;
        },
        load: function load(files) {
            var _this = this;

            [].concat(_toConsumableArray(files)).forEach(function (file) {
                return _this.checkSize(file);
            });

            this.$emit('load', files);
        }
    }
});

/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      ref: "area",
      staticClass: "gallery__load-area",
      on: {
        dragover: function($event) {
          $event.preventDefault()
          _vm.over = true
        },
        dragleave: function($event) {
          $event.preventDefault()
          _vm.over = false
        }
      }
    },
    [
      _c(
        "label",
        {
          staticClass:
            "gallery__load-area__label w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-sm tracking-wide uppercase border border-grey border-dashed cursor-pointer hover:bg-grey-lighter",
          class: { "gallery__load-area--over": _vm.over }
        },
        [
          _c(
            "svg",
            {
              staticClass: "gallery__load-area__icon w-8 h-8",
              attrs: {
                fill: "currentColor",
                xmlns: "http://www.w3.org/2000/svg",
                viewBox: "0 0 20 20"
              }
            },
            [
              _c("path", {
                attrs: {
                  d:
                    "M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"
                }
              })
            ]
          ),
          _vm._v(" "),
          _c(
            "span",
            {
              staticClass:
                "gallery__load-area__text mt-2 text-base leading-normal"
            },
            [_vm._t("default", [_vm._v(_vm._s(_vm.__("Выберите файл")))])],
            2
          ),
          _vm._v(" "),
          _c("input", {
            staticClass: "gallery__load-area__input hidden",
            attrs: { type: "file", multiple: "" },
            on: {
              change: function($event) {
                return _vm.load($event.target.files)
              }
            }
          })
        ]
      )
    ]
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-0364ba7e", module.exports)
  }
}

/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(9)
/* template */
var __vue_template__ = __webpack_require__(13)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/LoadedFiles.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7853c757", Component.options)
  } else {
    hotAPI.reload("data-v-7853c757", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 9 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__ElementForLoad__ = __webpack_require__(10);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__ElementForLoad___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__ElementForLoad__);
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
    name: "LoadedFiles",
    components: { ElementForLoad: __WEBPACK_IMPORTED_MODULE_0__ElementForLoad___default.a },

    props: {
        images: {}
    }
});

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(11)
/* template */
var __vue_template__ = __webpack_require__(12)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/ElementForLoad.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-2cd3f85e", Component.options)
  } else {
    hotAPI.reload("data-v-2cd3f85e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 11 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    name: 'ElementForLoad',

    props: {
        loading: {
            type: Boolean,
            default: false
        },
        errors: {
            type: Array,
            default: function _default() {}
        }
    },

    methods: {
        act: function act() {
            if (this.errors.length) {
                this.$emit('remove');
                return;
            }

            this.$emit('upload');
        }
    }
});

/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "gallery__element gallery__element--for-load gallery__image",
      class: { "gallery__element--error": _vm.errors.length }
    },
    [
      _vm._t("default"),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "gallery__element__overlay", on: { click: _vm.act } },
        [
          !_vm.loading && !_vm.errors.length
            ? _c(
                "svg",
                {
                  staticClass: "gallery__load-area__icon w-8 h-8",
                  attrs: {
                    fill: "currentColor",
                    xmlns: "http://www.w3.org/2000/svg",
                    viewBox: "0 0 20 20"
                  }
                },
                [
                  _c("path", {
                    attrs: {
                      d:
                        "M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"
                    }
                  })
                ]
              )
            : _vm._e(),
          _vm._v(" "),
          _vm.loading
            ? _c("i", {
                staticClass: "fas fa-spinner-third gallery__element__loading"
              })
            : _vm._e(),
          _vm._v(" "),
          _vm._l(_vm.errors, function(error) {
            return _c("div", { staticClass: "gallery__element__error" }, [
              _vm._v(_vm._s(error))
            ])
          }),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "gallery__element__remove",
              on: {
                click: function($event) {
                  $event.stopPropagation()
                  return _vm.$emit("remove")
                }
              }
            },
            [_c("i", { staticClass: "far fa-times" })]
          )
        ],
        2
      )
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-2cd3f85e", module.exports)
  }
}

/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "gallery__loaded-files flex flex-wrap -mx-2" },
    [
      _vm._l(_vm.images, function(image, $i) {
        return _c(
          "element-for-load",
          {
            key: $i,
            staticClass: "mx-2 mb-4",
            attrs: { loading: image.loading, errors: image.errors },
            on: {
              remove: function($event) {
                return _vm.$emit("remove", $i)
              },
              upload: function($event) {
                return _vm.$emit("upload", $i)
              }
            }
          },
          [_c("img", { attrs: { src: image.full_urls.default, alt: "" } })]
        )
      }),
      _vm._v(" "),
      _c("hr", { staticClass: "gallery__hr mt-2 mb-6" })
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-7853c757", module.exports)
  }
}

/***/ }),
/* 14 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(15)
/* template */
var __vue_template__ = __webpack_require__(19)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/Catalog.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-c9165604", Component.options)
  } else {
    hotAPI.reload("data-v-c9165604", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 15 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__ImageElement__ = __webpack_require__(16);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__ImageElement___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__ImageElement__);
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
    name: "Catalog",
    components: { ImageElement: __WEBPACK_IMPORTED_MODULE_0__ImageElement___default.a },
    props: {
        images: {}
    }
});

/***/ }),
/* 16 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(17)
/* template */
var __vue_template__ = __webpack_require__(18)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/ImageElement.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-5277dc8c", Component.options)
  } else {
    hotAPI.reload("data-v-5277dc8c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 17 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    name: 'ImageElement',

    props: {
        main: {}
    }
});

/***/ }),
/* 18 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "gallery__element gallery__image" },
    [
      _vm._t("default"),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass:
            "gallery__element__overlay gallery__element__overlay--transparent",
          on: {
            click: function($event) {
              return _vm.$emit("upload")
            }
          }
        },
        [
          _c(
            "div",
            {
              staticClass: "gallery__element__remove",
              on: {
                click: function($event) {
                  $event.stopPropagation()
                  return _vm.$emit("remove")
                }
              }
            },
            [_c("i", { staticClass: "far fa-trash-alt" })]
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "gallery__element__main",
          class: { "gallery__element__main--active": _vm.main },
          attrs: { title: _vm.__("Главное изображение") },
          on: {
            click: function($event) {
              return _vm.$emit("setMain")
            }
          }
        },
        [_c("i", { staticClass: "fa-star", class: _vm.main ? "fas" : "far" })]
      )
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-5277dc8c", module.exports)
  }
}

/***/ }),
/* 19 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "gallery__catalog flex flex-wrap -mx-2" },
    _vm._l(_vm.images, function(image, $i) {
      return _c(
        "image-element",
        {
          key: $i,
          staticClass: "mx-2 mb-4",
          attrs: { main: image.main },
          on: {
            remove: function($event) {
              return _vm.$emit("remove", $i)
            },
            setMain: function($event) {
              return _vm.$emit("setMain", $i)
            }
          }
        },
        [_c("img", { attrs: { src: image.url, alt: "" } })]
      )
    }),
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-c9165604", module.exports)
  }
}

/***/ }),
/* 20 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "gallery" },
    [
      _c("load-area", { staticClass: "mb-4", on: { load: _vm.load } }),
      _vm._v(" "),
      _vm.loadedImages.length
        ? _c("loaded-files", {
            attrs: { images: _vm.loadedImages },
            on: { remove: _vm.removeLoaded, upload: _vm.upload }
          })
        : _vm._e(),
      _vm._v(" "),
      _c("catalog", {
        attrs: { images: _vm.images },
        on: { remove: _vm.remove, setMain: _vm.setMain }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-258c34a3", module.exports)
  }
}

/***/ }),
/* 21 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);