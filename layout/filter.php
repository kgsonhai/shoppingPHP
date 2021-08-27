<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <style type="text/css">
    html {
  line-height: 1.15;
  /* 1 */
  -ms-text-size-adjust: 100%;
  /* 2 */
  -webkit-text-size-adjust: 100%;
  /* 2 */
}
/* Sections
   ========================================================================== */
/**
 * Remove the margin in all browsers (opinionated).
 */
article,
aside,
footer,
header,
nav,
section {
  display: block;
}

/**
 * Correct the font size and margin on `h1` elements within `section` and
 * `article` contexts in Chrome, Firefox, and Safari.
 */
h1 {
  font-size: 2em;
  margin: 0.67em 0;
}

/* Grouping content
   ========================================================================== */
/**
 * Add the correct display in IE 9-.
 * 1. Add the correct display in IE.
 */
figcaption,
figure,
main {
  /* 1 */
  display: block;
}

/**
 * Add the correct margin in IE 8.
 */
figure {
  margin: 1em 40px;
}

/**
 * 1. Add the correct box sizing in Firefox.
 * 2. Show the overflow in Edge and IE.
 */
hr {
  box-sizing: content-box;
  /* 1 */
  height: 0;
  /* 1 */
  overflow: visible;
  /* 2 */
}

/**
 * 1. Correct the inheritance and scaling of font size in all browsers.
 * 2. Correct the odd `em` font sizing in all browsers.
 */
pre {
  font-family: monospace, monospace;
  /* 1 */
  font-size: 1em;
  /* 2 */
}

/* Text-level semantics
   ========================================================================== */
/**
 * 1. Remove the gray background on active links in IE 10.
 * 2. Remove gaps in links underline in iOS 8+ and Safari 8+.
 */
a {
  background-color: transparent;
  /* 1 */
  -webkit-text-decoration-skip: objects;
  /* 2 */
}

/**
 * 1. Remove the bottom border in Chrome 57- and Firefox 39-.
 * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
 */
abbr[title] {
  border-bottom: none;
  /* 1 */
  text-decoration: underline;
  /* 2 */
  text-decoration: underline dotted;
  /* 2 */
}

/**
 * Prevent the duplicate application of `bolder` by the next rule in Safari 6.
 */
b,
strong {
  font-weight: inherit;
}

/**
 * Add the correct font weight in Chrome, Edge, and Safari.
 */
b,
strong {
  font-weight: bolder;
}

/**
 * 1. Correct the inheritance and scaling of font size in all browsers.
 * 2. Correct the odd `em` font sizing in all browsers.
 */
code,
kbd,
samp {
  font-family: monospace, monospace;
  /* 1 */
  font-size: 1em;
  /* 2 */
}

/**
 * Add the correct font style in Android 4.3-.
 */
dfn {
  font-style: italic;
}

/**
 * Add the correct background and color in IE 9-.
 */
mark {
  background-color: #ff0;
  color: #000;
}

/**
 * Add the correct font size in all browsers.
 */
small {
  font-size: 80%;
}

/**
 * Prevent `sub` and `sup` elements from affecting the line height in
 * all browsers.
 */
sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

/* Embedded content
   ========================================================================== */
/**
 * Add the correct display in IE 9-.
 */
audio,
video {
  display: inline-block;
}

/**
 * Add the correct display in iOS 4-7.
 */
audio:not([controls]) {
  display: none;
  height: 0;
}

/**
 * Remove the border on images inside links in IE 10-.
 */
img {
  border-style: none;
}

/**
 * Hide the overflow in IE.
 */
svg:not(:root) {
  overflow: hidden;
}

/* Forms
   ========================================================================== */
/**
 * 1. Change the font styles in all browsers (opinionated).
 * 2. Remove the margin in Firefox and Safari.
 */
button,
input,
optgroup,
select,
textarea {
  font-family: sans-serif;
  /* 1 */
  font-size: 100%;
  /* 1 */
  line-height: 1.15;
  /* 1 */
  margin: 0;
  /* 2 */
}

/**
 * Show the overflow in IE.
 * 1. Show the overflow in Edge.
 */
button,
input {
  /* 1 */
  overflow: visible;
}

/**
 * Remove the inheritance of text transform in Edge, Firefox, and IE.
 * 1. Remove the inheritance of text transform in Firefox.
 */
button,
select {
  /* 1 */
  text-transform: none;
}

/**
 * 1. Prevent a WebKit bug where (2) destroys native `audio` and `video`
 *    controls in Android 4.
 * 2. Correct the inability to style clickable types in iOS and Safari.
 */
button,
html [type="button"],
[type="reset"],
[type="submit"] {
  -webkit-appearance: button;
  /* 2 */
}

/**
 * Remove the inner border and padding in Firefox.
 */
button::-moz-focus-inner,
[type="button"]::-moz-focus-inner,
[type="reset"]::-moz-focus-inner,
[type="submit"]::-moz-focus-inner {
  border-style: none;
  padding: 0;
}

/**
 * Restore the focus styles unset by the previous rule.
 */
button:-moz-focusring,
[type="button"]:-moz-focusring,
[type="reset"]:-moz-focusring,
[type="submit"]:-moz-focusring {
  outline: 1px dotted ButtonText;
}

/**
 * Correct the padding in Firefox.
 */
fieldset {
  padding: 0.35em 0.75em 0.625em;
}

/**
 * 1. Correct the text wrapping in Edge and IE.
 * 2. Correct the color inheritance from `fieldset` elements in IE.
 * 3. Remove the padding so developers are not caught out when they zero out
 *    `fieldset` elements in all browsers.
 */
legend {
  box-sizing: border-box;
  /* 1 */
  color: inherit;
  /* 2 */
  display: table;
  /* 1 */
  max-width: 100%;
  /* 1 */
  padding: 0;
  /* 3 */
  white-space: normal;
  /* 1 */
}

/**
 * 1. Add the correct display in IE 9-.
 * 2. Add the correct vertical alignment in Chrome, Firefox, and Opera.
 */
progress {
  display: inline-block;
  /* 1 */
  vertical-align: baseline;
  /* 2 */
}

/**
 * Remove the default vertical scrollbar in IE.
 */
textarea {
  overflow: auto;
}

/**
 * 1. Add the correct box sizing in IE 10-.
 * 2. Remove the padding in IE 10-.
 */
[type="checkbox"],
[type="radio"] {
  box-sizing: border-box;
  /* 1 */
  padding: 0;
  /* 2 */
}

/**
 * Correct the cursor style of increment and decrement buttons in Chrome.
 */
[type="number"]::-webkit-inner-spin-button,
[type="number"]::-webkit-outer-spin-button {
  height: auto;
}

/**
 * 1. Correct the odd appearance in Chrome and Safari.
 * 2. Correct the outline style in Safari.
 */
[type="search"] {
  -webkit-appearance: textfield;
  /* 1 */
  outline-offset: -2px;
  /* 2 */
}

/**
 * Remove the inner padding and cancel buttons in Chrome and Safari on macOS.
 */
[type="search"]::-webkit-search-cancel-button,
[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

/**
 * 1. Correct the inability to style clickable types in iOS and Safari.
 * 2. Change font properties to `inherit` in Safari.
 */
::-webkit-file-upload-button {
  -webkit-appearance: button;
  /* 1 */
  font: inherit;
  /* 2 */
}

/* Interactive
   ========================================================================== */
/*
 * Add the correct display in IE 9-.
 * 1. Add the correct display in Edge, IE, and Firefox.
 */
details,
menu {
  display: block;
}
.products{
margin-top: 10px;
border: 1px solid;
border-color: #e3d2d2;
}
.product-filter h1 a{
  font-size: 1.5em;
}

/*
 * Add the correct display in all browsers.
 */
summary {
  display: list-item;
}

/* Scripting
   ========================================================================== */
/**
 * Add the correct display in IE 9-.
 */
canvas {
  display: inline-block;
}

/**
 * Add the correct display in IE.
 */
template {
  display: none;
}

/* Hidden
   ========================================================================== */
/**
 * Add the correct display in IE 10-.
 */
[hidden] {
  display: none;
}

html {
  height: 100%;
}

fieldset {
  margin: 0;
  padding: 0;
  -webkit-margin-start: 0;
  -webkit-margin-end: 0;
  -webkit-padding-before: 0;
  -webkit-padding-start: 0;
  -webkit-padding-end: 0;
  -webkit-padding-after: 0;
  border: 0;
}

legend {
  margin: 0;
  padding: 0;
  display: block;
  -webkit-padding-start: 0;
  -webkit-padding-end: 0;
}

/*===============================
=            Choices            =
===============================*/
.choices {
  position: relative;
  margin-bottom: 24px;
  font-size: 16px;
}

.choices:focus {
  outline: none;
}

.choices:last-child {
  margin-bottom: 0;
}

.choices.is-disabled .choices__inner, .choices.is-disabled .choices__input {
  background-color: #EAEAEA;
  cursor: not-allowed;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.choices.is-disabled .choices__item {
  cursor: not-allowed;
}

.choices[data-type*="select-one"] {
  cursor: pointer;
}

.choices[data-type*="select-one"] .choices__inner {
  padding-bottom: 7.5px;
}

.choices[data-type*="select-one"] .choices__input {
  display: block;
  width: 100%;
  padding: 10px;
  border-bottom: 1px solid #DDDDDD;
  background-color: #FFFFFF;
  margin: 0;
}

.choices[data-type*="select-one"] .choices__button {
  background-image: url("../../icons/cross-inverse.svg");
  padding: 0;
  background-size: 8px;
  height: 100%;
  position: absolute;
  top: 50%;
  right: 0;
  margin-top: -10px;
  margin-right: 25px;
  height: 20px;
  width: 20px;
  border-radius: 10em;
  opacity: .5;
}

.choices[data-type*="select-one"] .choices__button:hover, .choices[data-type*="select-one"] .choices__button:focus {
  opacity: 1;
}

.choices[data-type*="select-one"] .choices__button:focus {
  box-shadow: 0px 0px 0px 2px #00BCD4;
}

.choices[data-type*="select-one"]:after {
  content: "";
  height: 0;
  width: 0;
  border-style: solid;
  border-color: #333333 transparent transparent transparent;
  border-width: 5px;
  position: absolute;
  right: 11.5px;
  top: 50%;
  margin-top: -2.5px;
  pointer-events: none;
}

.choices[data-type*="select-one"].is-open:after {
  border-color: transparent transparent #333333 transparent;
  margin-top: -7.5px;
}

.choices[data-type*="select-one"][dir="rtl"]:after {
  left: 11.5px;
  right: auto;
}

.choices[data-type*="select-one"][dir="rtl"] .choices__button {
  right: auto;
  left: 0;
  margin-left: 25px;
  margin-right: 0;
}

.choices[data-type*="select-multiple"] .choices__inner, .choices[data-type*="text"] .choices__inner {
  cursor: text;
}

.choices[data-type*="select-multiple"] .choices__button, .choices[data-type*="text"] .choices__button {
  position: relative;
  display: inline-block;
  margin-top: 0;
  margin-right: -4px;
  margin-bottom: 0;
  margin-left: 8px;
  padding-left: 16px;
  border-left: 1px solid #008fa1;
  background-image: url("../../icons/cross.svg");
  background-size: 8px;
  width: 8px;
  line-height: 1;
  opacity: .75;
}

.choices[data-type*="select-multiple"] .choices__button:hover, .choices[data-type*="select-multiple"] .choices__button:focus, .choices[data-type*="text"] .choices__button:hover, .choices[data-type*="text"] .choices__button:focus {
  opacity: 1;
}

.choices__inner {
  display: inline-block;
  vertical-align: top;
  width: 100%;
  background-color: #f9f9f9;
  padding: 7.5px 7.5px 3.75px;
  border: 1px solid #DDDDDD;
  border-radius: 2.5px;
  font-size: 14px;
  min-height: 44px;
  overflow: hidden;
}

.is-focused .choices__inner, .is-open .choices__inner {
  border-color: #b7b7b7;
}

.is-open .choices__inner {
  border-radius: 2.5px 2.5px 0 0;
}

.is-flipped.is-open .choices__inner {
  border-radius: 0 0 2.5px 2.5px;
}

.choices__list {
  margin: 0;
  padding-left: 0;
  list-style: none;
}

.choices__list--single {
  display: inline-block;
  padding: 4px 16px 4px 4px;
  width: 100%;
}

[dir="rtl"] .choices__list--single {
  padding-right: 4px;
  padding-left: 16px;
}

.choices__list--single .choices__item {
  width: 100%;
}

.choices__list--multiple {
  display: inline;
}

.choices__list--multiple .choices__item {
  display: inline-block;
  vertical-align: middle;
  border-radius: 20px;
  padding: 4px 10px;
  font-size: 12px;
  font-weight: 500;
  margin-right: 3.75px;
  margin-bottom: 3.75px;
  background-color: #00BCD4;
  border: 1px solid #00a5bb;
  color: #FFFFFF;
  word-break: break-all;
}

.choices__list--multiple .choices__item[data-deletable] {
  padding-right: 5px;
}

[dir="rtl"] .choices__list--multiple .choices__item {
  margin-right: 0;
  margin-left: 3.75px;
}

.choices__list--multiple .choices__item.is-highlighted {
  background-color: #00a5bb;
  border: 1px solid #008fa1;
}

.is-disabled .choices__list--multiple .choices__item {
  background-color: #aaaaaa;
  border: 1px solid #919191;
}

.choices__list--dropdown {
  display: none;
  z-index: 1;
  position: absolute;
  width: 100%;
  background-color: #FFFFFF;
  border: 1px solid #DDDDDD;
  top: 100%;
  margin-top: -1px;
  border-bottom-left-radius: 2.5px;
  border-bottom-right-radius: 2.5px;
  overflow: hidden;
  word-break: break-all;
}

.choices__list--dropdown.is-active {
  display: block;
}

.is-open .choices__list--dropdown {
  border-color: #b7b7b7;
}

.is-flipped .choices__list--dropdown {
  top: auto;
  bottom: 100%;
  margin-top: 0;
  margin-bottom: -1px;
  border-radius: .25rem .25rem 0 0;
}

.choices__list--dropdown .choices__list {
  position: relative;
  max-height: 300px;
  overflow: auto;
  -webkit-overflow-scrolling: touch;
  will-change: scroll-position;
}

.choices__list--dropdown .choices__item {
  position: relative;
  padding: 10px;
  font-size: 14px;
}

[dir="rtl"] .choices__list--dropdown .choices__item {
  text-align: right;
}

@media (min-width: 640px) {
  .choices__list--dropdown .choices__item--selectable {
    padding-right: 100px;
  }
  .choices__list--dropdown .choices__item--selectable:after {
    content: attr(data-select-text);
    font-size: 12px;
    opacity: 0;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
  }
  [dir="rtl"] .choices__list--dropdown .choices__item--selectable {
    text-align: right;
    padding-left: 100px;
    padding-right: 10px;
  }
  [dir="rtl"] .choices__list--dropdown .choices__item--selectable:after {
    right: auto;
    left: 10px;
  }
}

.choices__list--dropdown .choices__item--selectable.is-highlighted {
  background-color: #f2f2f2;
}

.choices__list--dropdown .choices__item--selectable.is-highlighted:after {
  opacity: .5;
}

.choices__item {
  cursor: default;
}

.choices__item--selectable {
  cursor: pointer;
}

.choices__item--disabled {
  cursor: not-allowed;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  opacity: .5;
}

.choices__heading {
  font-weight: 600;
  font-size: 12px;
  padding: 10px;
  border-bottom: 1px solid #f7f7f7;
  color: gray;
}

.choices__button {
  text-indent: -9999px;
  -webkit-appearance: none;
  -moz-appearance: none;
       appearance: none;
  border: 0;
  background-color: transparent;
  background-repeat: no-repeat;
  background-position: center;
  cursor: pointer;
}

.choices__button:focus {
  outline: none;
}

.choices__input {
  display: inline-block;
  vertical-align: baseline;
  background-color: #f9f9f9;
  font-size: 14px;
  margin-bottom: 5px;
  border: 0;
  border-radius: 0;
  max-width: 100%;
  padding: 4px 0 4px 2px;
}

.choices__input:focus {
  outline: 0;
}

[dir="rtl"] .choices__input {
  padding-right: 2px;
  padding-left: 0;
}

.choices__placeholder {
  opacity: .5;
}

/*=====  End of Choices  ======*/
* {
  box-sizing: border-box;
}

.s010 {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
      justify-content: center;
  -ms-flex-align: center;
      align-items: center;
  padding: 15px;
  font-family: 'Lato', sans-serif;
}

.s010 form {
  width: 100%;
  max-width: 790px;
  margin: 0;
}

.s010 form .inner-form {
  width: 100%;
}

.s010 form .inner-form .input-field {
  position: relative;
}

.s010 form .inner-form .input-field input {
  height: 100%;
  border: 0;
  display: block;
  width: 100%;
  padding: 10px 32px 10px 70px;
  font-size: 18px;
  height: 70px;
  color: #fff;
  background: linear-gradient(to right, #2c6dd5 0%, #2c6dd5 28%, #ff4b5a 91%, #ff4b5a 100%);
  font-family: 'Lato', sans-serif;
}

.s010 form .inner-form .input-field input.placeholder {
  color: #fff;
  font-size: 18px;
  font-weight: 400;
}

.s010 form .inner-form .input-field input:-moz-placeholder {
  color: #fff;
  font-size: 18px;
  font-weight: 400;
}

.s010 form .inner-form .input-field input::-webkit-input-placeholder {
  color: #fff;
  font-size: 18px;
  font-weight: 400;
}

.s010 form .inner-form .input-field input:hover, .s010 form .inner-form .input-field input:focus {
  box-shadow: none;
  outline: 0;
}

.s010 form .inner-form .input-field .btn-search {
  min-width: 100px;
  height: 40px;
  padding: 0 15px;
  background: linear-gradient(to right, #2c6dd5 0%, #2c6dd5 28%, #ff4b5a 91%, #ff4b5a 100%);
  white-space: nowrap;
  border-radius: 20px;
  font-size: 14px;
  color: #fff;
  transition: all .2s ease-out, color .2s ease-out;
  border: 0;
  cursor: pointer;
  font-weight: 400;
  box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.15);
  z-index: 0;
  position: relative;
}

.s010 form .inner-form .input-field .btn-search:before {
  border-radius: inherit;
  background: linear-gradient(45deg, #ff4b5a 0%, #ff4b5a 28%, #2c6dd5 91%, #2c6dd5 100%);
  content: '';
  display: block;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  width: 100%;
  z-index: -1;
  transition: all .2s ease-out, color .2s ease-out;
}

.s010 form .inner-form .input-field .btn-search:hover::before {
  opacity: 1;
}

.s010 form .inner-form .input-field .btn-search:focus {
  outline: 0;
  box-shadow: none;
}

.s010 form .inner-form .input-field .btn-delete {
  min-width: 100px;
  height: 40px;
  padding: 0 15px;
  background: transparent;
  white-space: nowrap;
  border-radius: 0;
  font-size: 14px;
  color: #666;
  transition: all .2s ease-out, color .2s ease-out;
  border: 0;
  cursor: pointer;
  font-weight: 400;
}

.s010 form .inner-form .input-field .btn-delete:hover, .s010 form .inner-form .input-field .btn-delete:focus {
  color: #000;
  outline: 0;
  box-shadow: none;
}

.s010 form .inner-form .basic-search {
  box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  overflow: hidden;
  border-radius: 34px;
  margin-bottom: 5px;
}

.s010 form .inner-form .basic-search .input-field {
  width: 100%;
}

.s010 form .inner-form .basic-search .input-field input {
  padding: 10px 80px 10px 40px;
}

.s010 form .inner-form .basic-search .input-field .icon-wrap {
  position: absolute;
  top: 0;
  right: 0;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
  width: 60px;
  height: 100%;
}

.s010 form .inner-form .basic-search .input-field .icon-wrap svg {
  width: 34px;
  height: 34px;
  fill: #fff;
}

.s010 form .inner-form .advance-search {
  background: #fff;
  padding: 40px;
  border-radius: 10px;
}

.s010 form .inner-form .advance-search .desc {
  font-size: 14px;
  color: #555;
  display: block;
  margin-bottom: 26px;
}

.s010 form .inner-form .advance-search .row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: justify;
      justify-content: space-between;
  -ms-flex-align: center;
      align-items: center;
  margin-bottom: 20px;
}

.s010 form .inner-form .advance-search .row.second {
  margin-bottom: 46px;
}

.s010 form .inner-form .advance-search .row.third {
  margin-bottom: 0;
}

.s010 form .inner-form .advance-search .row.third .input-field {
  width: 100%;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: justify;
      justify-content: space-between;
  -ms-flex-align: center;
      align-items: center;
}

.s010 form .inner-form .advance-search .row.third .input-field .result-count {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: start;
      justify-content: flex-start;
  -ms-flex-align: center;
      align-items: center;
  width: 110px;
  color: #999;
  font-size: 14px;
}

.s010 form .inner-form .advance-search .row.third .input-field .result-count span {
  color: #333;
  padding-right: 5px;
}

.s010 form .inner-form .advance-search .input-field {
  width: calc((100% - 40px) / 3);
}

.s010 form .inner-form .advance-search .input-select {
  height: 40px;
}

.s010 form .inner-form .advance-search .choices__inner {
  background: #ccc;
  border-radius: 20px;
  border: 0;
  border: 0;
  height: 100%;
  color: #fff;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
  padding: 0;
  padding-right: 30px;
  font-size: 14px;
  min-height: 40px;
}

.s010 form .inner-form .advance-search .choices__inner .choices__list.choices__list--single {
  display: -ms-flexbox;
  display: flex;
  padding: 5px 18px;
  -ms-flex-align: center;
      align-items: center;
  height: 100%;
}

.s010 form .inner-form .advance-search .choices__inner .choices__item.choices__item--selectable.choices__placeholder {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
  height: 100%;
  opacity: 1;
  color: #333;
}

.s010 form .inner-form .advance-search .choices__inner .choices__list--single .choices__item {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
  height: 100%;
  color: #fff;
}

.s010 form .inner-form .advance-search .choices__list.choices__list--dropdown {
  border: 0;
  background: #333;
  padding: 10px 18px 20px 18px;
  margin-top: 3px;
  border-radius: 10px;
  box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.15);
}

.s010 form .inner-form .advance-search .choices__list.choices__list--dropdown .choices__item--selectable {
  padding-right: 0;
}

.s010 form .inner-form .advance-search .choices__list--dropdown .choices__item--selectable.is-highlighted {
  background: transparent;
  color: #fff;
}

.s010 form .inner-form .advance-search .choices__list--dropdown .choices__item {
  color: #ccc;
  min-height: 20px;
  padding: 8px 0;
}

.s010 form .inner-form .advance-search .choices[data-type*="select-one"]:after {
  border: 0;
  width: 32px;
  height: 32px;
  margin: 0;
  transform: none;
  opacity: 1;
  right: 15px;
  top: 4px;
  background-size: 18px 18px;
  background-position: right center;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg fill='%23999' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3e%3cpath d='M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
}

.s010 form .inner-form .advance-search .choices[data-type*="select-one"].is-open:after {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg fill='%23999' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3e%3cpath d='M12 8l-6 6 1.41 1.41L12 10.83l4.59 4.58L18 14z'/%3e%3c/svg%3e");
}

.s010 form .inner-form .advance-search .choices[data-type*="select-one"] .choices__button {
  display: none;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.s010 form .inner-form .advance-search .choices.valid .choices__inner {
  background: linear-gradient(to right, #2c6dd5 0%, #2c6dd5 28%, #ff4b5a 91%, #ff4b5a 100%);
}

.s010 form .inner-form .advance-search .choices.valid:after {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg fill='%23fff' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3e%3cpath d='M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z'/%3e%3c/svg%3e");
}

.s010 form .inner-form .advance-search .choices.valid.is-open:after {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg fill='%23fff' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3e%3cpath d='M12 8l-6 6 1.41 1.41L12 10.83l4.59 4.58L18 14z'/%3e%3c/svg%3e");
}

@media screen and (max-width: 767px) {
  .s010 form .inner-form .basic-search .input-field input {
    padding: 10px 110px 10px 30px;
  }
  .s010 form .inner-form .basic-search .input-field .icon-wrap {
    width: 80px;
    -ms-flex-pack: center;
        justify-content: center;
  }
  .s010 form .inner-form .basic-search .input-field .icon-wrap svg {
    width: 30px;
    height: 30px;
  }
  .s010 form .inner-form .advance-search {
    padding: 40px 15px;
  }
  .s010 form .inner-form .advance-search .row {
    display: block;
  }
  .s010 form .inner-form .advance-search .input-field {
    width: 100%;
    margin-bottom: 20px;
  }
}

/*# sourceMappingURL=Searchs_010.css.map */

  </style>
  <body>
    <div class="s010">
      <form action="products.php?action=search" method="POST">
        <div class="inner-form">
          <div class="basic-search">
            <div class="input-field">
              <input id="search" type="text" placeholder="Nhập từ khóa" name="tensanpham"
               value="<?=!empty($tensanpham)?$tensanpham:""?>" />
              <div class="icon-wrap">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                </svg>
              </div>
            </div>
          </div>
          <div class="advance-search">
            <span class="desc">ADVANCED SEARCH</span>
            <div class="row">
              <div class="input-field">
                <div class="input-select">
                  <select name="gia" class="form-control">
                    <option value="">Price</option>
                    <option value="1500000">Dưới 1.500.000đ</option>
                    <option value="3000000">1.500.000đ-3.000.000đ</option>
                    <option value="3000000">Trên 3.000.000đ</option>
                    <?php if (isset($_SESSION['product_filter']['gia'])) { ?>
                     <option selected><?php echo $_SESSION['product_filter']['gia']?></option>  
                    <?php  } ?>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select  name="color" class="form-control">
                    <option value="">Color</option>
                    <option value="red">Red</option>
                    <option value="white">White</option>
                    <option value="black">Black</option>
                    <option value="pink">Pink</option>
                    <option value="blue">Blue</option>
                    <option value="purple">Purple</option>
                    <option value="Orange">Orange</option>
                    <option value="Brown">Brown</option>
                    <?php if (isset($_SESSION['product_filter']['color'])) { ?>
                     <option selected><?php echo $_SESSION['product_filter']['color']?></option>  
                    <?php  } ?>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select name="size" class="form-control">
                    <option value="">size</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <?php if (isset($_SESSION['product_filter']['size'])) { ?>
                     <option selected><?php echo $_SESSION['product_filter']['size']?></option>  
                    <?php  } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row second">
              <div class="input-field">
                <div class="input-select">
                  <select name="iddanhmuc" class="form-control">
                    <option value="">Hãng</option>
                    <?php  
                        $ketqua = mysqli_query($conn,"SELECT * FROM `danhmuc`");
                        while ($row1 = mysqli_fetch_assoc($ketqua)){                  
                  echo '<option value="'.$row1['id'].'">'.$row1['hangsx'].'</option>';                                                        
                        }
                     ?>
                    <?php if (isset($_SESSION['product_filter']['iddanhmuc'])) { ?>
                     <option selected><?php echo $_SESSION['product_filter']['iddanhmuc']?></option>  
                    <?php  } ?>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select name="xuatxu" class="form-control">
                    <option value="">Xuất xứ</option>
                    <option value="USA">USA</option>
                    <option value="GERMANY">GERMANY</option>
                    <option value="FRANCE">FRANCE</option>
                    <option value="VIETNAM">VIETNAM</option>
                    <?php if (isset($_SESSION['product_filter']['xuatxu'])) { ?>
                     <option selected><?php echo $_SESSION['product_filter']['xuatxu']?></option>  
                    <?php  } ?>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select name="sale" class="form-control">
                    <option value="">Sale</option>
                    <option value="10">10%</option>
                    <option value="25">25%</option>
                    <option value="30">30%</option>
                    <option value="50">50%</option>
                    <?php if (isset($_SESSION['product_filter']['sale'])) { ?>
                     <option selected><?php echo $_SESSION['product_filter']['sale']?></option>  
                    <?php  } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row third">
              <div class="input-field">
                <div class="result-count">
                  <span>108</span>results</div>
                <div class="group-btn">
                  <input type="submit" name="delete" class="btn btn-delete" value="RESET">
                  <input type="submit" class="btn-search" value="SEARCH">
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <script src="js/extention/choices.js"></script>
    <script>
      const customSelects = document.querySelectorAll("select");
      const deleteBtn = document.getElementById('delete')
      const choices = new Choices('select',
      {
        searchEnabled: false,
        itemSelectText: '',
        removeItemButton: true,
      });
      for (let i = 0; i < customSelects.length; i++)
      {
        customSelects[i].addEventListener('addItem', function(event)
        {
          if (event.detail.value)
          {
            let parent = this.parentNode.parentNode
            parent.classList.add('valid')
            parent.classList.remove('invalid')
          }
          else
          {
            let parent = this.parentNode.parentNode
            parent.classList.add('invalid')
            parent.classList.remove('valid')
          }
        }, false);
      }
      deleteBtn.addEventListener("click", function(e)
      {
        e.preventDefault()
        const deleteAll = document.querySelectorAll('.choices__button')
        for (let i = 0; i < deleteAll.length; i++)
        {
          deleteAll[i].click();
        }
      });

    </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
