<?php defined('BLUDIT') or die('Bludit CMS.');

// ============================================================================
// Check role
// ============================================================================

if($Login->role()!=='admin') {
	Alert::set('You do not have sufficient permissions to access this page, contact the administrator.');
	Redirect::page('admin', 'dashboard');
}

// ============================================================================
// Functions
// ============================================================================

// ============================================================================
// POST Method
// ============================================================================

// ============================================================================
// Main
// ============================================================================
$pluginClassName = $layout['parameters'];

$Plugin = new $pluginClassName;
$Plugin->uninstall();

Redirect::page('admin', 'plugins');