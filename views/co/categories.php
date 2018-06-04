<?php 
$cssAnsScriptFilesModule = array(
  "/assets/css/default/classified.css"
);
HtmlHelper::registerCssAndScriptsFiles($cssAnsScriptFilesModule,  Yii::app()->theme->baseUrl );
?>
<style type="text/css">
.container-result-search {
  padding-top: 10px;
}
#sectionMenu{
  /*background-color: #F4F4F6;*/
  padding: 10px;
  /*border: 1px solid #bbb;*/
}
.btn-add, .btn-select-type-anc{
  border-radius: 5px;
}
.btn-select-type-anc{
  text-transform: uppercase;
}
.btn-select-type-anc, .btn-select-type-anc:hover, .btn-select-type-anc:active{
  border-color: transparent;
}
#sub-menu-left .subsub .btn, #sub-menu-left .sourcesInterrop .btn, #sub-menu-left .sectionsFilters .btn {
  text-transform: uppercase;
  font-size:12px;
  width: 95%;
  text-align: right;
  background-color: white;
      font-weight: lighter !important;
  border-color: white;
}
#sub-menu-left h4{
  margin:0px;
}
#sub-menu-left hr{
  width: 95%;
  margin-left: 2%;
  margin-bottom: 5px;
  margin-top: 5px;
}
.keycat:hover{
  width:inherit !important;
  text-overflow: inherit !important;
  white-space: inherit !important;
  overflow: inherit !important;
  max-width: inherit !important;
  display: inline-block;
  z-index: 10000;
}
.btn-select-category:hover, .btn-select-category.active, .btn-select-section:hover, .btn-select-section.active {
    background-color: #2C3E50!important;
    color: #fff!important;
    border-color: transparent!important;
</style>

<!--<div class="col-xs-12 col-sm-12 col-md-12" id="sectionMenu">
  <div class="col-md-2 col-sm-3">
    <button class="btn bg-white margin-left-5 padding-10 btn-select-type-anc pull-right" 
            data-type="classifieds" data-type-anc=""  data-key="all">
      <i class="fa fa-refresh"></i>
      <span class="hidden-xs"> <?php echo Yii::t("common","Show all"); ?> </span>
    </button>
  </div>
  <div class="col-md-10 col-sm-9">
    <div class="col-md-2 col-sm-4 col-xs-6 no-padding">
        <button class="btn btn-default col-md-12 col-sm-12 padding-10 bold elipsis btn-select-type-anc" 
              data-type-anc="<?php echo @$section["label"]; ?>" data-key="classifieds" 
              data-type="classifieds">
        <i class="fa fa-money hidden-xs"></i> 
        <?php echo Yii::t("category", "Sales & rents"); ?>
      </button>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 no-padding">
        <button class="btn btn-default col-md-12 col-sm-12 padding-10 bold elipsis btn-select-type-anc" 
              data-type-anc="" data-key="ressources" 
              data-type="classifieds">
        <i class="fa fa-cubes hidden-xs"></i> 
        <?php echo Yii::t("category", "Helping"); ?>
      </button>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 no-padding">
        <button class="btn btn-default col-md-12 col-sm-12 padding-10 bold elipsis btn-select-type-anc" 
              data-type-anc="" data-key="jobs" 
              data-type="classifieds">
        <i class="fa fa-briefcase hidden-xs"></i> 
        <?php echo Yii::t("category", "Jobs"); ?>
      </button>
    </div>
  </div>
  <hr class="col-md-12 col-sm-12 col-xs-12 margin-top-10 margin-bottom-10 no-padding" id="before-section-result">
</div>-->

<!--<div class="col-md-10 col-sm-9 col-xs-12 no-padding pull-right" id="section-price">
    <div class="form-group col-md-4 col-sm-4 col-xs-6">
        <label class="col-md-12 col-sm-12 col-xs-12 text-left control-label no-padding" for="sectionBtn">
          <i class="fa fa-angle-down"></i> <?php echo Yii::t("common","Min price") ?>
        </label>
        <input type="text" id="priceMin" name="priceMin" class="form-control" 
               placeholder="<?php echo Yii::t("common","Max Min") ?>"/>
    </div>

      <div class="form-group col-md-4 col-sm-4 col-xs-6">
        <label class="col-md-12 col-sm-12 col-xs-12 text-left control-label no-padding" for="sectionBtn">
          <i class="fa fa-angle-down"></i> <?php echo Yii::t("common","Max price") ?>
        </label>
        <input type="text" id="priceMax" name="priceMax" class="form-control col-md-5" 
               placeholder="<?php echo Yii::t("common","Max price") ?>"/>
      </div>
        
      <div class="form-group col-md-2 col-sm-2 col-xs-12">
        <label class="col-md-12 col-sm-12 col-xs-12 text-left control-label no-padding" for="sectionBtn">
          <i class="fa fa-money"></i> <span class="hidden-xs hidden-sm"><?php echo Yii::t("common","Money"); ?></span>
        </label>
        <select class="form-control" name="devise" id="devise" style="">
        <?php 
          $params = CO2::getThemeParams();
          $devises = $params["devises"]; ?>
          <?php if(@$devises){ 
            foreach($devises as $key => $devise){ ?>
            <option class="bold" value="<?php echo $key; ?>"><?php echo Yii::t("common",$devise); ?></option>
          <?php } } ?>
        </select>
      </div>

    <div class="form-group col-md-2 col-sm-2 col-xs-12 margin-top-10">
      <button class="btn btn-link bg-azure margin-top-15 btn-directory-type font-montserrat" data-type="classified">
        <i class="fa fa-search"></i> <span class="hidden-xs hidden-sm"><?php echo Yii::t("common","Search") ?></span>
      </button>
    </div>  
     <hr class="col-md-12 col-sm-12 col-xs-12 no-padding" id="before-section-result" style="width: 95%;margin-left: 2%;margin-bottom: 0px;">                      
</div>-->

<!--<div class="col-md-2 col-sm-3 col-xs-8 text-right font-montserrat" id="sub-menu-left">
  <div class="col-md-12 col-sm-12 col-xs-12 no-padding text-right sourcesInterrop font-montserrat">
    <div class="title"><h4>Sources</h4></div>
    <hr class="col-md-12 col-sm-12 col-xs-12 no-padding">
    <div class="list"></div>
    <hr class="col-md-12 col-sm-12 col-xs-12 no-padding" id="before-section-result" style="width: 95%;margin-left: 2%;margin-bottom: 0px;">
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12 no-padding margin-top-15 text-right sectionsFilters font-montserrat">
    <div class="title"><h4>Sections</h4></div>
    <hr class="col-md-12 col-sm-12 col-xs-12 no-padding">
    <div class="list"></div>
    <hr class="col-md-12 col-sm-12 col-xs-12 no-padding" id="before-section-result" style="width: 95%;margin-left: 2%;margin-bottom: 0px;">
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12 no-padding margin-top-15 text-right subsub classifiedFilters font-montserrat">
    <div class="title"><h4>Categories</h4></div>
    <hr class="col-md-12 col-sm-12 col-xs-12 no-padding">
    <div class="list"></div>
    <hr class="col-md-12 col-sm-12 col-xs-12 no-padding" style="width: 95%;margin-left: 2%;margin-bottom: 0px;">
  </div>
</div>-->
<div class="no-padding col-md-10 col-sm-10 col-sm-offset-1 col-md-offset-1 col-xs-12 text-left pull-right headerSearchContainer"></div>
<script type="text/javascript">
  //var classifieds = modules.classifieds;
  jQuery(document).ready(function() {
    $(".dropdown-section, .dropdown-category, .dropdown-subType").hide();
    //directory.sectionFilter(classifieds.categories);
  });
</script>
