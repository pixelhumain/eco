<?php
class IndexAction extends CAction
{
    public function run()
    {
      	CO2Stat::incNbLoad("co2-annonces");


      	if( @Yii::app()->params["module"]["parent"] ){
      		$this->getController()->layout = "//layouts/directory";
      		echo $this->getController()->render("co2.views.app.search",array("type"=>"classified"));
      	}
      	else
    		echo $this->getController()->renderPartial("co2.views.app.search",array("type"=>"classified"));
    }
}

