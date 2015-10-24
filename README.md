# Joomla "Back to top"- link Package

## Contents
This package contains two plugins:
* plg_content_backtotop: Adds "back to top"- links to articles
* plg_editors-ext_backtotop: Adds an editor button to insert "back to top"- links

## Usage
Use the keyword
```
{backtotop}
```
to indicate where you want the link to be inserted. It will be replaced by:
```html
<span class="back-top">
  <a href="#top">
    <span class="icon-arrow-up"></span>
    Back to top
  </a>
</span>
```

## Features
* auto-add links to article-headings
* adjustable through
  * custom fragment identifier (instead of "top")
  * custom link text (instead of "Back to top")
  * add custom css class to outer span element
  * custom icon class (instead of "icon-arrow-up")
* translated in english and german
