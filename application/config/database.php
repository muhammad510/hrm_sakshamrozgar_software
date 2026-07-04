<?php defined('BASEPATH') or exit('No direct script access allowed');
$query_builder = TRUE;
$active_group = 'default';
$db['default'] = array(
						'dsn'          => '',
						'hostname'     => 'localhost',
						'username'     => 'root',
						'password'     => '',
						'database'     => 'hrm_sakshmrozgar',//attendance
						'dbdriver'     => 'mysqli',
						'dbprefix'     => '',
						'pconnect'     => FALSE,
						'db_debug'     => (ENVIRONMENT !== 'production'),
						'cache_on'     => FALSE,
						'cachedir'     => '',
						'char_set'     => 'utf8',
						'dbcollat'     => 'utf8_general_ci',
						'swap_pre'     => '',
						'encrypt'      => FALSE,
						'compress'     => FALSE,
						'stricton'     => FALSE,
						'failover'     => array(),
						'save_queries' => TRUE,
						'multi_branch' => FALSE
					);
#####################################Machine DB Connection Start###############################################
$db['sql_db'] = array(
						'dsn'          => '',
						'hostname'     => 'WIN-SI606OAOGK6',
						'username'     => 'sa',
						'password'     => '#@Camwel143',
						'database'     => 'realtime_attendance',
						'dbdriver'     => 'sqlsrv',
						'dbprefix'     => '',
						'pconnect'     => FALSE,
						'db_debug'     => (ENVIRONMENT !== 'production'),
						'cache_on'     => FALSE,
						'cachedir'     => '',
						'char_set'     => 'utf8',
						'dbcollat'     => 'utf8_general_ci',
						'swap_pre'     => '',
						'encrypt'      => FALSE,
						'compress'     => FALSE,
						'stricton'     => FALSE,
						'failover'     => array(),
						'save_queries' => TRUE,
						'multi_branch' => FALSE
					);
#####################################Machine DB Connection Start###############################################
