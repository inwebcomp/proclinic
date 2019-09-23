!function(e){var t={};function r(a){if(t[a])return t[a].exports;var n=t[a]={i:a,l:!1,exports:{}};return e[a].call(n.exports,n,n.exports,r),n.l=!0,n.exports}r.m=e,r.c=t,r.d=function(e,t,a){r.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:a})},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=1)}([function(e,t){e.exports=function(e,t,r,a,n,i){var o,s=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(o=e,s=e.default);var u,c="function"==typeof s?s.options:s;if(t&&(c.render=t.render,c.staticRenderFns=t.staticRenderFns,c._compiled=!0),r&&(c.functional=!0),n&&(c._scopeId=n),i?(u=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),a&&a.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(i)},c._ssrRegister=u):a&&(u=a),u){var d=c.functional,f=d?c.render:c.beforeCreate;d?(c._injectStyles=u,c.render=function(e,t){return u.call(t),f(e,t)}):c.beforeCreate=f?[].concat(f,u):[u]}return{esModule:o,exports:s,options:c}}},function(e,t,r){r(2),e.exports=r(21)},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=r(3),n=r.n(a);App.booting(function(e,t){e.component("images-tool",n.a)})},function(e,t,r){var a=r(0)(r(4),r(20),!1,null,null,null);e.exports=a.exports},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=r(5),n=r.n(a),i=r(8),o=r.n(i),s=r(14),l=r.n(s);t.default={components:{Catalog:l.a,LoadedFiles:o.a,LoadArea:n.a},props:{resourceName:{},resourceId:{},multiple:{type:Boolean,default:!0}},data:function(){return{loadedImages:[],images:[],loading:!1,loadingRemove:!1,loadingSetMain:!1}},created:function(){this.fetch()},methods:{fetch:function(){var e=this;App.api.request({url:"resource-tool/images/"+this.resourceName+"/"+this.resourceId}).then(function(t){var r=t.images;e.images=r})},removeLoaded:function(e){this.loadedImages=this.loadedImages.filter(function(t,r){return r!==e})},load:function(e){var t=this;Array.from(e).forEach(function(e){var r=e.errors;e=new File([e],e.name,{type:e.type});var a=new FileReader;a.readAsDataURL(e),a.onload=function(){var n={file:e,full_urls:{default:a.result},name:e.name,file_name:e.name,errors:r,loading:!1};t.multiple?t.loadedImages.push(n):t.loadedImages=[n],t.upload()}})},upload:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0;if(this.loadedImages.length){if(!this.loading){this.loading=!0;for(var t=void 0;;){if(!this.loadedImages[e])return void(this.loading=!1);if(!(t=this.loadedImages[e]).errors.length)break;e++}t.loading=!0,this.uploadRequest(t,e)}}else this.loading=!1},uploadRequest:function(e,t){var r=this,a=[e];(a=a.filter(function(e){return!e.sending})).length&&(a.forEach(function(e){return e.sending=!0}),App.api.request({method:"POST",url:"resource-tool/images/"+this.resourceName+"/"+this.resourceId,data:{images:a}}).then(function(e){var n,i=e.images;App.$emit("imageUploaded",a),App.$emit("indexRefresh"),r.loading=!1,r.loadedImages=r.loadedImages.filter(function(e,r){return r!==t}),(n=r.images).push.apply(n,function(e){if(Array.isArray(e)){for(var t=0,r=Array(e.length);t<e.length;t++)r[t]=e[t];return r}return Array.from(e)}(i)),r.upload(),r.$toasted.show(a.length>1?r.__("The images was uploaded!"):r.__("The image was uploaded!"),{type:"success"})}))},remove:function(e){var t=this;if(!this.loadingRemove&&confirm(this.__("Are you sure to delete the image?"))){this.loadingRemove=!0;var r=this.images.find(function(t,r){return r===e});r.loading=!0,App.api.request({method:"DELETE",url:"resource-tool/images/"+this.resourceName+"/"+this.resourceId,data:{images:[r.id]}}).then(function(){t.loadingRemove=!1,App.$emit("imageRemoved",r),App.$emit("indexRefresh"),t.images=t.images.filter(function(t,r){return r!==e}),r.main&&t.images.length&&(t.images[0].main=!0),t.$toasted.show(t.__("The image was removed!"),{type:"success"})}).catch(function(){t.loadingRemove=!1})}},setMain:function(e){var t=this;if(!this.loadingSetMain){this.loadingSetMain=!0;var r=this.images.find(function(t,r){return r===e});r.loading=!0,App.api.request({method:"PUT",url:"resource-tool/images/main/"+r.id}).then(function(){t.loadingSetMain=!1,App.$emit("imageSetMain",r),App.$emit("indexRefresh"),t.images.forEach(function(t,r){return t.main=r===e}),t.$toasted.show(t.__("The image was set as main!"),{type:"success"})}).catch(function(){t.loadingSetMain=!1})}}}}},function(e,t,r){var a=r(0)(r(6),r(7),!1,null,null,null);e.exports=a.exports},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={name:"LoadArea",props:{maxSize:{type:Number,default:2}},data:function(){return{over:!1}},created:function(){document.addEventListener("drop",this.drop)},methods:{checkSize:function(e){return e.errors||(e.errors=[]),!(e.size>1e6*this.maxSize)||(e.errors.push(this.__("Max file size is :sizeMB",{size:this.maxSize})),!1)},drop:function(e){e.preventDefault(),this.over=!1;var t=e.dataTransfer.files;return this.load(t),!1},load:function(e){var t=this;[].concat(function(e){if(Array.isArray(e)){for(var t=0,r=Array(e.length);t<e.length;t++)r[t]=e[t];return r}return Array.from(e)}(e)).forEach(function(e){return t.checkSize(e)}),this.$emit("load",e)}}}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{ref:"area",staticClass:"gallery__load-area",on:{dragover:function(t){t.preventDefault(),e.over=!0},dragleave:function(t){t.preventDefault(),e.over=!1}}},[r("label",{staticClass:"gallery__load-area__label w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-sm tracking-wide uppercase border border-grey border-dashed cursor-pointer hover:bg-grey-lighter",class:{"gallery__load-area--over":e.over}},[r("svg",{staticClass:"gallery__load-area__icon w-8 h-8",attrs:{fill:"currentColor",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"}},[r("path",{attrs:{d:"M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"}})]),e._v(" "),r("span",{staticClass:"gallery__load-area__text mt-2 text-base leading-normal"},[e._t("default",[e._v(e._s(e.__("Выберите файл")))])],2),e._v(" "),r("input",{staticClass:"gallery__load-area__input hidden",attrs:{type:"file",multiple:""},on:{change:function(t){return e.load(t.target.files)}}})])])},staticRenderFns:[]}},function(e,t,r){var a=r(0)(r(9),r(13),!1,null,null,null);e.exports=a.exports},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=r(10),n=r.n(a);t.default={name:"LoadedFiles",components:{ElementForLoad:n.a},props:{images:{}}}},function(e,t,r){var a=r(0)(r(11),r(12),!1,null,null,null);e.exports=a.exports},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={name:"ElementForLoad",props:{loading:{type:Boolean,default:!1},errors:{type:Array,default:function(){}}},methods:{act:function(){this.errors.length?this.$emit("remove"):this.$emit("upload")}}}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"gallery__element gallery__element--for-load gallery__image",class:{"gallery__element--error":e.errors.length}},[e._t("default"),e._v(" "),r("div",{staticClass:"gallery__element__overlay",on:{click:e.act}},[e.loading||e.errors.length?e._e():r("svg",{staticClass:"gallery__load-area__icon w-8 h-8",attrs:{fill:"currentColor",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"}},[r("path",{attrs:{d:"M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"}})]),e._v(" "),e.loading?r("i",{staticClass:"fas fa-spinner-third gallery__element__loading"}):e._e(),e._v(" "),e._l(e.errors,function(t){return r("div",{staticClass:"gallery__element__error"},[e._v(e._s(t))])}),e._v(" "),r("div",{staticClass:"gallery__element__remove",on:{click:function(t){return t.stopPropagation(),e.$emit("remove")}}},[r("i",{staticClass:"far fa-times"})])],2)],2)},staticRenderFns:[]}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"gallery__loaded-files flex flex-wrap -mx-2"},[e._l(e.images,function(t,a){return r("element-for-load",{key:a,staticClass:"mx-2 mb-4",attrs:{loading:t.loading,errors:t.errors},on:{remove:function(t){return e.$emit("remove",a)},upload:function(t){return e.$emit("upload",a)}}},[r("img",{attrs:{src:t.full_urls.default,alt:""}})])}),e._v(" "),r("hr",{staticClass:"gallery__hr mt-2 mb-6"})],2)},staticRenderFns:[]}},function(e,t,r){var a=r(0)(r(15),r(19),!1,null,null,null);e.exports=a.exports},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=r(16),n=r.n(a);t.default={name:"Catalog",components:{ImageElement:n.a},props:{images:{}}}},function(e,t,r){var a=r(0)(r(17),r(18),!1,null,null,null);e.exports=a.exports},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={name:"ImageElement",props:{main:{}}}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"gallery__element gallery__image"},[e._t("default"),e._v(" "),r("div",{staticClass:"gallery__element__overlay gallery__element__overlay--transparent",on:{click:function(t){return e.$emit("upload")}}},[r("div",{staticClass:"gallery__element__remove",on:{click:function(t){return t.stopPropagation(),e.$emit("remove")}}},[r("i",{staticClass:"far fa-trash-alt"})])]),e._v(" "),r("div",{staticClass:"gallery__element__main",class:{"gallery__element__main--active":e.main},attrs:{title:e.__("Главное изображение")},on:{click:function(t){return e.$emit("setMain")}}},[r("i",{staticClass:"fa-star",class:e.main?"fas":"far"})])],2)},staticRenderFns:[]}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"gallery__catalog flex flex-wrap -mx-2"},e._l(e.images,function(t,a){return r("image-element",{key:a,staticClass:"mx-2 mb-4",attrs:{main:t.main},on:{remove:function(t){return e.$emit("remove",a)},setMain:function(t){return e.$emit("setMain",a)}}},[r("img",{attrs:{src:t.url,alt:""}})])}),1)},staticRenderFns:[]}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"gallery"},[r("load-area",{staticClass:"mb-4",on:{load:e.load}}),e._v(" "),e.loadedImages.length?r("loaded-files",{attrs:{images:e.loadedImages},on:{remove:e.removeLoaded,upload:e.upload}}):e._e(),e._v(" "),r("catalog",{attrs:{images:e.images},on:{remove:e.remove,setMain:e.setMain}})],1)},staticRenderFns:[]}},function(e,t){}]);