var cto = {
    config : (function(){
        function configuration(){
            this._config = {};
        }
        configuration.prototype.get = function(key){
            return this._config[key];
        };
        configuration.prototype.set = function(key,val){
            if (val === undefined){
                if (typeof key == 'object'){
                    for (var i in key){
                        this._config[i] = key[i];
                    }
                }
            } else {
                this._config[key] = val;
            }
        };
        configuration.prototype.load = function(config){
            for (var i in config){
                this._config[i] = config[i];
            }
        };
        return new configuration();
    })(),
    extend : function(key,val){
        var _self = this;
        if (_self[key] === undefined){
            _self[key] = val;
        } else {
            throw new Error('key conflict');
        }
    },
    module : (function(){
        function module(){
            this._loaded = false;
        }
        module._moduleDepends = {};
        module.inherits = function(ctor, superCtor){
            ctor.super_ = superCtor;
            ctor.prototype = Object.create(superCtor.prototype, {  
                constructor: {  
                    value: ctor,  
                    enumerable: false  
                }  
            });
        };
        module.require = function(moduleName,dependModuleNames){
            if (!module._moduleDepends[moduleName]){
                module._moduleDepends[moduleName] = [];
            }
            if (typeof dependModuleNames == 'string'){
                module._moduleDepends[moduleName].push(dependModuleNames);
            } else {
                for (var i in dependModuleNames){
                    module._moduleDepends[moduleName].push(dependModuleNames[i]);
                }
            }
        };
        module.load = function(moduleName,callback){
            var url = getModuleUrl(moduleName);
            var needLoadDependCount = 0;
            cto.getData(url,function(){
                if (module._moduleDepends[moduleName]){
                    needLoadDependCount = module._moduleDepends[moduleName].length;
                    for(var i in module._moduleDepends[moduleName]){
                        module.load(module._moduleDepends[moduleName][i],moduleLoaded);
                    }
                } else {
                    callback();
                }
            });
            function getModuleUrl(moduleName){
                return cto.config.get('modulePath') + moduleName + '.js';
            }
            function moduleLoaded(){
                needLoadDependCount--;
                if (needLoadDependCount == 0){
                    callback();
                }
            }
        };
        return module;
    })(),
    getData : (function(){
        var self = this;
        var _dataLoaders = {};
        function dataLoader(ajaxSetup){
            this._ajaxSetup = ajaxSetup;
            this._callbacks = [];
            this._finished = false;
            this._data = null;
            this._load();
        }
        dataLoader.prototype.addCallback = function(callback){
            if (this._finished){
                callback(this._data);
            } else {
                this._callbacks.push(callback);
            }
        };
        dataLoader.prototype._load = function(){
            var _this = this;
            var param = {
                success : function(data){
                    _this._data = data;
                    _this._finished = true;
                    while (_this._callbacks.length){
                        var callback = _this._callbacks.shift();
                        callback(_this._data);
                    }
                }
            };
            for(var i in _this._ajaxSetup){
                if (i != 'success'){
                    param[i] = _this._ajaxSetup[i];
                } else {
                    _this._callbacks.push(_this._ajaxSetup[i]);
                }
            }
            $.ajax(param);
        };
        function getAjaxSetup(url,callback){
            var ajaxSetup = {};
            if (callback && typeof callback == 'function'){
                ajaxSetup.success = callback;
                ajaxSetup.url = url;
            } else if (typeof url == 'object'){
                    ajaxSetup = url;
            } else if (typeof url == 'string'){
                ajaxSetup.url = url;
            }
            if (ajaxSetup.url && !ajaxSetup.dataType){
                var arr = ajaxSetup.url.split('.');
                switch (arr[arr.length-1]){
                    case 'js':
                        ajaxSetup.dataType = 'script';
                        break;
                    case 'txt':
                        ajaxSetup.dataType = 'text';
                        break;
                    case 'xml':
                        ajaxSetup.dataType = 'xml';
                        break;
                    case 'json':
                        ajaxSetup.dataType = 'json';
                        break;
                    default :
                        ajaxSetup.dataType = 'html';
                        break;
                }
            }
            return ajaxSetup;
        }
        return function(url,callback){
            var ajaxSetup = getAjaxSetup(url,callback);
            if (!ajaxSetup.url){
                return;
            }
            if (_dataLoaders[ajaxSetup.url]){
                _dataLoaders[ajaxSetup.url].addCallback(ajaxSetup.success);
            } else {
                _dataLoaders[ajaxSetup.url] = new dataLoader(ajaxSetup);
            }
        }
    })(),
    utility : {
        getPopZindex : (function(){
            var _zindex = 10000;
            return function(){return _zindex++};
        })(),
        getObjectId : (function(){
            var _id = 100;
            return function(){return 'hbobj_' + _id++};
        })(),
        getStringWidth :  function(str,fontSize){
            var objId = 'hbobj_getwidth';
            var span = document.getElementById(objId);  
            if (span == null) {  
                span = document.createElement("span");  
                span.id = objId;  
                document.body.appendChild(span);  
                span.style.visibility = "hidden";  
                span.style.whiteSpace = "nowrap";  
            }  
            span.innerHTML = str;  
            span.style.fontSize = fontSize + "px";  
          
            return span.offsetWidth;
        },
        regReplace : function(str,data,reg){
            if (!reg){
                reg = /\{\w*\}/g;
            }
            return str.replace(reg,function(match,pos){
                var s = '';
                var command = match.substring(1,match.length-1);
                if (data[command]){
                    s = data[command];
                }
                return s;
            });
        },
        /**
         * 鑾峰彇瀵硅薄鍧愭爣浣嶇疆锛岀敤浜庡脊鍑哄眰灞呬腑鎴栬彍鍗曠瓑
         * @param options = {
                obj : 闇€瑕佽幏鍙栦綅缃殑瀵硅薄
                relative : 浣嶇疆鐩稿瀵硅薄锛岄粯璁�$(window)
                xType : x杞寸浉瀵逛綅缃� (center,left,right)
                yType : y杞寸浉瀵逛綅缃� (middle,top,bottom)
                xMargin : x杞翠綅缃┖鍑�
                yMargin : y杞翠綅缃┖鍑�
                limit : [涓�,鍙�,涓�,宸 闄愬埗浣嶇疆鏈€澶ц寖鍥达紝榛樿鎸夌収window绐椾綋澶у皬
                limitT : 闄愬埗鏈€澶ц寖鍥翠笂
                limitR : 闄愬埗鏈€澶ц寖鍥村彸
                limitB : 闄愬埗鏈€澶ц寖鍥翠笅
                limitL : 闄愬埗鏈€澶ц寖鍥村乏
                reverse : 瓒呰繃鑼冨洿澶勭悊鏂瑰紡 (true:鍙嶈浆,false:鎸夌収瓒呰繃鏁伴噺鍥炵Щ)锛岄粯璁rue
            }
         * @return {x:x鍧愭爣,y:y鍧愭爣}
         */
        getPosition : function(options){
            var xType = options.xType || 'center',
                yType = options.yType || 'middle';
            if (options.xType == 0){
                xType = 0;
            }
            if (options.yType == 0){
                yType = 0;
            }
            var obj = $(options.obj);
            var relaP,winObj = $(window),
                winP = {
                    T : winObj.scrollTop(),
                    L : winObj.scrollLeft(),
                    H : winObj.height(),
                    W : winObj.width()
                };
            var objP = {
                H : obj.outerHeight(true),
                W : obj.outerWidth(true)
            };
            if (options.relative){
                var relaObj = $(options.relative);
                var relaOffset = relaObj.offset();
                relaP = {
                    H : relaObj.outerHeight(true),
                    W : relaObj.outerWidth(true),
                    L : relaOffset.left,
                    T : relaOffset.top
                };
            } else {
                relaP = winP;
            }
            if (options.xMargin){
                relaP.L += options.xMargin;
            }
            if (options.yMargin){
                relaP.T += options.yMargin;
            }
            var limitP = [0,winP.L+winP.W,winP.H+winP.T,0],
                isReverse = true;
            if (options.limit){
                if (options.limit.length == 1){
                    limitP[0] = limitP[1] = limitP[2] = limitP[3] = options.limit[0];
                } else if (options.limit.length == 2){
                    limitP[0] = limitP[2] = options.limit[0];
                    limitP[1] = limitP[3] = options.limit[1];
                } else {
                    for (var i in options.limit){
                        if (i == 4){
                            break;
                        }
                        if (options.limit[i] !== null){
                            limitP[i] = options.limit[i];
                        }               
                    }
                }
            }
            if (options.limitT){
                limitP[0] = options.limitT;
            }
            if (options.limitR){
                limitP[1] = options.limitR;
            }
            if (options.limitB){
                limitP[2] = options.limitB;
            }
            if (options.limitL){
                limitP[3] = options.limitL;
            }
            if (options.reverse != undefined && options.reverse != null){
                isReverse = options.reverse;
            }
            var p = getPosition(objP,relaP,xType,yType,limitP,isReverse);
            var parentOffset = getParentOffset(obj);
            p.x -= parentOffset.left;
            p.y -= parentOffset.top;
            return p;
            function getParentOffset(obj){
                var parent = obj.parent();
                if (parent.is('body')){
                    return parent.offset();             
                }
                if (parent.css('position') == 'static'){
                    return getParentOffset(parent);
                } else {
                    return parent.offset();
                }
            }
            function getPosition(objP,relaP,xType,yType,limitP,isReverse){
                var x,y;
                if (xType == 'left'){
                    x = relaP.L - objP.W;
                } else if (xType == 'right'){
                    x = relaP.L + relaP.W;
                } else if (xType == 'center'){
                    x = relaP.L + relaP.W/2 - objP.W/2;
                } else {
                    x = relaP.L + xType;
                }
                if (yType == 'top'){
                    y = relaP.T - objP.H;
                } else if (yType == 'middle') {
                    y = relaP.T + relaP.H/2 - objP.H/2;
                } else if (yType == 'bottom') {
                    y = relaP.T + relaP.H;
                } else {
                    y = relaP.T + yType;
                }
                if (xType != 'center'){
                    x = calcute(x,objP.W,relaP.W,relaP.L,limitP[1],limitP[3],isReverse,options.xMargin||0);
                }
                if (yType != 'middle'){
                    y = calcute(y,objP.H,relaP.H,relaP.T,limitP[2],limitP[0],isReverse,options.yMargin||0);
                }
                if (x < 0){
                    if (isReverse && xType != 'center'){
                        x = relaP.L + relaP.W;
                    } else {
                        x = 0;
                    }
                }
                if (y < 0){
                    if (isReverse && yType != 'middle'){
                        y = relaP.T + relaP.H;
                    } else {
                        y = 0;
                    }
                }
                return {x:x,y:y};
            }
            // V1 : H,W,right,bottom  V2 : T,L,top,left
            function calcute(position,objV1,relaV1,relaV2,limitV1,limitV2,isReverse,margin){
                //涓嬭秴楂� 鍙宠秴瀹�
                if (position + objV1 > limitV1){
                    if (isReverse){
                        position = relaV2 - objV1 - 2 * margin;
                    } else {
                        position = limitV1 - objV1;
                    }
                }
                //涓婅秴楂� 宸﹁秴瀹�
                if (position < limitV2){
                    if (isReverse){
                        position = relaV2 + relaV1 + 2 * margin;
                    } else {
                        position = limitV2;
                    }
                }

                return position;
            }
        }
    },
    getUUid : function (){
        if (!$.cookie('UUid')){
            $.cookie('UUid',createUUid());
        }
        
        function createUUid(length,radix){
            var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.split('');
            var uuid = [],radix;
            
            if (radix == undefined){
                radix = radix || chars.length;
            }
            if (length != undefined){
                for (var i = 0 ; i < length ; i++){
                    uuid[i] = chars[0|Math.random()*radix];
                }
            }
            else{
                var r;
                uuid[8] = uuid[13] = uuid[18] = uuid[23] = '-';
                uuid[14] = '4';
                
                for (var i = 0 ; i < 36 ; i++){
                    if (!uuid[i]){
                        r = 0 | Math.random()*16;
                        uuid[i] = chars[(i == 19) ? (r & 0x3) | 0x8 : r];
                    }
                }
            }
            
            return uuid.join('');
        }
        
        return $.cookie('UUid');
    }
};