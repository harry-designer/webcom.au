<?php
/*
 * All Fawzi Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Theme All Basic Setup */
require_once( FAWZI_FRAMEWORK . '/theme-support.php' );
require_once( FAWZI_FRAMEWORK . '/backend-functions.php' );
require_once( FAWZI_FRAMEWORK . '/frontend-functions.php' );
require_once( FAWZI_FRAMEWORK . '/enqueue-files.php' );
require_once( FAWZI_CS_FRAMEWORK . '/custom-style.php' );
require_once( FAWZI_CS_FRAMEWORK . '/config.php' );

/* Bootstrap Menu Walker */
require_once( FAWZI_FRAMEWORK . '/core/vt-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( FAWZI_FRAMEWORK . '/plugins/notify/activation.php' );

/* Breadcrumbs */
require_once( FAWZI_FRAMEWORK . '/plugins/breadcrumb-trail.php' );

/* Aqua Resizer */
require_once( FAWZI_FRAMEWORK . '/plugins/aq_resizer.php' );

/* Sidebars */
require_once( FAWZI_FRAMEWORK . '/core/sidebars.php' );
