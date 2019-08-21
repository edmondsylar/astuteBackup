<?php
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'astute ',
        'defaultController' => 'user/login',  
	'preload'=>array('log'),
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.customClass.*',
		'application.models.*',
                'application.modules.auditTrail.models.AuditTrail',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
            'auditTrail'=>array(),
            'apiTest',

	),
	'components'=>array(

		'user'=>array(
			'allowAutoLogin'=>true,
		),
        'authManager' =>array(
            'class' => 'yii\rbac\DbManager',
          ),
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			'errorAction'=>YII_DEBUG ? null : 'site/error',
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

        'Smtpmail'=>array(
            'class'=>'application.extensions.smtpmail.PHPMailer',
            'Host'=>"smtp.gmail.com",
            'Username'=>'servicedesk.transcend@gmail.com',
            'Password'=>'Alupo.Agatha&Edmond@2019',
            'Mailer'=>'smtp',
            'Port'=>587,
            'SMTPAuth'=>true,
            'SMTPSecure' => 'tls',
        ),
	),
	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
	),
);
