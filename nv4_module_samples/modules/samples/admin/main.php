<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Tue, 14 Jan 2014 08:23:14 GMT
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) )
	die( 'Stop!!!' );

$delid = $nv_Request->get_int( 'delid', 'get' );
if( $delid > 0 )
{
	$sql = 'DELETE FROM `nv4_vi_samples` WHERE `id` = ' . $delid;
	$db->query( $sql );
}

$sql = 'SELECT id, name, age, sex, classname, hobbies, description FROM nv4_vi_samples WHERE 1';
$_query = $db->query( $sql );

$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'OP', $op );

while( $row = $_query->fetch( ) )
{
	$xtpl->assign( 'DATA', $row );

	$xtpl->parse( 'main.loop' );
}

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );
$page_title = $lang_module['main'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';
die( 'hello' );
?>