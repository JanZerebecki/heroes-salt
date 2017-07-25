<?php
# managed by salt - do not edit!

# vim: expandtab

require_once( "includes/DefaultSettings.php" );
require_once( "../wiki_settings.php" );

# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.

#$IP = "/srv/www/htdocs/core";
ini_set( "include_path", ".:$IP:$IP/includes:$IP/languages" );

# If PHP's memory limit is very low, some operations may fail.
ini_set( 'memory_limit', '64M' );

if ( $wgCommandLineMode ) {
    if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
        die( "This script must be run from the command line\n" );
    }
} elseif ( empty( $wgNoOutputBuffer ) ) {
    ## Compress output if the browser supports it
    if( !ini_get( 'zlib.output_compression' ) ) @ob_start( 'ob_gzhandler' );
}

$wgSitename         = "openSUSE";

$wgScriptPath       = "";
$wgScript           = "$wgScriptPath/index.php";
$wgRedirectScript   = "$wgScriptPath/redirect.php";

## If using PHP as a CGI module, use the ugly URLs
$wgArticlePath      = "$wgScriptPath/$1";
# $wgArticlePath      = "$wgScript?title=$1";

$wgStylePath        = "$wgScriptPath/skins";
$wgStyleDirectory   = "$IP/skins";
$wgLogo             = "$wgStylePath/common/images/wiki.png";

$wgUploadPath       = "$wgScriptPath/images";
$wgUploadDirectory  = "$IP/images";

$wgEnableEmail = true;
$wgEnableUserEmail = false;

$wgEmergencyContact = "noreply@opensuse.org";
$wgPasswordSender   = "noreply@opensuse.org";

## For a detailed description of the following switches see
## http://meta.wikimedia.org/Enotif and http://meta.wikimedia.org/Eauthent
## There are many more options for fine tuning available see
## /includes/DefaultSettings.php
## UPO means: this is also a user preference option
$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = false;

# If you're on MySQL 3.x, this next line must be FALSE:
$wgDBmysql4 = true;

# File Cache
#$wgUseFileCache = true; /* default: false */
#$wgFileCacheDirectory = "/srv/www/htdocs/cache";
$wgShowIPinHeader = false;

## Shared memory settings
$wgMemCachedServers = array( 0 => '127.0.0.1:11211' );
$wgMainCacheType = CACHE_MEMCACHED;

$wgSessionCacheType = CACHE_DB;  # session cache needs to be persistent, see https://www.mediawiki.org/wiki/Topic:T75cloz7981b8i92

$configdate = gmdate( 'YmdHis', @filemtime( __FILE__ ) );
$wgCacheEpoch = max( $wgCacheEpoch, $configdate );
$wgEnableSidebarCache = true;

## To enable image uploads, make sure the 'images' directory
## is writable, then uncomment this:
$wgEnableUploads  = true;
$wgUseImageResize = true;
$wgUseImageMagick = false;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
# $wgHashedUploadDirectory = false;

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
# $wgUseTeX = true;
$wgMathPath         = "{$wgUploadPath}/math";
$wgMathDirectory    = "{$wgUploadDirectory}/math";
$wgTmpDirectory     = "{$wgUploadDirectory}/temp";

$wgLocalInterwiki   = $wgSitename;

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
# $wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";
# $wgRightsCode = ""; # Not yet used

$wgDefaultSkin = 'bento';
wfLoadSkin('bento');

# $wgLocalTZoffset = date("Z") / 3600; # 3600 is obviously wrong, since the value is expected in minutes
$wgGroupPermissions['*']['edit'] = false;
$wgFavicon = "//www.opensuse.org/favicon.ico";
$wgDiff3 = "/usr/bin/diff3";

#--------------------------------------------------------------
# Custom config section
#

##### Namespace configuration #####
#
#
# Project (meta) namespace
$wgMetaNamespace = 'openSUSE';
# Custom namespaces
define( 'NS_SDB', 100 );
define( 'NS_SDB_TALK', 101 );
define( 'NS_PORTAL', 102 );
define( 'NS_PORTAL_TALK', 103 );
define( 'NS_ARCHIVE', 104 );
define( 'NS_ARCHIVE_TALK', 105 );
define( 'NS_HCL', 106 );
define( 'NS_HCL_TALK', 107 );
# $wgExtraNamespaces[108] = '11.2';
# $wgExtraNamespaces[109] = '11.2_Talk';
define( 'NS_BOOK', 110 );
define( 'NS_BOOK_TALK', 111 );

$wgExtraNamespaces[NS_SDB] = 'SDB';
$wgExtraNamespaces[NS_SDB_TALK] = 'SDB_Talk';
$wgExtraNamespaces[NS_PORTAL] = 'Portal';
$wgExtraNamespaces[NS_PORTAL_TALK] = 'Portal_Talk';
$wgExtraNamespaces[NS_ARCHIVE] = 'Archive';
$wgExtraNamespaces[NS_ARCHIVE_TALK] = 'Archive_Talk';
$wgExtraNamespaces[NS_HCL] = 'HCL';
$wgExtraNamespaces[NS_HCL_TALK] = 'HCL_Talk';
$wgExtraNamespaces[NS_BOOK] = 'Book';
$wgExtraNamespaces[NS_BOOK_TALK] = 'Book_Talk';

# Enable/Disable subpages
$wgNamespacesWithSubpages[NS_SPECIAL] = false;
$wgNamespacesWithSubpages[NS_MAIN] = true;
$wgNamespacesWithSubpages[NS_TALK] = true;
$wgNamespacesWithSubpages[NS_USER] = true;
$wgNamespacesWithSubpages[NS_USER_TALK] = true;
$wgNamespacesWithSubpages[NS_PROJECT] = true;
$wgNamespacesWithSubpages[NS_PROJECT_TALK] = true;
$wgNamespacesWithSubpages[NS_FILE] = false;
$wgNamespacesWithSubpages[NS_FILE_TALK] = true;
$wgNamespacesWithSubpages[NS_MEDIAWIKI] = false;
$wgNamespacesWithSubpages[NS_MEDIAWIKI_TALK] = true;
$wgNamespacesWithSubpages[NS_TEMPLATE] = true;
$wgNamespacesWithSubpages[NS_TEMPLATE_TALK] = true;
$wgNamespacesWithSubpages[NS_SDB] = true;
$wgNamespacesWithSubpages[NS_SDB_TALK] = true;
$wgNamespacesWithSubpages[NS_PORTAL] = true;
$wgNamespacesWithSubpages[NS_PORTAL_TALK] = true;
$wgNamespacesWithSubpages[NS_ARCHIVE] = true;
$wgNamespacesWithSubpages[NS_ARCHIVE_TALK] = true;
$wgNamespacesWithSubpages[NS_BOOK] = true;

$wgContentNamespaces = array (NS_MAIN, NS_PROJECT, NS_HELP, NS_SDB, NS_PORTAL, NS_ARCHIVE, NS_HCL, NS_BOOK);

$wgAllowCategorizedRecentChanges = true;

$wgNamespacesToBeSearchedDefault = array(
        NS_MAIN     => true,
        NS_USER     => true,
        NS_PROJECT  => true,
        NS_FILE     => true,
        NS_TEMPLATE => true,
        NS_HELP     => true,
        NS_CATEGORY => true,
        NS_SDB      => true,
        NS_PORTAL   => true,
        NS_ARCHIVE  => true,
        NS_HCL      => true,
);

##### Misc #####

$wgUseAjax = true; // Enable Ajax
$wgAllowExternalImages = true; // Enable links to external images
# Allow upload of files with the following extensions
$wgFileExtensions = array( 'doc', 'docx', 'gif', 'jpg', 'jpeg', 'odp', 'ods', 'odt', 'pdf', 'png', 'ppt', 'pptx', 'sxc', 'sxw', 'xls', 'xlsx' );
# Add XMPP functionality
$wgUrlProtocols[] = 'xmpp:';

# To be removed once the wiki transition is finished
$wgGroupPermissions['user']['import'] = true;
$wgGroupPermissions['user']['importupload'] = true;
$wgGroupPermissions['sysop']['deleterevision']  = true;
$wgGroupPermissions['user']['move'] = true;

# make the real IPs visible to the wiki instead of the auth proxy (AccessManager) IPs. Without this, IP blocking blocks the proxy IP and therefore edits from everywhere.
$wgUseSquid = true;
$wgSquidServers = array();
$wgSquidServers[] = '192.168.254.4';
$wgSquidServers[] = '149.44.161.63';

# Category watching ----------------------------------
# see https://www.mediawiki.org/wiki/Manual:CategoryMembershipChanges
$wgRCWatchCategoryMembership = true;
$wgDefaultUserOptions['hidecategorization'] = 0;
$wgDefaultUserOptions['watchlisthidecategorization'] = 0;

##### Extensions #####

# Login proxy / Auth_remoteuser -------------------
wfLoadExtension( 'Auth_remoteuser' );
$wgAuthRemoteuserUserUrls = [ 'logout' => '/cmd/ICSLogout/?url=' . htmlentities($_SERVER['REQUEST_URI']) ];

if (isset($_SERVER['HTTP_X_USERNAME'])) { # avoid logging 'undefined index' warnings
    $wgAuthRemoteuserUserName = [ $_SERVER['HTTP_X_USERNAME'] ];
    $wgAuthRemoteuserUserPrefsForced = [ 'email' => $_SERVER['HTTP_X_EMAIL'] ];
} else {
    $wgAuthRemoteuserUserName = [ '' ];
    $wgAuthRemoteuserUserPrefsForced = [ 'email' => '' ];
}

$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['autocreateaccount'] = true;

# UserMerge ------------------------
require_once( "$IP/extensions/UserMerge/UserMerge.php" );
// By default nobody can use this function, enable for bureaucrat?
$wgGroupPermissions['bureaucrat']['usermerge'] = true;

# WikiEditor -----------------------
require_once("$IP/extensions/WikiEditor/WikiEditor.php");
$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;
$wgDefaultUserOptions['wikieditor-preview'] = 1;

# Intersection ---------------------
include("$IP/extensions/intersection/DynamicPageList.php");

# RSS -----------------------
include("$IP/extensions/RSS/RSS.php");
$wgRSSUrlWhitelist = array('*');

# InputBox -------------------------
require_once($IP.'/extensions/InputBox/InputBox.php');

# ParserFunctions -----------------
require_once( "$IP/extensions/ParserFunctions/ParserFunctions.php" );

# CategoryTree.php ----------------
require_once("$IP/extensions/CategoryTree/CategoryTree.php");
$wgCategoryTreeMaxDepth = array(CT_MODE_PAGES => 2, CT_MODE_ALL => 2, CT_MODE_CATEGORIES => 3);

# EventCountdown ------------------
require_once("$IP/extensions/EventCountdown.php");

# MultiBoilerplate ----------------
require_once( "$IP/extensions/MultiBoilerplate/MultiBoilerplate.php" );
$wgMultiBoilerplateOptions = false;
$wgMultiBoilerplatePerNamespace = true;

# Replace Text ----------------------------------------------
require_once( "$IP/extensions/ReplaceText/ReplaceText.php" );

# Interwiki links management ----------------------------------
require_once("$IP/extensions/Interwiki/Interwiki.php");
$wgInterwikiMagic=true;
$wgHideInterlanguageLinks=false;
$wgGroupPermissions['*']['interwiki'] = false;
$wgGroupPermissions['sysop']['interwiki'] = true;

# Flash video links ----------------------------------
require_once("extensions/videoflash.php");

# Syntax highlighting ----------------------------------
require_once("$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php");

# Hide page title ----------------------------------
require_once("$IP/extensions/notitle.php");

# Semantic Maps ----------------------------------
# by using autoload, we get everything we need (Maps, Validator [needed by Maps] and ParamProcessor [needed by Validator] automagically:
require_once("$IP/extensions/maps-vendor/autoload.php");

$GLOBALS['egMapsGMaps3ApiKey'] = $google_maps_key;

# XXX instead of Google?
#$GLOBALS['egMapsDefaultService'] = 'openlayers';
#$GLOBALS['egMapsDefaultService'] = 'leaflet';

# protect user pages ----------------------------------
include_once( "$IP/extensions/UserPageEditProtection/UserPageEditProtection.php" );
$wgOnlyUserEditUserPage = true; /* Set this to true to turn on user page protection */
$wgGroupPermissions['sysop']['editalluserpages'] = true; /* Set this to allow sysops to edit all user pages */

# google coop ----------------------------------
include("$IP/extensions/google-coop.php");

# mass deletion ----------------------------------
include_once( "$IP/extensions/Nuke/Nuke.php");

# spam filter ----------------------------------
include_once( "$IP/extensions/AbuseFilter/AbuseFilter.php");
# set higher EmergencyDisable limits to prevent spam filter from getting disabled with
# "Warning: This filter was automatically disabled as a safety measure. It reached the limit of matching more than 5.00% of actions."
$wgAbuseFilterEmergencyDisableThreshold['default'] = 0.50; # default 0.05
$wgAbuseFilterEmergencyDisableCount['default'] = 50; # default 2

$wgGroupPermissions['sysop']['abusefilter-modify'] = true;
$wgGroupPermissions['*']['abusefilter-log-detail'] = true;
$wgGroupPermissions['*']['abusefilter-view'] = true;
$wgGroupPermissions['*']['abusefilter-log'] = true;
$wgGroupPermissions['sysop']['abusefilter-private'] = true;
$wgGroupPermissions['sysop']['abusefilter-modify-restricted'] = true;
$wgGroupPermissions['sysop']['abusefilter-revert'] = true;

# Hit counter ----------------------------------
wfLoadExtension('HitCounters');

# include READMEs etc. from GitHub ----------------------------------
require_once("$IP/extensions/GitHub/GitHub.php");

# search ----------------------------------
wfLoadExtension( 'Elastica' );
require_once "$IP/extensions/CirrusSearch/CirrusSearch.php";
$wgCirrusSearchServers = array($elasticsearch_server);
$wgSearchType = 'CirrusSearch';

$wgCirrusSearchNamespaceWeights = array(
    NS_MAIN     => 1,
    NS_USER     => 0.05, # default
    NS_PROJECT  => 0.6,
    NS_MEDIAWIKI => 0.05, # default
    NS_FILE     => 0.02,
    NS_TEMPLATE => 0.005, # default
    NS_HELP     => 0.1, # default
    NS_CATEGORY => 0.02,
    NS_SDB      => 0.6,
    NS_PORTAL   => 1,
    NS_ARCHIVE  => 0.2,
    NS_HCL      => 0.2,
);

# ----------------------------------
