    <?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
            echo 'this is a test';            exit();
            		$this->render('index');
	}
}