$(function() {
"use strict";
$(".preloader").fadeOut();
// this is for close icon when navigation open in mobile view
$(".nav-toggler").on('click', function() {
$("#main-wrapper").toggleClass("show-sidebar");
$(".nav-toggler i").toggleClass("ti-menu");
});
$(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
$(".app-search").toggle(200);
$(".app-search input").focus();
});
// ==============================================================
// Resize all elements
// ==============================================================
$("body, .page-wrapper").trigger("resize");
$(".page-wrapper").delay(20).show();

//****************************
/* This is for the mini-sidebar if width is less then 1170*/
//****************************
var setsidebartype = function() {
var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
if (width < 1170) {
$("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
} else {
$("#main-wrapper").attr("data-sidebartype", "full");
}
};
$(window).ready(setsidebartype);
$(window).on("resize", setsidebartype);
//sub menu creation for posts
$('.submenu').hide();
$('#hassub').click(function(e){
e.preventDefault();
$('.submenu').toggle();
});
//sub menu creation users
$('.submenu2').hide();
$('#hassub2').click(function(e){
e.preventDefault();
$('.submenu2').toggle();
});
});
///////////////for tag//////////////////
(function(){
"use strict"

// Plugin Constructor
var TagsInput = function(opts){
this.options = Object.assign(TagsInput.defaults , opts);
this.init();
}
// Initialize the plugin
TagsInput.prototype.init = function(opts){
this.options = opts ? Object.assign(this.options, opts) : this.options;
if(this.initialized)
this.destroy();

if(!(this.orignal_input = document.getElementById(this.options.selector)) ){
console.error("tags-input couldn't find an element with the specified ID");
return this;
}
this.arr = [];
this.wrapper = document.createElement('div');
this.input = document.createElement('input');
init(this);
initEvents(this);
this.initialized =  true;
return this;
}
// Add Tags
TagsInput.prototype.addTag = function(string){
if(this.anyErrors(string))
return ;
this.arr.push(string);
var tagInput = this;
var tag = document.createElement('span');
tag.className = this.options.tagClass;
tag.innerText = string;
var closeIcon = document.createElement('a');
closeIcon.innerHTML = '&times;';

// delete the tag when icon is clicked
closeIcon.addEventListener('click' , function(e){
e.preventDefault();
var tag = this.parentNode;
for(var i =0 ;i < tagInput.wrapper.childNodes.length ; i++){
if(tagInput.wrapper.childNodes[i] == tag)
tagInput.deleteTag(tag , i);
}
})
tag.appendChild(closeIcon);
this.wrapper.insertBefore(tag , this.input);
this.orignal_input.value = this.arr.join(',');
return this;
}
// Delete Tags
TagsInput.prototype.deleteTag = function(tag , i){
tag.remove();
this.arr.splice( i , 1);
this.orignal_input.value =  this.arr.join(',');
return this;
}
// Make sure input string have no error with the plugin
TagsInput.prototype.anyErrors = function(string){
if( this.options.max != null && this.arr.length >= this.options.max ){
console.log('max tags limit reached');
return true;
}

if(!this.options.duplicate && this.arr.indexOf(string) != -1 ){
console.log('duplicate found " '+string+' " ')
return true;
}
return false;
}
// Add tags programmatically
TagsInput.prototype.addData = function(array){
var plugin = this;

array.forEach(function(string){
plugin.addTag(string);
})
return this;
}
// Get the Input String
TagsInput.prototype.getInputString = function(){
return this.arr.join(',');
}
// destroy the plugin
TagsInput.prototype.destroy = function(){
this.orignal_input.removeAttribute('hidden');
delete this.orignal_input;
var self = this;

Object.keys(this).forEach(function(key){
if(self[key] instanceof HTMLElement)
self[key].remove();

if(key != 'options')
delete self[key];
});
this.initialized = false;
}
// Private function to initialize the tag input plugin
function init(tags){
tags.wrapper.append(tags.input);
tags.wrapper.classList.add(tags.options.wrapperClass);
tags.orignal_input.setAttribute('hidden' , 'true');
tags.orignal_input.parentNode.insertBefore(tags.wrapper , tags.orignal_input);
}
// initialize the Events
function initEvents(tags){
tags.wrapper.addEventListener('click' ,function(){
tags.input.focus();
});

tags.input.addEventListener('keydown' , function(e){
var str = tags.input.value.trim();
if( !!(~[9 , 13 , 188].indexOf( e.keyCode ))  )
{
e.preventDefault();
tags.input.value = "";
if(str != "")
tags.addTag(str);
}
});
}
// Set All the Default Values
TagsInput.defaults = {
selector : '',
wrapperClass : 'tags-input-wrapper',
tagClass : 'tag',
max : null,
duplicate: false
}
window.TagsInput = TagsInput;
})();
var tagInput1 = new TagsInput({
selector: 'tag-input1',
duplicate : false,
max : 100
});
tagInput1.addData(['Blog'])
//////////////for image upload//////////////
function handleFileSelect(evt) {
var files = evt.target.files; // FileList object
// Loop through the FileList and render image files as thumbnails.
for (var i = 0, f; f = files[i]; i++) {
// Only process image files.
if (!f.type.match('image.*')) {
continue;
}
var reader = new FileReader();
// Closure to capture the file information.
reader.onload = (function(theFile) {
return function(e) {
// Render thumbnail.
var span = document.createElement('span');
span.innerHTML = ['<img class="thumb" src="', e.target.result,
'" title="', escape(theFile.name), '"/>'
].join('');
document.getElementById('list').insertBefore(span, null);
};
})(f);
// Read in the image file as a data URL.
reader.readAsDataURL(f);
}
}
document.getElementById('files').addEventListener('change', handleFileSelect, false);

//password generator
let pass = document.getElementById("pass");
let btn = document.getElementById("btn");
// let btncp = document.getElementById("btncp");

function generatePass() {
    let chars =
        "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+[]{}?><";
    let passLength = 20;
    let password = "";

    for (let i = 0; i < passLength; i++)
        password += chars[Math.floor(Math.random() * chars.length)];

    return password;
}
btn.addEventListener("click",(e) => {
    e.preventDefault();
    pass.value = generatePass();
});

