<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if( ! defined( 'NV_IS_FILE_MODULES' ) )
	die( 'Stop!!!' );

$sql_drop_module = array( );

$result = $db->query( 'SHOW TABLE STATUS LIKE ' . $db->quote( $db_config['prefix'] . '\_' . $lang . '\_' . $module_data ) );
while( $item = $result->fetch( ) )
{
	$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $item['name'];
}
$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`age` char(10) NOT NULL,
`sex` int(11) NOT NULL,
`classname` varchar(255) NOT NULL,
`hobbies` varchar(255) NOT NULL,
`description` text NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM";
?>