<?php
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	// 'preload'=>array('log'),
	'components'=>array(
		'db'=>require(dirname(__FILE__).'/database.php'),

        'authManager' =>array(
            'class' => 'yii\rbac\DbManager',
        ),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),

	),
);
?>
