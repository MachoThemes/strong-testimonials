!function(e){var t={};function a(n){if(t[n])return t[n].exports;var r=t[n]={i:n,l:!1,exports:{}};return e[n].call(r.exports,r,r.exports,a),r.l=!0,r.exports}a.m=e,a.c=t,a.d=function(e,t,n){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(a.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)a.d(n,r,function(t){return e[t]}.bind(null,r));return n},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="",a(a.s=0)}([function(e,t,a){"use strict";function n(e){return(n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function i(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function l(e,t){return(l=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function o(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var a,n=s(e);if(t){var r=s(this).constructor;a=Reflect.construct(n,arguments,r)}else a=n.apply(this,arguments);return c(this,a)}}function c(e,t){return!t||"object"!==n(t)&&"function"!=typeof t?function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e):t}function s(e){return(s=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}a.r(t);var m=wp.i18n.__,u=wp.element,d=u.Component,p=u.Fragment,f=wp.blockEditor.InspectorControls,w=wp.components,v=w.SelectControl,g=w.Button,y=w.PanelBody,b=(w.PanelRow,function(e){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&l(e,t)}(s,e);var t,a,n,c=o(s);function s(e){return r(this,s),c.apply(this,arguments)}return t=s,(a=[{key:"render",value:function(){var e=this.props,t=e.attributes,a=(e.setAttributes,e.onIdChange),n=e.selectOptions,r=t.id;return t.views,t.testimonials,React.createElement(p,null,React.createElement(f,null,React.createElement(y,{title:m("View Settings"),initialOpen:!0},0===st_views.views.length&&React.createElement(p,null,React.createElement("p",null,m("You don't seem to have any views.")),React.createElement(g,{href:st_views.adminURL+"edit.php?post_type=wpm-testimonial&page=testimonial-views&action=add",target:"_blank",isDefault:!0},m("Add New View"))),st_views.views.length>0&&React.createElement(p,null,React.createElement(v,{label:m("Select View"),key:r,value:r,options:n,onChange:function(e){return a(parseInt(e))}}),0!=r&&React.createElement(g,{target:"_blank",href:st_views.adminURL+"edit.php?post_type=wpm-testimonial&page=testimonial-views&action=edit&id="+r,isSecondary:!0},m("Edit View"))))))}}])&&i(t.prototype,a),n&&i(t,n),s}(d)),E=(wp.i18n.__,wp.element),_=(E.Component,E.Fragment),R=(E.useEffect,wp.data.withSelect,wp.components),h=(R.SelectControl,R.Spinner,R.Toolbar,R.Button,wp.blockEditor.BlockControls,wp.compose.compose,function(e){var t=e.view.data.template,a=(e.view.id.id,[{fieldName:"client_name",renderName:"Full Name",description:"What is your full name ?"},{fieldName:"email",renderName:"Email",description:"What is you email adress?"}]),n=[{fieldName:"company_name",renderName:"Company Name",description:"What is your company name ?"},{fieldName:"company_website",renderName:"Company Website",description:"Does your company have a website ? "},{fieldName:"post_title",renderName:"Heading",description:"A headline for your testimonial"}];return[React.createElement(_,null,React.createElement("div",{className:"strong-view strong-form strong-view-id-".concat(e.view.id," ").concat(t," wpmtst-").concat(t)},React.createElement("div",{id:"wpmtst-form"},React.createElement("div",{className:"strong-form-inner"},React.createElement("form",{id:"wpmtst-submission-form"},a.map((function(e,t){return[React.createElement("div",{className:"form-field field-".concat(e.fieldName)},React.createElement("label",{for:"wpmtst_".concat(e.fieldName),className:"field-".concat(e.fieldName)},e.renderName),React.createElement("span",{className:"required symbol"}),React.createElement("input",{id:"wpmtst_".concat(e.fieldName),type:"text",className:"text",name:e.fieldName,value:"",placeholder:"",required:"",tabindex:"0"}),React.createElement("span",{className:"after"},e.description))]})),n.map((function(e,t){return[React.createElement("div",{className:"form-field field-".concat(e.fieldName)},React.createElement("label",{for:"wpmtst_".concat(e.fieldName),className:"field-".concat(e.fieldName)},e.renderName),React.createElement("input",{id:"wpmtst_".concat(e.fieldName),type:"text",className:"text",name:e.fieldName,value:"",placeholder:"",required:"",tabindex:"0"}),React.createElement("span",{className:"after"},e.description))]})),React.createElement("div",{className:"form-field field-post_content"},React.createElement("label",{for:"wpmtst_post_content",className:"field-post_content"},"Testimonial"),React.createElement("span",{className:"required symbol"}),React.createElement("textarea",{id:"wpmtst_post_content",name:"post_content",className:"textarea",required:"",placeholder:"",tabindex:"0"}),React.createElement("span",{className:"after"},"What do you think about us?")),React.createElement("div",{className:"form-field field-featured_image"},React.createElement("label",{for:"wpmtst_featured_image",className:"field-featured_image"},"Photo"),React.createElement("div",{className:"field-wrap"},React.createElement("input",{id:"wpmtst_featured_image",type:"file",name:"featured_image",tabindex:"0"})),React.createElement("span",{className:"after"},"Would you like to include a photo?")),React.createElement("div",{className:"form-field field-star_rating"},React.createElement("label",{for:"wpmtst_star_rating",className:"field-star_rating"},"Star rating"),React.createElement("div",{className:"strong-rating-wrapper field-wrap in-form"},React.createElement("fieldset",{contenteditable:"false",id:"wpmtst_star_rating",name:"star_rating",className:"strong-rating","data-field-type":"rating",tabindex:"0"},React.createElement("legend",null,"rating fields"),React.createElement("input",{type:"radio",id:"star_rating-star0",name:"star_rating",value:"0",checked:"checked"}),React.createElement("label",{for:"star_rating-star0",title:"No stars"}),React.createElement("input",{type:"radio",id:"star_rating-star1",name:"star_rating",value:"1"}),React.createElement("label",{for:"star_rating-star1",title:"1 star"}),React.createElement("input",{type:"radio",id:"star_rating-star2",name:"star_rating",value:"2"}),React.createElement("label",{for:"star_rating-star2",title:"2 stars"}),React.createElement("input",{type:"radio",id:"star_rating-star3",name:"star_rating",value:"3"}),React.createElement("label",{for:"star_rating-star3",title:"3 stars"}),React.createElement("input",{type:"radio",id:"star_rating-star4",name:"star_rating",value:"4"}),React.createElement("label",{for:"star_rating-star4",title:"4 stars"}),React.createElement("input",{type:"radio",id:"star_rating-star5",name:"star_rating",value:"5"}),React.createElement("label",{for:"star_rating-star5",title:"5 stars"}))),React.createElement("span",{className:"after"},"Would you like to include star rating?")),React.createElement("div",{className:"form-field wpmtst-submit"},React.createElement("label",null,React.createElement("input",{type:"submit",id:"wpmtst_submit_testimonial",name:"wpmtst_submit_testimonial",value:"Add Testimonial",className:"button",tabindex:"0"}))))))))]}),N=wp.element,k=(N.Component,N.Fragment),x=(N.useEffect,function(e){var t=e.testimonial,a=(e.index,e.data),n=t.id,r=t.title,i=t.content,l=a.client_section;return[React.createElement("div",{className:"wpmtst-testimonial testimonial post-".concat(n)},React.createElement("div",{className:"wpmtst-testimonial-inner testimonial-inner"},React.createElement("div",{className:"wpmtst-testimonial-content testimonial-content"},React.createElement("h3",{class:"wpmtst-testimonial-heading testimonial-heading"},r.rendered),React.createElement("p",null,i.raw)),l.length>0&&React.createElement(k,null,l.map((function(e,a){switch(e.type){case"text":return React.createElement("div",{class:"wpmtst-testimonial-field testimonial-field ".concat(e.class)},t.meta[e.field]);case"link":return React.createElement("div",{class:"wpmtst-testimonial-field testimonial-field ".concat(e.class)},React.createElement("a",{href:"".concat(t.meta[e.url]),target:"_blank",rel:"nofollow  "},t.meta[e.field]))}})))))]}),S=wp.element,O=(S.Component,S.Fragment),C=(S.useEffect,function(e){var t,a,n,r=e.testimonials,i=e.view,l=e.convertDateToUnix,o=e.sortTestimonialsByDate,c=i.data,s=i.id;return[React.createElement("div",{className:"strong-view strong-view-id-".concat(s," ").concat(c.template," wpmtst-").concat(c.template)},React.createElement("div",{className:(t=c.layout,a=c.column_count,n="strong-content strong-".concat(t," columns-").concat(a),""==t?n="strong-content strong-normal columns-1":"masonry"==t&&(n+=" masonry"),n)},"masonry"==c.layout&&React.createElement(O,null,React.createElement("div",{className:"grid-sizer masonry-brick"}),React.createElement("div",{className:"gutter-sizer masonry-brick"})),r.length>0&&React.createElement(O,null,r.map((function(e,t){return-1==c.count||t<c.count?[React.createElement(x,{testimonial:e,index:t,data:c,convertDateToUnix:l,sortTestimonialsByDate:o})]:void 0})))))]});function T(){return(T=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var n in a)Object.prototype.hasOwnProperty.call(a,n)&&(e[n]=a[n])}return e}).apply(this,arguments)}var j=wp.i18n.__,P=wp.element,B=(P.Component,P.Fragment),D=P.useEffect,A=wp.data.withSelect,V=wp.components,F=V.SelectControl,I=V.Spinner,U=(V.Toolbar,V.Button),W=(wp.blockEditor.BlockControls,(0,wp.compose.compose)(A((function(e,t){return{testimonials:(0,e("core").getEntityRecords)("postType","wpm-testimonial",{post_status:"publish",per_page:-1})||[]}})),wp.components.withFilters("wpst.StrongTestimonialViewEdit"))((function(e){var t=e.attributes,a=e.setAttributes,n=e.testimonials,r=t.id,i=(t.views,t.status),l=(t.mode,t.view);D((function(){a({status:"ready",views:st_views.views}),0!=r&&o(r),null!=n&&n.length>1&&1!=e.attributes.sorted&&(n.map((function(e,t){e.unixDate=m(e.date)})),u(n,l.data.order))}));var o=function(t){e.setAttributes({status:"ready",id:t}),c(t)},c=function(e){var t=st_views.views.filter((function(t){return t.id==e}));return a({view:t[0]}),t[0]},s=function(){var e=[{value:0,label:j("None")}];return st_views.views.forEach((function(t){e.push({value:t.id,label:t.name})})),e},m=function(e){return new Date(e).getTime()},u=function(e,t){"oldest"==t?e.sort((function(e,t){return e.unixDate-t.unixDate})):"menu_order"==t?e.sort((function(e,t){return e.menu_order-t.menu_order})):"random"==t&&d(e),a({sorted:!0,testimonials:e})},d=function(e){for(var t,a,n=e.length;0!==n;)a=Math.floor(Math.random()*n),t=e[n-=1],e[n]=e[a],e[a]=t;return e};st_views.views.length>0&&j("Edit View");if("loading"===i)return[React.createElement(B,null,React.createElement("div",{className:"st-block-preview"},React.createElement("div",{className:"st-block-preview__content"},React.createElement("div",{className:"st-block-preview__logo"}," "),React.createElement(I,null))))];if(0==r)return[React.createElement(B,null,React.createElement(b,T({onIdChange:function(e){return o(e)},selectOptions:s()},e)),React.createElement("div",{className:"st-block-preview"},React.createElement("div",{class:"st-block-preview__content"},React.createElement("div",{className:"st-block-preview__logo"}),0===st_views.views.length&&React.createElement(B,null,React.createElement("h6",null,j("You don't seem to have any views.")),React.createElement(U,{href:st_views.adminURL+"edit.php?post_type=wpm-testimonial&page=testimonial-views&action=add",target:"_blank",isDefault:!0},j("Add New View"))),st_views.views.length>0&&React.createElement(B,null,React.createElement(F,{label:"Select a view:",className:"st-view-select",key:r,value:r,options:s(),onChange:function(e){return o(parseInt(e))}}),0!=r&&React.createElement(U,{target:"_blank",href:st_views.adminURL+"edit.php?post_type=wpm-testimonial&page=testimonial-views&action=edit&id="+r,isSecondary:!0},j("Edit Settings"))))))];if(0!=r&&n.length>0){if(null!=l){if("form"==l.data.mode)return[React.createElement(B,null,React.createElement(b,T({onIdChange:function(e){return o(e)},selectOptions:s()},e)),React.createElement(h,{view:l}),React.createElement(h,{view:l}))];if("display"==l.data.mode)return[React.createElement(B,null,React.createElement(b,T({onIdChange:function(e){return o(e)},selectOptions:s()},e)),React.createElement(C,{view:l,testimonials:n,convertDateToUnix:m,sortTestimonialsByDate:u}))]}return null}return null})));function q(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}var M=wp.i18n.__,L=wp.blocks.registerBlockType;new(function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.registerBlock()}var t,a,n;return t=e,(a=[{key:"registerBlock",value:function(){this.blockName="strongtestimonials/view",this.blockAttributes={id:{type:"number",default:0},mode:{type:"string",default:"display"}},L(this.blockName,{title:"Strong Testimonial View",description:M("Render ST View","strong-testimonials"),icon:"editor-quote",category:"common",supports:{align:!0,customClassName:!1},attributes:this.blockAttributes,edit:W,save:function(){return null}})}}])&&q(t.prototype,a),n&&q(t,n),e}())}]);