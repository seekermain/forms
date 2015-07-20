<?php
class AjaxController extends Controller
{
	public function actionRequest()
	{
		if(!isset($_POST['doc_id']))
		{
			$res['note'] = 'Не выбран номер запроса';
			$res['type'] = 'error';
			echo json_encode($res);
			Yii::app()->end();
		}

		if(!isset($_POST['comment'])||empty($_POST['comment']))
		{
			$res['note'] = 'Необходимо прокомментировать заявку';
			$res['type'] = 'error';
			echo json_encode($res);
			Yii::app()->end();
		}

		$criteria = new CDbCriteria();
		$criteria->addInCondition('id',array($_POST['doc_id']));
		$check = Documents::model()->findAll($criteria);

		if(empty($check))
		{
			$res['note'] = 'Заявка с таим номером не существует';
			$res['type'] = 'error';
			echo json_encode($res);
			Yii::app()->end();
		}

		if($check[0]->user_id!=Yii::app()->user->id)
		{
			$res['note'] = 'Этот заявка был создан не Вами';
			$res['type'] = 'error';
			echo json_encode($res);
			Yii::app()->end();
		}

		$criteria_req = new CDbCriteria();
		$criteria_req->addInCondition('doc_id',array($check[0]->id));
		$criteria_req->addInCondition('user_id',array($check[0]->user_id));
		$criteria_req->addInCondition('state',array('WAIT'));
		$check_req = Requests::model()->count($criteria_req);

		if($check_req!=0)
		{
			$res['note'] = 'Запрос уже был отправлен, дождитесь решения администрации';
			$res['type'] = 'error';
			echo json_encode($res);
			Yii::app()->end();
		}

		if($this->documentUpdate($check[0]->id,array('state' => 'Inquiry')))
		{
			if($this->createRequest(Yii::app()->user->id, $_POST['doc_id'], $_POST['comment']))
			{
				$res['note'] = 'Запрос успешно отправлен';
				$res['type'] = 'success';
				echo json_encode($res);
				Yii::app()->end();
			}
			else
			{
				$this->documentUpdate($check[0]->id,array('state' => 'Save'));
				$res['note'] = 'Ошибка Базы Данных, обратитесь к администрации';
				$res['type'] = 'error';
				echo json_encode($res);
				Yii::app()->end();
			}
		}
		else
		{
				$res['note'] = 'Ошибка Базы Данных, обратитесь к администрации';
				$res['type'] = 'error';
				echo json_encode($res);
				Yii::app()->end();
		}
		Yii::app()->end();
	}

	private function documentUpdate($id, $params=array())
	{
		$model=$this->loadDocumentsModel($id);

		if(isset($params))
		{
			$model->attributes = $params;
			if($model->save($model->attributes))
			{
				return true;
			}
		}
		return false;
	}


	public function loadDocumentsModel($id)
	{
		$model = Documents::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	private function createRequest($user_id, $doc_id, $comment)
	{
		$params = array(
			'user_id' => $user_id,
			'doc_id' => $doc_id,
			'comment' => $comment,
			'state' => 'WAIT',
			'state_time' => date("Y-m-d H:i:s"),
			);

		$model = new Requests;

		$model->attributes = $params;
		if($model->save())
		{
			return true;
		}
		return false;
	}
	public function actionChangeCity()
	{
		if($_REQUEST['area_id'])
		{
			$city = City::model()->findAllByAttributes(array('area_id'=>$_REQUEST['area_id']));
			$city_arr = CHtml::listData($city,'id','name');
			$res = "";
			foreach($city_arr AS $key=>$val)
			{
				$res .= "<option value='".$key."'>".$val."</option>";
			}
			echo $res;
		}
		echo false;
	}
}