<?php
/**
 * CoController.php
 *
 * Cocontroller always works with the PH base 
 *
 * @author: Tibor Katelbach <tibor@pixelhumain.com>
 * Date: 14/03/2014
 */
class CoController extends CommunecterController {


    protected function beforeAction($action) {
        //parent::initPage();
		return parent::beforeAction($action);
  	}

  	public function actions()
	{
	    return array(
	        'index'  => 'eco.controllers.actions.IndexAction',
	        'ressources'  => 'eco.controllers.actions.RessourcesAction',
	        'market'  => 'classifieds.controllers.actions.MarketAction'
	    );
	}

	public function actionIndex() 
	{
    	if(Yii::app()->request->isAjaxRequest)
	        echo $this->renderPartial("../default/index");
	    else
    		$this->render("index");
    	//$this->redirect(Yii::app()->createUrl( "/".Yii::app()->params["module"]["parent"] ));	
  	}
}
