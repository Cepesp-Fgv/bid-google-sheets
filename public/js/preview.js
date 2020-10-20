/*! For license information please see preview.js.LICENSE.txt */
(window.webpackJsonp=window.webpackJsonp||[]).push([[2],{1:function(e,t,r){e.exports=r("FmGR")},FmGR:function(e,t,r){"use strict";r.r(t);var i=r("NpuA"),n=r.n(i);function s(e,t){var r;if("undefined"==typeof Symbol||null==e[Symbol.iterator]){if(Array.isArray(e)||(r=function(e,t){if(!e)return;if("string"==typeof e)return a(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);"Object"===r&&e.constructor&&(r=e.constructor.name);if("Map"===r||"Set"===r)return Array.from(e);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return a(e,t)}(e))||t&&e&&"number"==typeof e.length){r&&(e=r);var i=0,n=function(){};return{s:n,n:function(){return i>=e.length?{done:!0}:{done:!1,value:e[i++]}},e:function(e){throw e},f:n}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var s,o=!0,u=!1;return{s:function(){r=e[Symbol.iterator]()},n:function(){var e=r.next();return o=e.done,e},e:function(e){u=!0,s=e},f:function(){try{o||null==r.return||r.return()}finally{if(u)throw s}}}}function a(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,i=new Array(t);r<t;r++)i[r]=e[r];return i}var o=$("#url-input"),u=$("#detected-separator-input"),h=$("#separator-input"),f=$("#preview-table"),d=$("#urlValidFeedback"),l=$("#urlInvalidFeedback"),c=$(".btn[type=submit]");function p(){var e=o.val(),t=function(e){if(!e)return"";switch(e){case"COMMA":return",";case"TAB":return"\t";default:case"SEMICOLON":return";"}}(h.val());c.prop("disabled",!0),o.removeClass("is-invalid").removeClass("is-valid"),d.hide(),l.hide(),e&&n.a.parse("/pipe?url="+encodeURI(e),{download:!0,delimiter:t,preview:10,complete:function(e,t){o.addClass("is-valid"),d.show(),c.prop("disabled",!1),u.val(e.meta.delimiter),function(e){function t(e){var t,r=$("<tr></tr>"),i=s(e);try{for(i.s();!(t=i.n()).done;){var n=t.value,a=$("<td></td>");a.text(n),r.append(a)}}catch(e){i.e(e)}finally{i.f()}f.append(r)}f.html("");var r,i=s(e);try{for(i.s();!(r=i.n()).done;){var n=r.value;f.append(t(n))}}catch(e){i.e(e)}finally{i.f()}}(e.data)},error:function(){o.addClass("is-invalid"),l.show()}})}o.focusout(p),h.change(p),$(document).ready(p)},NpuA:function(e,t,r){var i,n,s;n=[],void 0===(s="function"==typeof(i=function e(){"use strict";var t="undefined"!=typeof self?self:"undefined"!=typeof window?window:void 0!==t?t:{},r=!t.document&&!!t.postMessage,i=r&&/blob:/i.test((t.location||{}).protocol),n={},s=0,a={parse:function(r,i){var o=(i=i||{}).dynamicTyping||!1;if(b(o)&&(i.dynamicTypingFunction=o,o={}),i.dynamicTyping=o,i.transform=!!b(i.transform)&&i.transform,i.worker&&a.WORKERS_SUPPORTED){var u=function(){if(!a.WORKERS_SUPPORTED)return!1;var r,i,o=(r=t.URL||t.webkitURL||null,i=e.toString(),a.BLOB_URL||(a.BLOB_URL=r.createObjectURL(new Blob(["(",i,")();"],{type:"text/javascript"})))),u=new t.Worker(o);return u.onmessage=g,u.id=s++,n[u.id]=u}();return u.userStep=i.step,u.userChunk=i.chunk,u.userComplete=i.complete,u.userError=i.error,i.step=b(i.step),i.chunk=b(i.chunk),i.complete=b(i.complete),i.error=b(i.error),delete i.worker,void u.postMessage({input:r,config:i,workerId:u.id})}var c=null;return a.NODE_STREAM_INPUT,"string"==typeof r?c=i.download?new h(i):new d(i):!0===r.readable&&b(r.read)&&b(r.on)?c=new l(i):(t.File&&r instanceof File||r instanceof Object)&&(c=new f(i)),c.stream(r)},unparse:function(e,t){var r=!1,i=!0,n=",",s="\r\n",o='"',u=o+o,h=!1,f=null,d=!1;!function(){if("object"==typeof t){if("string"!=typeof t.delimiter||a.BAD_DELIMITERS.filter((function(e){return-1!==t.delimiter.indexOf(e)})).length||(n=t.delimiter),("boolean"==typeof t.quotes||"function"==typeof t.quotes||Array.isArray(t.quotes))&&(r=t.quotes),"boolean"!=typeof t.skipEmptyLines&&"string"!=typeof t.skipEmptyLines||(h=t.skipEmptyLines),"string"==typeof t.newline&&(s=t.newline),"string"==typeof t.quoteChar&&(o=t.quoteChar),"boolean"==typeof t.header&&(i=t.header),Array.isArray(t.columns)){if(0===t.columns.length)throw new Error("Option columns is empty");f=t.columns}void 0!==t.escapeChar&&(u=t.escapeChar+o),"boolean"==typeof t.escapeFormulae&&(d=t.escapeFormulae)}}();var l=new RegExp(p(o),"g");if("string"==typeof e&&(e=JSON.parse(e)),Array.isArray(e)){if(!e.length||Array.isArray(e[0]))return m(null,e,h);if("object"==typeof e[0])return m(f||c(e[0]),e,h)}else if("object"==typeof e)return"string"==typeof e.data&&(e.data=JSON.parse(e.data)),Array.isArray(e.data)&&(e.fields||(e.fields=e.meta&&e.meta.fields),e.fields||(e.fields=Array.isArray(e.data[0])?e.fields:c(e.data[0])),Array.isArray(e.data[0])||"object"==typeof e.data[0]||(e.data=[e.data])),m(e.fields||[],e.data||[],h);throw new Error("Unable to serialize unrecognized input");function c(e){if("object"!=typeof e)return[];var t=[];for(var r in e)t.push(r);return t}function m(e,t,r){var a="";"string"==typeof e&&(e=JSON.parse(e)),"string"==typeof t&&(t=JSON.parse(t));var o=Array.isArray(e)&&0<e.length,u=!Array.isArray(t[0]);if(o&&i){for(var h=0;h<e.length;h++)0<h&&(a+=n),a+=g(e[h],h);0<t.length&&(a+=s)}for(var f=0;f<t.length;f++){var d=o?e.length:t[f].length,l=!1,c=o?0===Object.keys(t[f]).length:0===t[f].length;if(r&&!o&&(l="greedy"===r?""===t[f].join("").trim():1===t[f].length&&0===t[f][0].length),"greedy"===r&&o){for(var p=[],m=0;m<d;m++){var _=u?e[m]:m;p.push(t[f][_])}l=""===p.join("").trim()}if(!l){for(var v=0;v<d;v++){0<v&&!c&&(a+=n);var y=o&&u?e[v]:v;a+=g(t[f][y],v)}f<t.length-1&&(!r||0<d&&!c)&&(a+=s)}}return a}function g(e,t){if(null==e)return"";if(e.constructor===Date)return JSON.stringify(e).slice(1,25);!0===d&&"string"==typeof e&&null!==e.match(/^[=+\-@].*$/)&&(e="'"+e);var i=e.toString().replace(l,u);return"boolean"==typeof r&&r||"function"==typeof r&&r(e,t)||Array.isArray(r)&&r[t]||function(e,t){for(var r=0;r<t.length;r++)if(-1<e.indexOf(t[r]))return!0;return!1}(i,a.BAD_DELIMITERS)||-1<i.indexOf(n)||" "===i.charAt(0)||" "===i.charAt(i.length-1)?o+i+o:i}}};if(a.RECORD_SEP=String.fromCharCode(30),a.UNIT_SEP=String.fromCharCode(31),a.BYTE_ORDER_MARK="\ufeff",a.BAD_DELIMITERS=["\r","\n",'"',a.BYTE_ORDER_MARK],a.WORKERS_SUPPORTED=!r&&!!t.Worker,a.NODE_STREAM_INPUT=1,a.LocalChunkSize=10485760,a.RemoteChunkSize=5242880,a.DefaultDelimiter=",",a.Parser=m,a.ParserHandle=c,a.NetworkStreamer=h,a.FileStreamer=f,a.StringStreamer=d,a.ReadableStreamStreamer=l,t.jQuery){var o=t.jQuery;o.fn.parse=function(e){var r=e.config||{},i=[];return this.each((function(e){if("INPUT"!==o(this).prop("tagName").toUpperCase()||"file"!==o(this).attr("type").toLowerCase()||!t.FileReader||!this.files||0===this.files.length)return!0;for(var n=0;n<this.files.length;n++)i.push({file:this.files[n],inputElem:this,instanceConfig:o.extend({},r)})})),n(),this;function n(){if(0!==i.length){var t,r,n,u=i[0];if(b(e.before)){var h=e.before(u.file,u.inputElem);if("object"==typeof h){if("abort"===h.action)return t=u.file,r=u.inputElem,n=h.reason,void(b(e.error)&&e.error({name:"AbortError"},t,r,n));if("skip"===h.action)return void s();"object"==typeof h.config&&(u.instanceConfig=o.extend(u.instanceConfig,h.config))}else if("skip"===h)return void s()}var f=u.instanceConfig.complete;u.instanceConfig.complete=function(e){b(f)&&f(e,u.file,u.inputElem),s()},a.parse(u.file,u.instanceConfig)}else b(e.complete)&&e.complete()}function s(){i.splice(0,1),n()}}}function u(e){this._handle=null,this._finished=!1,this._completed=!1,this._halted=!1,this._input=null,this._baseIndex=0,this._partialLine="",this._rowCount=0,this._start=0,this._nextChunk=null,this.isFirstChunk=!0,this._completeResults={data:[],errors:[],meta:{}},function(e){var t=y(e);t.chunkSize=parseInt(t.chunkSize),e.step||e.chunk||(t.chunkSize=null),this._handle=new c(t),(this._handle.streamer=this)._config=t}.call(this,e),this.parseChunk=function(e,r){if(this.isFirstChunk&&b(this._config.beforeFirstChunk)){var n=this._config.beforeFirstChunk(e);void 0!==n&&(e=n)}this.isFirstChunk=!1,this._halted=!1;var s=this._partialLine+e;this._partialLine="";var o=this._handle.parse(s,this._baseIndex,!this._finished);if(!this._handle.paused()&&!this._handle.aborted()){var u=o.meta.cursor;this._finished||(this._partialLine=s.substring(u-this._baseIndex),this._baseIndex=u),o&&o.data&&(this._rowCount+=o.data.length);var h=this._finished||this._config.preview&&this._rowCount>=this._config.preview;if(i)t.postMessage({results:o,workerId:a.WORKER_ID,finished:h});else if(b(this._config.chunk)&&!r){if(this._config.chunk(o,this._handle),this._handle.paused()||this._handle.aborted())return void(this._halted=!0);o=void 0,this._completeResults=void 0}return this._config.step||this._config.chunk||(this._completeResults.data=this._completeResults.data.concat(o.data),this._completeResults.errors=this._completeResults.errors.concat(o.errors),this._completeResults.meta=o.meta),this._completed||!h||!b(this._config.complete)||o&&o.meta.aborted||(this._config.complete(this._completeResults,this._input),this._completed=!0),h||o&&o.meta.paused||this._nextChunk(),o}this._halted=!0},this._sendError=function(e){b(this._config.error)?this._config.error(e):i&&this._config.error&&t.postMessage({workerId:a.WORKER_ID,error:e,finished:!1})}}function h(e){var t;(e=e||{}).chunkSize||(e.chunkSize=a.RemoteChunkSize),u.call(this,e),this._nextChunk=r?function(){this._readChunk(),this._chunkLoaded()}:function(){this._readChunk()},this.stream=function(e){this._input=e,this._nextChunk()},this._readChunk=function(){if(this._finished)this._chunkLoaded();else{if(t=new XMLHttpRequest,this._config.withCredentials&&(t.withCredentials=this._config.withCredentials),r||(t.onload=k(this._chunkLoaded,this),t.onerror=k(this._chunkError,this)),t.open(this._config.downloadRequestBody?"POST":"GET",this._input,!r),this._config.downloadRequestHeaders){var e=this._config.downloadRequestHeaders;for(var i in e)t.setRequestHeader(i,e[i])}if(this._config.chunkSize){var n=this._start+this._config.chunkSize-1;t.setRequestHeader("Range","bytes="+this._start+"-"+n)}try{t.send(this._config.downloadRequestBody)}catch(e){this._chunkError(e.message)}r&&0===t.status&&this._chunkError()}},this._chunkLoaded=function(){4===t.readyState&&(t.status<200||400<=t.status?this._chunkError():(this._start+=this._config.chunkSize?this._config.chunkSize:t.responseText.length,this._finished=!this._config.chunkSize||this._start>=function(e){var t=e.getResponseHeader("Content-Range");return null===t?-1:parseInt(t.substring(t.lastIndexOf("/")+1))}(t),this.parseChunk(t.responseText)))},this._chunkError=function(e){var r=t.statusText||e;this._sendError(new Error(r))}}function f(e){var t,r;(e=e||{}).chunkSize||(e.chunkSize=a.LocalChunkSize),u.call(this,e);var i="undefined"!=typeof FileReader;this.stream=function(e){this._input=e,r=e.slice||e.webkitSlice||e.mozSlice,i?((t=new FileReader).onload=k(this._chunkLoaded,this),t.onerror=k(this._chunkError,this)):t=new FileReaderSync,this._nextChunk()},this._nextChunk=function(){this._finished||this._config.preview&&!(this._rowCount<this._config.preview)||this._readChunk()},this._readChunk=function(){var e=this._input;if(this._config.chunkSize){var n=Math.min(this._start+this._config.chunkSize,this._input.size);e=r.call(e,this._start,n)}var s=t.readAsText(e,this._config.encoding);i||this._chunkLoaded({target:{result:s}})},this._chunkLoaded=function(e){this._start+=this._config.chunkSize,this._finished=!this._config.chunkSize||this._start>=this._input.size,this.parseChunk(e.target.result)},this._chunkError=function(){this._sendError(t.error)}}function d(e){var t;u.call(this,e=e||{}),this.stream=function(e){return t=e,this._nextChunk()},this._nextChunk=function(){if(!this._finished){var e,r=this._config.chunkSize;return r?(e=t.substring(0,r),t=t.substring(r)):(e=t,t=""),this._finished=!t,this.parseChunk(e)}}}function l(e){u.call(this,e=e||{});var t=[],r=!0,i=!1;this.pause=function(){u.prototype.pause.apply(this,arguments),this._input.pause()},this.resume=function(){u.prototype.resume.apply(this,arguments),this._input.resume()},this.stream=function(e){this._input=e,this._input.on("data",this._streamData),this._input.on("end",this._streamEnd),this._input.on("error",this._streamError)},this._checkIsFinished=function(){i&&1===t.length&&(this._finished=!0)},this._nextChunk=function(){this._checkIsFinished(),t.length?this.parseChunk(t.shift()):r=!0},this._streamData=k((function(e){try{t.push("string"==typeof e?e:e.toString(this._config.encoding)),r&&(r=!1,this._checkIsFinished(),this.parseChunk(t.shift()))}catch(e){this._streamError(e)}}),this),this._streamError=k((function(e){this._streamCleanUp(),this._sendError(e)}),this),this._streamEnd=k((function(){this._streamCleanUp(),i=!0,this._streamData("")}),this),this._streamCleanUp=k((function(){this._input.removeListener("data",this._streamData),this._input.removeListener("end",this._streamEnd),this._input.removeListener("error",this._streamError)}),this)}function c(e){var t,r,i,n=Math.pow(2,53),s=-n,o=/^\s*-?(\d+\.?|\.\d+|\d+\.\d+)(e[-+]?\d+)?\s*$/,u=/(\d{4}-[01]\d-[0-3]\dT[0-2]\d:[0-5]\d:[0-5]\d\.\d+([+-][0-2]\d:[0-5]\d|Z))|(\d{4}-[01]\d-[0-3]\dT[0-2]\d:[0-5]\d:[0-5]\d([+-][0-2]\d:[0-5]\d|Z))|(\d{4}-[01]\d-[0-3]\dT[0-2]\d:[0-5]\d([+-][0-2]\d:[0-5]\d|Z))/,h=this,f=0,d=0,l=!1,c=!1,g=[],_={data:[],errors:[],meta:{}};if(b(e.step)){var v=e.step;e.step=function(t){if(_=t,E())w();else{if(w(),0===_.data.length)return;f+=t.data.length,e.preview&&f>e.preview?r.abort():(_.data=_.data[0],v(_,h))}}}function k(t){return"greedy"===e.skipEmptyLines?""===t.join("").trim():1===t.length&&0===t[0].length}function w(){if(_&&i&&(R("Delimiter","UndetectableDelimiter","Unable to auto-detect delimiting character; defaulted to '"+a.DefaultDelimiter+"'"),i=!1),e.skipEmptyLines)for(var t=0;t<_.data.length;t++)k(_.data[t])&&_.data.splice(t--,1);return E()&&function(){if(_)if(Array.isArray(_.data[0])){for(var t=0;E()&&t<_.data.length;t++)_.data[t].forEach(r);_.data.splice(0,1)}else _.data.forEach(r);function r(t,r){b(e.transformHeader)&&(t=e.transformHeader(t,r)),g.push(t)}}(),function(){if(!_||!e.header&&!e.dynamicTyping&&!e.transform)return _;function t(t,r){var i,n=e.header?{}:[];for(i=0;i<t.length;i++){var s=i,a=t[i];e.header&&(s=i>=g.length?"__parsed_extra":g[i]),e.transform&&(a=e.transform(a,s)),a=C(s,a),"__parsed_extra"===s?(n[s]=n[s]||[],n[s].push(a)):n[s]=a}return e.header&&(i>g.length?R("FieldMismatch","TooManyFields","Too many fields: expected "+g.length+" fields but parsed "+i,d+r):i<g.length&&R("FieldMismatch","TooFewFields","Too few fields: expected "+g.length+" fields but parsed "+i,d+r)),n}var r=1;return!_.data.length||Array.isArray(_.data[0])?(_.data=_.data.map(t),r=_.data.length):_.data=t(_.data,0),e.header&&_.meta&&(_.meta.fields=g),d+=r,_}()}function E(){return e.header&&0===g.length}function C(t,r){return i=t,e.dynamicTypingFunction&&void 0===e.dynamicTyping[i]&&(e.dynamicTyping[i]=e.dynamicTypingFunction(i)),!0===(e.dynamicTyping[i]||e.dynamicTyping)?"true"===r||"TRUE"===r||"false"!==r&&"FALSE"!==r&&(function(e){if(o.test(e)){var t=parseFloat(e);if(s<t&&t<n)return!0}return!1}(r)?parseFloat(r):u.test(r)?new Date(r):""===r?null:r):r;var i}function R(e,t,r,i){var n={type:e,code:t,message:r};void 0!==i&&(n.row=i),_.errors.push(n)}this.parse=function(n,s,o){var u=e.quoteChar||'"';if(e.newline||(e.newline=function(e,t){e=e.substring(0,1048576);var r=new RegExp(p(t)+"([^]*?)"+p(t),"gm"),i=(e=e.replace(r,"")).split("\r"),n=e.split("\n"),s=1<n.length&&n[0].length<i[0].length;if(1===i.length||s)return"\n";for(var a=0,o=0;o<i.length;o++)"\n"===i[o][0]&&a++;return a>=i.length/2?"\r\n":"\r"}(n,u)),i=!1,e.delimiter)b(e.delimiter)&&(e.delimiter=e.delimiter(n),_.meta.delimiter=e.delimiter);else{var h=function(t,r,i,n,s){var o,u,h,f;s=s||[",","\t","|",";",a.RECORD_SEP,a.UNIT_SEP];for(var d=0;d<s.length;d++){var l=s[d],c=0,p=0,g=0;h=void 0;for(var _=new m({comments:n,delimiter:l,newline:r,preview:10}).parse(t),v=0;v<_.data.length;v++)if(i&&k(_.data[v]))g++;else{var y=_.data[v].length;p+=y,void 0!==h?0<y&&(c+=Math.abs(y-h),h=y):h=y}0<_.data.length&&(p/=_.data.length-g),(void 0===u||c<=u)&&(void 0===f||f<p)&&1.99<p&&(u=c,o=l,f=p)}return{successful:!!(e.delimiter=o),bestDelimiter:o}}(n,e.newline,e.skipEmptyLines,e.comments,e.delimitersToGuess);h.successful?e.delimiter=h.bestDelimiter:(i=!0,e.delimiter=a.DefaultDelimiter),_.meta.delimiter=e.delimiter}var f=y(e);return e.preview&&e.header&&f.preview++,t=n,r=new m(f),_=r.parse(t,s,o),w(),l?{meta:{paused:!0}}:_||{meta:{paused:!1}}},this.paused=function(){return l},this.pause=function(){l=!0,r.abort(),t=b(e.chunk)?"":t.substring(r.getCharIndex())},this.resume=function(){h.streamer._halted?(l=!1,h.streamer.parseChunk(t,!0)):setTimeout(h.resume,3)},this.aborted=function(){return c},this.abort=function(){c=!0,r.abort(),_.meta.aborted=!0,b(e.complete)&&e.complete(_),t=""}}function p(e){return e.replace(/[.*+?^${}()|[\]\\]/g,"\\$&")}function m(e){var t,r=(e=e||{}).delimiter,i=e.newline,n=e.comments,s=e.step,o=e.preview,u=e.fastMode,h=t=void 0===e.quoteChar?'"':e.quoteChar;if(void 0!==e.escapeChar&&(h=e.escapeChar),("string"!=typeof r||-1<a.BAD_DELIMITERS.indexOf(r))&&(r=","),n===r)throw new Error("Comment character same as delimiter");!0===n?n="#":("string"!=typeof n||-1<a.BAD_DELIMITERS.indexOf(n))&&(n=!1),"\n"!==i&&"\r"!==i&&"\r\n"!==i&&(i="\n");var f=0,d=!1;this.parse=function(e,a,l){if("string"!=typeof e)throw new Error("Input must be a string");var c=e.length,m=r.length,g=i.length,_=n.length,v=b(s),y=[],k=[],w=[],E=f=0;if(!e)return j();if(u||!1!==u&&-1===e.indexOf(t)){for(var C=e.split(i),R=0;R<C.length;R++){if(w=C[R],f+=w.length,R!==C.length-1)f+=i.length;else if(l)return j();if(!n||w.substring(0,_)!==n){if(v){if(y=[],L(w.split(r)),U(),d)return j()}else L(w.split(r));if(o&&o<=R)return y=y.slice(0,o),j(!0)}}return j()}for(var S=e.indexOf(r,f),O=e.indexOf(i,f),x=new RegExp(p(h)+p(t),"g"),A=e.indexOf(t,f);;)if(e[f]!==t)if(n&&0===w.length&&e.substring(f,f+_)===n){if(-1===O)return j();f=O+g,O=e.indexOf(i,f),S=e.indexOf(r,f)}else{if(-1!==S&&(S<O||-1===O)){if(!(S<A)){w.push(e.substring(f,S)),f=S+m,S=e.indexOf(r,f);continue}var I=q(S,A,O);if(I&&void 0!==I.nextDelim){S=I.nextDelim,A=I.quoteSearch,w.push(e.substring(f,S)),f=S+m,S=e.indexOf(r,f);continue}}if(-1===O)break;if(w.push(e.substring(f,O)),z(O+g),v&&(U(),d))return j();if(o&&y.length>=o)return j(!0)}else for(A=f,f++;;){if(-1===(A=e.indexOf(t,A+1)))return l||k.push({type:"Quotes",code:"MissingQuotes",message:"Quoted field unterminated",row:y.length,index:f}),M();if(A===c-1)return M(e.substring(f,A).replace(x,t));if(t!==h||e[A+1]!==h){if(t===h||0===A||e[A-1]!==h){-1!==S&&S<A+1&&(S=e.indexOf(r,A+1)),-1!==O&&O<A+1&&(O=e.indexOf(i,A+1));var T=F(-1===O?S:Math.min(S,O));if(e[A+1+T]===r){w.push(e.substring(f,A).replace(x,t)),e[f=A+1+T+m]!==t&&(A=e.indexOf(t,f)),S=e.indexOf(r,f),O=e.indexOf(i,f);break}var D=F(O);if(e.substring(A+1+D,A+1+D+g)===i){if(w.push(e.substring(f,A).replace(x,t)),z(A+1+D+g),S=e.indexOf(r,f),A=e.indexOf(t,f),v&&(U(),d))return j();if(o&&y.length>=o)return j(!0);break}k.push({type:"Quotes",code:"InvalidQuotes",message:"Trailing quote on quoted field is malformed",row:y.length,index:f}),A++}}else A++}return M();function L(e){y.push(e),E=f}function F(t){var r=0;if(-1!==t){var i=e.substring(A+1,t);i&&""===i.trim()&&(r=i.length)}return r}function M(t){return l||(void 0===t&&(t=e.substring(f)),w.push(t),f=c,L(w),v&&U()),j()}function z(t){f=t,L(w),w=[],O=e.indexOf(i,f)}function j(e){return{data:y,errors:k,meta:{delimiter:r,linebreak:i,aborted:d,truncated:!!e,cursor:E+(a||0)}}}function U(){s(j()),y=[],k=[]}function q(i,n,s){var a={nextDelim:void 0,quoteSearch:void 0},o=e.indexOf(t,n+1);if(n<i&&i<o&&(o<s||-1===s)){var u=e.indexOf(r,o);if(-1===u)return a;o<u&&(o=e.indexOf(t,o+1)),a=q(u,o,s)}else a={nextDelim:i,quoteSearch:n};return a}},this.abort=function(){d=!0},this.getCharIndex=function(){return f}}function g(e){var t=e.data,r=n[t.workerId],i=!1;if(t.error)r.userError(t.error,t.file);else if(t.results&&t.results.data){var s={abort:function(){i=!0,_(t.workerId,{data:[],errors:[],meta:{aborted:!0}})},pause:v,resume:v};if(b(r.userStep)){for(var a=0;a<t.results.data.length&&(r.userStep({data:t.results.data[a],errors:t.results.errors,meta:t.results.meta},s),!i);a++);delete t.results}else b(r.userChunk)&&(r.userChunk(t.results,s,t.file),delete t.results)}t.finished&&!i&&_(t.workerId,t.results)}function _(e,t){var r=n[e];b(r.userComplete)&&r.userComplete(t),r.terminate(),delete n[e]}function v(){throw new Error("Not implemented.")}function y(e){if("object"!=typeof e||null===e)return e;var t=Array.isArray(e)?[]:{};for(var r in e)t[r]=y(e[r]);return t}function k(e,t){return function(){e.apply(t,arguments)}}function b(e){return"function"==typeof e}return i&&(t.onmessage=function(e){var r=e.data;if(void 0===a.WORKER_ID&&r&&(a.WORKER_ID=r.workerId),"string"==typeof r.input)t.postMessage({workerId:a.WORKER_ID,results:a.parse(r.input,r.config),finished:!0});else if(t.File&&r.input instanceof File||r.input instanceof Object){var i=a.parse(r.input,r.config);i&&t.postMessage({workerId:a.WORKER_ID,results:i,finished:!0})}}),(h.prototype=Object.create(u.prototype)).constructor=h,(f.prototype=Object.create(u.prototype)).constructor=f,(d.prototype=Object.create(d.prototype)).constructor=d,(l.prototype=Object.create(u.prototype)).constructor=l,a})?i.apply(t,n):i)||(e.exports=s)}},[[1,0]]]);
//# sourceMappingURL=preview.js.map