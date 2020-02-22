<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://lakshman.com.np
 * @since      1.0.0
 *
 * @package    Lakshman_Content_Security_Policy
 * @subpackage Lakshman_Content_Security_Policy/admin/partials
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
?>
<div class='container container--md'>



    <div class="page-header">
      <h1>Content Security Policy 
      <small>CSP allows a host to specify a whitelist of approved sources that a browser can load content from and is an effective countermeasure for XSS attacks.
       <br />learn more @ 
       <a href="http://www.html5rocks.com/en/tutorials/security/content-security-policy/" target='_blank'>html5rocks.com</a> & 
      <a href="https://www.smashingmagazine.com/2016/09/content-security-policy-your-future-best-friend/" target='_blank'>smashingmagazine.com</a>
      </small></h1>
      <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#wp-csp-tips">Tips for Real World Usage</button>
      <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#wp-csp-reference">Source List Reference</button>
      
      <a class='btn btn-success btn-md' href="http://www.lakshman.com.np/content-security-policy-pro-support/" target="_blank" >Ask questions/features</a>
      
      <button type="button" class="btn btn-danger btn-md pull-right" id='wp-csp-clear'>Clear all</button>
    </div>

	<div class="alert alert-info <?=(empty($cspRules)? 'show':'hide')?>" role="alert" id='wp-csp-template-default'>
    	Rules for CSP has not been found!<br />Do you want to start using 'starter' CSP configurations? 
    	<a class='btn btn-default btn-xs' id='wp-csp-template-default' >click here to load basic configuration</a>
    </div>
	
	<?php include_once(__DIR__.'/content-security-policy-admin-tips.phtml') ?>
	<?php include_once(__DIR__.'/content-security-policy-admin-reference.phtml') ?>


	<form method='post'>
	<?php
	foreach($cspResources as $directive=>$resource):
	?>
	<div class="row">		
		<div class="col-md-5">
			<h4><?=$directive?></h4>
			<p><?=$resource['info']?></p>
		</div>
		<div class="col-md-7">
		    <div class="form-group input-typeahead">
				<?php /*?><label for="<?=$directive?>"><?=$directive?></label>*/?>
				<input class="form-control" value="<?=(isset($cspRules[$directive])) ? stripslashes($cspRules[$directive]) : ''?>" name='<?=$directive?>' autocomplete=false>
			</div>
		</div>
	</div>
	<hr>		
	<?php endforeach;?>
	<div class="row">
		<div class="col-md-5"></div>
		<div class="col-md-7">
			<input type='submit' class='btn btn-primary btn-lg' name='save-wp-csp' value='save header' />
		</div>		
	</div>
	</form>
	
</div>
