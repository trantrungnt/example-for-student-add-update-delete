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

$data = array( );

$data['id'] = $nv_Request->get_int( 'id', 'post', 0 );
$data['txtname'] = $nv_Request->get_title( 'txtname', 'post', '' );
$data['txtage'] = $nv_Request->get_title( 'txtage', 'post', '' );
$data['sex'] = $nv_Request->get_int( 'sex', 'post', 0 );
$data['txtclassname'] = $nv_Request->get_title( 'txtclassname', 'post', '' );
$data['selecthobbies'] = $nv_Request->get_int( 'selecthobbies', 'post' );
$data['txtareadescription'] = $nv_Request->get_textarea( 'txtareadescription', '', NV_ALLOWED_HTML_TAGS );

if( ! empty( $data['txtname'] ) )
{
	try
	{
		if( empty( $data['id'] ) )
		{
			// Theem mowi do khong tin thay ID
			$row = $db->prepare( 'INSERT INTO ' . $db_config['prefix'] . '_' . NV_LANG_DATA . '_' . $module_data . ' (name, age, sex, classname, hobbies, description) VALUES (:txtname,:txtage,:sex,:txtclassname,:selecthobbies,:txtareadescription)' );
			$row->bindParam( ':txtname', $data['txtname'], PDO::PARAM_STR, 255 );
			$row->bindParam( ':txtage', $data['txtage'], PDO::PARAM_STR, 10 );
			$row->bindParam( ':sex', $data['sex'], PDO::PARAM_INT );
			$row->bindParam( ':txtclassname', $data['txtclassname'], PDO::PARAM_STR, 255 );
			$row->bindParam( ':selecthobbies', $data['selecthobbies'], PDO::PARAM_INT );
			$row->bindParam( ':txtareadescription', $data['txtareadescription'], PDO::PARAM_STR );
			$row->execute( );
		}
		else
		{
			// Co id nen update
			$row = $db->prepare( 'UPDATE nv4_vi_samples SET name = :txtname, age = :txtage, sex = :sex, classname = :txtclassname, hobbies = :selecthobbies, description = :txtareadescription WHERE id=:id' );

			$row->bindParam( ':txtname', $data['txtname'], PDO::PARAM_STR, 255 );
			$row->bindParam( ':txtage', $data['txtage'], PDO::PARAM_STR, 10 );
			$row->bindParam( ':sex', $data['sex'], PDO::PARAM_INT );
			$row->bindParam( ':txtclassname', $data['txtclassname'], PDO::PARAM_STR, 255 );
			$row->bindParam( ':selecthobbies', $data['selecthobbies'], PDO::PARAM_INT );
			$row->bindParam( ':txtareadescription', $data['txtareadescription'], PDO::PARAM_STR );
			$row->bindParam( ':id', $data['id'], PDO::PARAM_INT );
			$row->execute( );
		}
		Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=main' );
		die( );
		Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=main' );
		die( );
	}
	catch( PDOException $e )
	{
		trigger_error( $e->getMessage( ) );
	}
}

$id = $nv_Request->get_int( 'id', 'get' );
if( $id > 0 )
{
	try
	{
		$_sql = 'SELECT id, name, age, sex, classname, hobbies, description FROM nv4_vi_samples WHERE id=' . $id;

		$query = $db->query( $_sql );

		$data = $query->fetch( );

		if( $data['hobbies'] == 1 )
		{
			$data['selecthobbies1'] = 'selected="selected" ';
		}

		if( $data['hobbies'] == 2 )
		{
			$data['selecthobbies2'] = 'selected="selected" ';
		}

		if( $data['hobbies'] == 3 )
		{
			$data['selecthobbies3'] = 'selected="selected" ';
		}

		if( $data['hobbies'] == 4 )
		{
		}

	}
	catch( PDOException $e )
	{
		die( $e->getMessage( ) );
	}

}

$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'OP', $op );
$xtpl->assign( 'DATA', $data );

if( $data['sex'] == 1 )
{
	$xtpl->parse( 'main.checkedsex1' );
}
else
{
	$xtpl->parse( 'main.checkedsex0' );
}

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

$page_title = $lang_module['config'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';
?>