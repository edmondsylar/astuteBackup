<?php
//namespace app\controllers;

class ApiTestController extends Controller
{
	public function actionIndex()
	{
            echo 'this is a test';            exit();
		$this->render('index');
	}
	public function actionApi()
	{
//            echo 'this creation controllergggggss ' ;
                $position = TPersonpositions::model()->findAll(); 
                $this->renderJSON($position);
	}
	public function actionListaLLPep()
	{
                $people = TPerson::model()->findAll(); 
                echo count($people);
                $this->renderJSON($people);
	}
	public function actionData()
	{
            echo 'You got it papapapa';            exit();
		$this->render('data');
	}
        
        protected function renderJSON($data){   
    header('Content-type: application/json');
    echo CJSON::encode($data);

    foreach (Yii::app()->log->routes as $route) {
        if($route instanceof CWebLogRoute) {
            $route->enabled = false; // disable any weblogroutes
        }
    }
    Yii::app()->end();
}
public function actionDatadisplay()
	{
            echo 'You got it papapapa';
            $method=''; 
            $url='';
            $data='';
            
            $time = new CallApi($method, $url, $data);
            $datame = callAPI('GET', 'https://raw.githubusercontent.com/everypolitician/everypolitician-data/master/countries.json', false);
//            $get_data = callAPI('GET', 'https://api.example.com/get_url/'.$user['User']['customer_id'], false);
//            $response = json_decode($datame, true);
//            $errors = $response['response']['errors'];
//            $data = $response['response']['data'][0];
            echo $datame;
            exit();
		$this->render($response);
	}
 public function actionCreateStudent()
   {
//      \Yii::$app->response->format = CJSON::encode($data);
//      \Yii::$app->response->format = CJSON:: FORMAT_JSON;
      $student = new TPname();
      $student->scenario = TPname:: SCENARIO_CREATE;
      $student->attributes = \yii::$app->request->post();
      if($student->validate())
      {
       $student->save();
       return array('status' => true, 'data'=> 'Student record is successfully updated');
      }
      else
      {
       return array('status'=>false,'data'=>$student->getErrors());    
      }
}
}
