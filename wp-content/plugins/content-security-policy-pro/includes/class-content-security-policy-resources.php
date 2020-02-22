<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://lakshman.com.np
 * @since      1.0.0
 *
 * @package    Lakshman_Content_Security_Policy
 * @subpackage Lakshman_Content_Security_Policy/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 *http://www.html5rocks.com/en/tutorials/security/content-security-policy/
 *
 * @since      1.0.0
 * @package    Content_Security_Policy
 * @subpackage Content_Security_Policy/includes
 * @author     Laxman Thapa <thapa.laxman@gmail.com>
 */
class Lakshman_Content_Security_Policy_Resources {
    protected static $resources;
    
    public static function getResources()
    {
        if(self::$resources) return self::$resources;
        self::$resources = array(
            'base-uri' => array(
                'info' => "restricts the URLs that can appear in a page's <base> element"
                ,'behaviour' => 'nofallback'
            ),
            'child-src' => array(
                'info' => 'lists the URLs for workers and embedded frame contents. For example: child-src https://youtube.com would enable embedding videos from YouTube but not from other origins. Use this in place of the deprecated frame-src directive.'
            ),
            'connect-src' => array(
                'info' => 'limits the origins to which you can connect (via XHR, WebSockets, and EventSource).'
            ),
            'font-src' => array(
                'info' => "specifies the origins that can serve web fonts. Google's Web Fonts could be enabled via font-src https://themes.googleusercontent.com"
            ),
            'script-src' => array(
                'info' => 'a directive that controls a set of script-related privileges for a specific page.'
            ),
            'style-src' => array(
                'info' => "is script-src's counterpart for stylesheets."
            ),
            'img-src' => array(
                'info' => 'defines the origins from which images can be loaded.'
            ),
            'media-src' => array(
                'info' => 'restricts the origins allowed to deliver video and audio.'
            ),
            'object-src' => array(
                'info' => 'allows control over Flash and other plugins.'
            ),
            'plugin-types' => array(
                'info' => 'limits the kinds of plugins a page may invoke.'
                ,'behaviour'=>'nofallback'
            ),
            'form-action' => array(
                'info' => ' lists valid endpoints for submission from <form> tags.'
                ,'behaviour' => 'nofallback'
            ),
            'frame-ancestors' => array(
                'info' => "specifies the sources that can embed the current page. This directive applies to < frame >, < iframe >, < embed >, and < applet > tags. This directive can't be used in <meta> tags and applies only to non-HTML resources."
                ,'behaviour' => 'nofallback'
            ),
            /*
            'frame-src' => [
                 'info' => 'deprecated. Use child-src instead.'
             ],
            */

            'report-uri' => [
                'info' => "specifies a URL where a browser will send reports when a content security policy is violated. This directive can't be used in <meta> tags."
                ,'behaviour'=>'nofallback'
            ],

            'sandbox' => array(
                'info' => 'out of scope'
                ,'behaviour'=>'nofallback'
            ),
            'default-src'=>array(
                'info' => "defines the defaults for directives you leave unspecified. Generally, this applies to any directive that ends with -src.
                If default-src is set to https://example.com, and you fail to specify a font-src directive, then you can load fonts from https://example.com, and nowhere else.
                The following directives don’t use default-src as a fallback. Remember that failing to set them is the same as allowing anything.
                <ul class='ul-styled'><li>base-uri
<li>form-action</li>
<li>frame-ancestors</li>
<li>plugin-types</li>
<li>report-uri</li>
<li>sandbox</li></ul>"
            )
        );
        return self::$resources;
    }
    
    
    /*// TODO
    public static function reportCsp()
    {
        $data = file_get_contents('php://input');
        if ($data = json_decode($data, true)) {
            $data = json_encode(
                $data,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
                );
            //mail(EMAIL, SUBJECT, $data);
        }
    }
    */
    
}
