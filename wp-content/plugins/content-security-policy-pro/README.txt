=== Content Security Policy Pro ===
Contributors: thapa.laxman
Donate link: http://www.lakshman.com.np/content-security-policy-pro-support/
Tags: cps, content security policy, security
Requires at least: 3.0.1
Tested up to: 5.1.1
Stable tag: 1.3.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This Content Security Policy plugin will help the setup the Content-Security-Policy HTTP response header and block the XSS vulnerabilities.

== Description ==
The idea is quite simple: By sending a CSP header from a website, you are telling the browser what it is authorized to execute and what it is authorized to block. And by doing this, Content Security Policy helps block the XSS vulnerabilities.
CSP allows a host to specify a whitelist of approved sources that a browser can load content from and is an effective countermeasure for XSS attacks.
Content Security Policy is delivered via a HTTP response header, much like HSTS, and defines approved sources of content that the browser may load. It can be an effective countermeasure to Cross Site Scripting (XSS) attacks and is also widely supported and usually easily deployed.

CSP Directives
*   default-src: Define loading policy for all resources type in case of a resource type dedicated directive is not defined (fallback),
*   script-src: Define which scripts the protected resource can execute,
*   object-src: Define from where the protected resource can load plugins,
*   style-src: Define which styles (CSS) the user applies to the protected resource,
*   img-src: Define from where the protected resource can load images,
*   media-src: Define from where the protected resource can load video and audio,
*   frame-src: Define from where the protected resource can embed frames,
*   font-src: Define from where the protected resource can load fonts,
*   connect-src: Define which URIs the protected resource can load using script interfaces,
*   form-action: Define which URIs can be used as the action of HTML form elements,
*   sandbox: Specifies an HTML sandbox policy that the user agent applies to the protected resource,
*   script-nonce: Define script execution by requiring the presence of the specified nonce on script elements,
*   plugin-types: Define the set of plugins that can be invoked by the protected resource by limiting the types of resources that can be embedded,
*   reflected-xss: Instructs a user agent to activate or deactivate any heuristics used to filter or block reflected cross-site scripting attacks, equivalent to the effects of the non-standard X-XSS-Protection header,
*   report-uri: Specifies a URI to which the user agent sends reports about policy violation

== Installation ==

1. Install using the WordPress built-in Plugin installer, or Extract the zip file and drop the contents in the `wp-content/plugins/` directory of your WordPress installation.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to ADMIN > WP CSP
4. Now you you add directive rules on this page

For more info on the directives check @ [html5 rocks](http://www.html5rocks.com/en/tutorials/security/content-security-policy/) or [smashingmagazine.com](https://www.smashingmagazine.com/2016/09/content-security-policy-your-future-best-friend/).


== Changelog ==

= 1.1 =
* The css & js files specific to CSP admin page are loaded only while on this plugin page

= 1.2 =
* tested the plugin on WordPress version 4.6.1 

= 1.3.1 =
* FIXED - The CSP header is sent only for front end pages

= 1.3.5 =
* ADDED report-uri directive

== Screenshots ==
1. Basic setup
2. Templates
3. Source list reference

== Frequently Asked Questions ==
= I am confused with all the settings. What settings should I use? =

First, I suggest to go through the CSP in detail. [html5 rocks](http://www.html5rocks.com/en/tutorials/security/content-security-policy/) or [smashingmagazine.com](https://www.smashingmagazine.com/2016/09/content-security-policy-your-future-best-friend/) will help you understand more on CSP. Then you can use one of the templates or check the list refernce. Check the screenshots.  

== Written By ==
This plugin was written by Laxman Thapa, [Web Developer](lakshman.com.np).