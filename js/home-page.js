var HomePage=Class.create({initialize:function(options){this.options={ajaxContainer:"ajax-section",page:$("page")};Object.extend(this.options,options);this.setup();this.initializeLogin()},setup:function(){this.defaultLocation=window.location.href;this.options.page.on("click",".pills li , .ajax-link",this.ajaxLink.bind(this));Event.observe(window,"popstate",function(event){var state=event.state;if(state!==null){if(state.page!==undefined){this.ajaxLoad(state.page,false)}}else{this.ajaxLoad(this.defaultLocation)}}.bind(this))},ajaxLink:function(event,element){var link=event.findElement("a.link-attr")||event.findElement().down("a.link-attr");if(!link){console.error("Unable to find link for requested element");return}var url=link.href;if(!url){return}if(link.dataset.local&&link.dataset.local!=="true"){window.location.href=url;return true}event&&event.stop();this.ajaxLoad(url,true)},ajaxLoad:function(url,pushState){new Ajax.Request(url,{method:"GET",contentType:"application/json",encoding:"UTF-8",parameters:{renderMode:"ajax"},onCreate:function(){$(this.options.ajaxContainer).addClassName("margin-left");setTimeout(function(){$(this.options.ajaxContainer).update('<div class="col-md-12 text-center" style="margin-top: 50%;"><i class="fa fa-spinner fa-spin fa-6x" style="font-size: 7em;"></i></div>')}.bind(this),0)}.bind(this),onSuccess:function(response){if(pushState){window.history.pushState({page:url},"",url)}setTimeout(function(){if(response.responseText!=null&&response.responseText.include("ajax-section")){$(this.options.ajaxContainer).replace(response.responseText);this.initializeLogin();if($("user.username")){$("user.username").focus()}}else{window.location.replace("/home.html")}$(this.options.ajaxContainer).addClassName("margin-left")}.bind(this),0);setTimeout(function(){$(this.options.ajaxContainer).removeClassName("margin-left")}.bind(this),0)}.bind(this)})},initializeLogin:function(){if(!String.prototype.trim){(function(){var rtrim=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;String.prototype.trim=function(){return this.replace(rtrim,"")}})()}[].slice.call(document.querySelectorAll(".input-animation-slide-right .form-control")).forEach(function(inputEl){inputEl.addEventListener("focus",onInputFocus);inputEl.addEventListener("blur",onInputBlur);setTimeout(function(){if(inputEl.value.trim()!==""){classie.add(inputEl.parentNode,"input--filled")}},100)});function onInputFocus(ev){classie.add(ev.target.parentNode,"input--filled")}function onInputBlur(ev){if(ev.target.value.trim()===""){classie.remove(ev.target.parentNode,"input--filled")}}}});
/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */
(function(window){function classReg(className){return new RegExp("(^|\\s+)"+className+"(\\s+|$)")}var hasClass,addClass,removeClass;if("classList" in document.documentElement){hasClass=function(elem,c){return elem.classList.contains(c)};addClass=function(elem,c){elem.classList.add(c)};removeClass=function(elem,c){elem.classList.remove(c)}}else{hasClass=function(elem,c){return classReg(c).test(elem.className)};addClass=function(elem,c){if(!hasClass(elem,c)){elem.className=elem.className+" "+c}};removeClass=function(elem,c){elem.className=elem.className.replace(classReg(c)," ")}}function toggleClass(elem,c){var fn=hasClass(elem,c)?removeClass:addClass;fn(elem,c)}var classie={hasClass:hasClass,addClass:addClass,removeClass:removeClass,toggleClass:toggleClass,has:hasClass,add:addClass,remove:removeClass,toggle:toggleClass};if(typeof define==="function"&&define.amd){define(classie)}else{window.classie=classie}})(window);