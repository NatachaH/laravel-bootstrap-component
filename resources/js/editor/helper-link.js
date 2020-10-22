/*
|--------------------------------------------------------------------------
| Editor - Helper Link - Script
|--------------------------------------------------------------------------
|
| Libraries: Jquery & Bootstrap v4.0
|
*/

var exports = module.exports = {};

/**
 * Init the Bootstrap tooltip for the link
 * @return void
 */
exports.initTooltip = function()
{
    var tooltips = [].slice.call(document.querySelectorAll('.ql-editor a'))
    tooltips.map(function (tooltip) {
      return new bootstrap.Tooltip(tooltip,{
        title : function(e,i){
          return this.getAttribute('href').replace('mailto:','');
        },
        trigger: 'hover'
      })
    });
};

/**
 * Check if a string is an url
 * @param  string string
 * @return boolean
 */
exports.isUrl = function(string)
{
  var patternUrl = new RegExp('^(https?:\\/\\/)?'+ // protocol
     '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
     '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
     '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
     '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
     '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
  return !!patternUrl.test(string);
};

/**
 * Check if a string is an email
 * @param  string string
 * @return boolean
 */
exports.isEmail = function(string)
{
  var patternEmail = new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
  return !!patternEmail.test(string);
};

/**
 * Check if a string is an url or an email, and retrieve it
 * @param  string string
 * @return string
 */
exports.preview = function(string)
{
  return this.isUrl(string) || this.isEmail(string) ? string : '';
};
