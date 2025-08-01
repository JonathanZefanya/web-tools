<?php defined('ZEFANYA') || die() ?>

<div class="container">
    <?= \Altum\Alerts::output_alerts() ?>

    <?php if(settings()->main->breadcrumbs_is_enabled): ?>
        <nav aria-label="breadcrumb">
            <ol class="custom-breadcrumbs small">
                <li><a href="<?= url('tools') ?>"><?= l('tools.breadcrumb') ?></a> <i class="fas fa-fw fa-angle-right"></i></li>
                <li class="active" aria-current="page"><?= l('tools.signature_generator.name') ?></li>
            </ol>
        </nav>
    <?php endif ?>

    <div class="row mb-4">
        <div class="col-12 col-lg d-flex align-items-center mb-3 mb-lg-0 text-truncate">
            <h1 class="h4 m-0 text-truncate"><?= l('tools.signature_generator.name') ?></h1>

            <div class="ml-2">
                <span data-toggle="tooltip" title="<?= l('tools.signature_generator.description') ?>">
                    <i class="fas fa-fw fa-info-circle text-muted"></i>
                </span>
            </div>
        </div>

        <?= $this->views['ratings'] ?>
    </div>

    <div class="row">
        <div class="col-12">
            <div id="canvas_wrapper" class="card card-body p-0" style="background: #fff;">
                <canvas id="canvas" width="1106" height="500"></canvas>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <input id="color" type="hidden" name="color" class="form-control" value="#000000" data-color-picker />
    </div>

    <div class="row mt-3">
        <div class="col-3 mb-3">
            <button id="clear" type="button" class="btn btn-block btn-outline-secondary">
                <i class="fas fa-fw fa-sm fa-eraser"></i> <?= l('tools.signature_generator.clear') ?>
            </button>
        </div>

        <div class="col-3 mb-3">
            <button id="undo" type="button" class="btn btn-block btn-outline-secondary">
                <i class="fas fa-fw fa-sm fa-undo"></i> <?= l('tools.signature_generator.undo') ?>
            </button>
        </div>

        <div class="col-6 mb-3 dropdown">
            <button type="button" class="btn btn-block btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-fw fa-sm fa-download mr-1"></i> <?= l('global.download') ?>
            </button>

            <div class="dropdown-menu">
                <button type="button" class="dropdown-item" onclick="download_as('image/svg+xml', 'download.svg');"><?= sprintf(l('global.download_as'), 'SVG') ?></button>
                <button type="button" class="dropdown-item" onclick="download_as(null, 'download.png');"><?= sprintf(l('global.download_as'), 'PNG') ?></button>
                <button type="button" class="dropdown-item" onclick="download_as('image/jpeg', 'download.jpg');"><?= sprintf(l('global.download_as'), 'JPG') ?></button>
                <button type="button" class="dropdown-item" onclick="download_as('image/webp', 'download.webp');"><?= sprintf(l('global.download_as'), 'WEBP') ?></button>
            </div>
        </div>
    </div>

    <?= $this->views['extra_content'] ?>

    <?= $this->views['similar_tools'] ?>

    <?= $this->views['popular_tools'] ?>
</div>

<?php ob_start() ?>
<script>
    !function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(t="undefined"!=typeof globalThis?globalThis:t||self).SignaturePad=e()}(this,(function(){"use strict";class t{constructor(t,e,i,n){if(isNaN(t)||isNaN(e))throw new Error(`Point is invalid: (${t}, ${e})`);this.x=+t,this.y=+e,this.pressure=i||0,this.time=n||Date.now()}distanceTo(t){return Math.sqrt(Math.pow(this.x-t.x,2)+Math.pow(this.y-t.y,2))}equals(t){return this.x===t.x&&this.y===t.y&&this.pressure===t.pressure&&this.time===t.time}velocityFrom(t){return this.time!==t.time?this.distanceTo(t)/(this.time-t.time):0}}class e{constructor(t,e,i,n,s,o){this.startPoint=t,this.control2=e,this.control1=i,this.endPoint=n,this.startWidth=s,this.endWidth=o}static fromPoints(t,i){const n=this.calculateControlPoints(t[0],t[1],t[2]).c2,s=this.calculateControlPoints(t[1],t[2],t[3]).c1;return new e(t[1],n,s,t[2],i.start,i.end)}static calculateControlPoints(e,i,n){const s=e.x-i.x,o=e.y-i.y,h=i.x-n.x,r=i.y-n.y,a=(e.x+i.x)/2,d=(e.y+i.y)/2,l=(i.x+n.x)/2,c=(i.y+n.y)/2,u=Math.sqrt(s*s+o*o),v=Math.sqrt(h*h+r*r),m=v/(u+v),_=l+(a-l)*m,p=c+(d-c)*m,g=i.x-_,x=i.y-p;return{c1:new t(a+g,d+x),c2:new t(l+g,c+x)}}length(){let t,e,i=0;for(let n=0;n<=10;n+=1){const s=n/10,o=this.point(s,this.startPoint.x,this.control1.x,this.control2.x,this.endPoint.x),h=this.point(s,this.startPoint.y,this.control1.y,this.control2.y,this.endPoint.y);if(n>0){const n=o-t,s=h-e;i+=Math.sqrt(n*n+s*s)}t=o,e=h}return i}point(t,e,i,n,s){return e*(1-t)*(1-t)*(1-t)+3*i*(1-t)*(1-t)*t+3*n*(1-t)*t*t+s*t*t*t}}class i extends EventTarget{constructor(t,e={}){super(),this.canvas=t,this.options=e,this._handleMouseDown=t=>{1===t.buttons&&(this._drawningStroke=!0,this._strokeBegin(t))},this._handleMouseMove=t=>{this._drawningStroke&&this._strokeMoveUpdate(t)},this._handleMouseUp=t=>{1===t.buttons&&this._drawningStroke&&(this._drawningStroke=!1,this._strokeEnd(t))},this._handleTouchStart=t=>{if(t.preventDefault(),1===t.targetTouches.length){const e=t.changedTouches[0];this._strokeBegin(e)}},this._handleTouchMove=t=>{t.preventDefault();const e=t.targetTouches[0];this._strokeMoveUpdate(e)},this._handleTouchEnd=t=>{if(t.target===this.canvas){t.preventDefault();const e=t.changedTouches[0];this._strokeEnd(e)}},this._handlePointerStart=t=>{this._drawningStroke=!0,t.preventDefault(),this._strokeBegin(t)},this._handlePointerMove=t=>{this._drawningStroke&&(t.preventDefault(),this._strokeMoveUpdate(t))},this._handlePointerEnd=t=>{this._drawningStroke=!1;t.target===this.canvas&&(t.preventDefault(),this._strokeEnd(t))},this.velocityFilterWeight=e.velocityFilterWeight||.7,this.minWidth=e.minWidth||.5,this.maxWidth=e.maxWidth||2.5,this.throttle="throttle"in e?e.throttle:16,this.minDistance="minDistance"in e?e.minDistance:5,this.dotSize=e.dotSize||0,this.penColor=e.penColor||"black",this.backgroundColor=e.backgroundColor||"rgba(0,0,0,0)",this._strokeMoveUpdate=this.throttle?function(t,e=250){let i,n,s,o=0,h=null;const r=()=>{o=Date.now(),h=null,i=t.apply(n,s),h||(n=null,s=[])};return function(...a){const d=Date.now(),l=e-(d-o);return n=this,s=a,l<=0||l>e?(h&&(clearTimeout(h),h=null),o=d,i=t.apply(n,s),h||(n=null,s=[])):h||(h=window.setTimeout(r,l)),i}}(i.prototype._strokeUpdate,this.throttle):i.prototype._strokeUpdate,this._ctx=t.getContext("2d"),this.clear(),this.on()}clear(){const{_ctx:t,canvas:e}=this;t.fillStyle=this.backgroundColor,t.clearRect(0,0,e.width,e.height),t.fillRect(0,0,e.width,e.height),this._data=[],this._reset(),this._isEmpty=!0}fromDataURL(t,e={}){return new Promise((i,n)=>{const s=new Image,o=e.ratio||window.devicePixelRatio||1,h=e.width||this.canvas.width/o,r=e.height||this.canvas.height/o,a=e.xOffset||0,d=e.yOffset||0;this._reset(),s.onload=()=>{this._ctx.drawImage(s,a,d,h,r),i()},s.onerror=t=>{n(t)},s.crossOrigin="anonymous",s.src=t,this._isEmpty=!1})}toDataURL(t="image/png",e){switch(t){case"image/svg+xml":return this._toSVG();default:return this.canvas.toDataURL(t,e)}}on(){this.canvas.style.touchAction="none",this.canvas.style.msTouchAction="none",window.PointerEvent?this._handlePointerEvents():(this._handleMouseEvents(),"ontouchstart"in window&&this._handleTouchEvents())}off(){this.canvas.style.touchAction="auto",this.canvas.style.msTouchAction="auto",this.canvas.removeEventListener("pointerdown",this._handlePointerStart),this.canvas.removeEventListener("pointermove",this._handlePointerMove),document.removeEventListener("pointerup",this._handlePointerEnd),this.canvas.removeEventListener("mousedown",this._handleMouseDown),this.canvas.removeEventListener("mousemove",this._handleMouseMove),document.removeEventListener("mouseup",this._handleMouseUp),this.canvas.removeEventListener("touchstart",this._handleTouchStart),this.canvas.removeEventListener("touchmove",this._handleTouchMove),this.canvas.removeEventListener("touchend",this._handleTouchEnd)}isEmpty(){return this._isEmpty}fromData(t,{clear:e=!0}={}){e&&this.clear(),this._fromData(t,this._drawCurve.bind(this),this._drawDot.bind(this)),this._data=e?t:this._data.concat(t)}toData(){return this._data}_strokeBegin(t){this.dispatchEvent(new CustomEvent("beginStroke",{detail:t}));const e={dotSize:this.dotSize,minWidth:this.minWidth,maxWidth:this.maxWidth,penColor:this.penColor,points:[]};this._data.push(e),this._reset(),this._strokeUpdate(t)}_strokeUpdate(t){if(0===this._data.length)return void this._strokeBegin(t);this.dispatchEvent(new CustomEvent("beforeUpdateStroke",{detail:t}));const e=t.clientX,i=t.clientY,n=void 0!==t.pressure?t.pressure:void 0!==t.force?t.force:0,s=this._createPoint(e,i,n),o=this._data[this._data.length-1],h=o.points,r=h.length>0&&h[h.length-1],a=!!r&&s.distanceTo(r)<=this.minDistance,{penColor:d,dotSize:l,minWidth:c,maxWidth:u}=o;if(!r||!r||!a){const t=this._addPoint(s);r?t&&this._drawCurve(t,{penColor:d,dotSize:l,minWidth:c,maxWidth:u}):this._drawDot(s,{penColor:d,dotSize:l,minWidth:c,maxWidth:u}),h.push({time:s.time,x:s.x,y:s.y,pressure:s.pressure})}this.dispatchEvent(new CustomEvent("afterUpdateStroke",{detail:t}))}_strokeEnd(t){this._strokeUpdate(t),this.dispatchEvent(new CustomEvent("endStroke",{detail:t}))}_handlePointerEvents(){this._drawningStroke=!1,this.canvas.addEventListener("pointerdown",this._handlePointerStart),this.canvas.addEventListener("pointermove",this._handlePointerMove),document.addEventListener("pointerup",this._handlePointerEnd)}_handleMouseEvents(){this._drawningStroke=!1,this.canvas.addEventListener("mousedown",this._handleMouseDown),this.canvas.addEventListener("mousemove",this._handleMouseMove),document.addEventListener("mouseup",this._handleMouseUp)}_handleTouchEvents(){this.canvas.addEventListener("touchstart",this._handleTouchStart),this.canvas.addEventListener("touchmove",this._handleTouchMove),this.canvas.addEventListener("touchend",this._handleTouchEnd)}_reset(){this._lastPoints=[],this._lastVelocity=0,this._lastWidth=(this.minWidth+this.maxWidth)/2,this._ctx.fillStyle=this.penColor}_createPoint(e,i,n){const s=this.canvas.getBoundingClientRect();return new t(e-s.left,i-s.top,n,(new Date).getTime())}_addPoint(t){const{_lastPoints:i}=this;if(i.push(t),i.length>2){3===i.length&&i.unshift(i[0]);const t=this._calculateCurveWidths(i[1],i[2]),n=e.fromPoints(i,t);return i.shift(),n}return null}_calculateCurveWidths(t,e){const i=this.velocityFilterWeight*e.velocityFrom(t)+(1-this.velocityFilterWeight)*this._lastVelocity,n=this._strokeWidth(i),s={end:n,start:this._lastWidth};return this._lastVelocity=i,this._lastWidth=n,s}_strokeWidth(t){return Math.max(this.maxWidth/(t+1),this.minWidth)}_drawCurveSegment(t,e,i){const n=this._ctx;n.moveTo(t,e),n.arc(t,e,i,0,2*Math.PI,!1),this._isEmpty=!1}_drawCurve(t,e){const i=this._ctx,n=t.endWidth-t.startWidth,s=2*Math.ceil(t.length());i.beginPath(),i.fillStyle=e.penColor;for(let i=0;i<s;i+=1){const o=i/s,h=o*o,r=h*o,a=1-o,d=a*a,l=d*a;let c=l*t.startPoint.x;c+=3*d*o*t.control1.x,c+=3*a*h*t.control2.x,c+=r*t.endPoint.x;let u=l*t.startPoint.y;u+=3*d*o*t.control1.y,u+=3*a*h*t.control2.y,u+=r*t.endPoint.y;const v=Math.min(t.startWidth+r*n,e.maxWidth);this._drawCurveSegment(c,u,v)}i.closePath(),i.fill()}_drawDot(t,e){const i=this._ctx,n=e.dotSize>0?e.dotSize:(e.minWidth+e.maxWidth)/2;i.beginPath(),this._drawCurveSegment(t.x,t.y,n),i.closePath(),i.fillStyle=e.penColor,i.fill()}_fromData(e,i,n){for(const s of e){const{penColor:e,dotSize:o,minWidth:h,maxWidth:r,points:a}=s;if(a.length>1)for(let n=0;n<a.length;n+=1){const s=a[n],d=new t(s.x,s.y,s.pressure,s.time);this.penColor=e,0===n&&this._reset();const l=this._addPoint(d);l&&i(l,{penColor:e,dotSize:o,minWidth:h,maxWidth:r})}else this._reset(),n(a[0],{penColor:e,dotSize:o,minWidth:h,maxWidth:r})}}_toSVG(){const t=this._data,e=Math.max(window.devicePixelRatio||1,1),i=this.canvas.width/e,n=this.canvas.height/e,s=document.createElementNS("http://www.w3.org/2000/svg","svg");s.setAttribute("width",this.canvas.width.toString()),s.setAttribute("height",this.canvas.height.toString()),this._fromData(t,(t,{penColor:e})=>{const i=document.createElement("path");if(!(isNaN(t.control1.x)||isNaN(t.control1.y)||isNaN(t.control2.x)||isNaN(t.control2.y))){const n=`M ${t.startPoint.x.toFixed(3)},${t.startPoint.y.toFixed(3)} C ${t.control1.x.toFixed(3)},${t.control1.y.toFixed(3)} ${t.control2.x.toFixed(3)},${t.control2.y.toFixed(3)} ${t.endPoint.x.toFixed(3)},${t.endPoint.y.toFixed(3)}`;i.setAttribute("d",n),i.setAttribute("stroke-width",(2.25*t.endWidth).toFixed(3)),i.setAttribute("stroke",e),i.setAttribute("fill","none"),i.setAttribute("stroke-linecap","round"),s.appendChild(i)}},(t,{penColor:e,dotSize:i,minWidth:n,maxWidth:o})=>{const h=document.createElement("circle"),r=i>0?i:(n+o)/2;h.setAttribute("r",r.toString()),h.setAttribute("cx",t.x.toString()),h.setAttribute("cy",t.y.toString()),h.setAttribute("fill",e),s.appendChild(h)});const o=`<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 ${this.canvas.width} ${this.canvas.height}" width="${i}" height="${n}">`;let h=s.innerHTML;if(void 0===h){const t=document.createElement("dummy"),e=s.childNodes;t.innerHTML="";for(let i=0;i<e.length;i+=1)t.appendChild(e[i].cloneNode(!0));h=t.innerHTML}return"data:image/svg+xml;base64,"+btoa(o+h+"</svg>")}}return i}));
</script>

<script>
    'use strict';

    /* Initiate signature pad on canvas */
    const canvas = document.querySelector('canvas');
    const signature_pad = new SignaturePad(canvas);

    /* Responsive helper */
    let resize_canvas = () => {
        // let width = document.querySelector('#canvas_wrapper').offsetWidth;
        // document.querySelector('canvas').width = width;
    }

    let timer = null;

    let timer_function = () => {
        clearTimeout(timer);

        timer = setTimeout(() => {
            resize_canvas();
            signature_pad.clear();
        }, 500);
    }

    window.addEventListener('resize', timer_function);
    timer_function();

    /* Custom writing color */
    document.querySelector('#color').addEventListener('change', event => {
        let hex_code = event.currentTarget.value.split('');
        let r = parseInt(hex_code[1]+hex_code[2],16);
        let g = parseInt(hex_code[3]+hex_code[4],16);
        let b = parseInt(hex_code[5]+hex_code[6],16);
        signature_pad.penColor = `rgb(${r}, ${g}, ${b})`;
    });

    /* Button handlers */
    document.querySelector('#clear').addEventListener('click', event => {
        signature_pad.clear();
    });

    document.querySelector('#undo').addEventListener('click', event => {
        let data = signature_pad.toData();
        if(data) {
            data.pop();
            signature_pad.fromData(data);
        }
    })

    /* Download function */
    let download_as = (type = null, name) => {
        let link = document.createElement('a');
        link.download = name;
        link.style.opacity = '0';
        document.body.appendChild(link);
        link.href = signature_pad.toDataURL(type);
        link.click();
        link.remove();
    }
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>

<?php include_view(THEME_PATH . 'views/partials/clipboard_js.php') ?>
<?php include_view(THEME_PATH . 'views/partials/color_picker_js.php') ?>
