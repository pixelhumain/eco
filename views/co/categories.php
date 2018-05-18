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
#sub-menu-left.subsub .btn{
  text-transform: uppercase;
  font-size:12px;
}
</style>

<div class="col-xs-12 col-sm-12 col-md-12" id="sectionMenu">
  <div class="col-md-2 col-sm-3">
   
  <button class="btn bg-white text-dark margin-left-5 margin-top-5 btn-select-type-anc letter-<?php echo @$section["color"]; ?> pull-right" 
          data-type="ressources" data-type-anc=""  data-key="all">
    <i class="fa fa-refresh"></i>
    <span class="hidden-xs hidden-sm"> <?php echo Yii::t("common","Show all"); ?> </span>
  </button>
  </div>
  <div class="col-md-10 col-sm-9">
  <?php 
$currentSection = 1;
foreach ($categories["sections"] as $key => $section) { ?>

    <div class="col-md-2 col-sm-4 col-xs-6 no-padding">
      <button class="btn btn-default col-md-12 col-sm-12 padding-10 bold text-dark elipsis btn-select-type-anc" 
            data-type-anc="<?php echo @$section["label"]; ?>" data-key="<?php echo @$section["key"]; ?>" 
            data-type="ressources">
      <i class="fa fa-<?php echo $section["icon"]; ?> hidden-xs"></i> 
      <?php echo Yii::t("category", $section["labelFront"]); ?>
    </button>
  </div>
<?php } ?> 
    
  </div>
</div>
<div class="col-xs-12 no-padding"><hr class="no-margin"></div>
<div class="no-padding col-md-10 col-sm-9 col-xs-12 text-left pull-right headerSearchContainer"></div>
<div class="col-md-2 col-sm-3 col-xs-8 margin-top-15 text-right subsub classifiedFilters font-montserrat" id="sub-menu-left">
  <button class="open-type-filter tooltips" data-toggle="tooltip" data-placement="right" data-title="<?php echo Yii::t("common","Open filtering by type") ?>"><i class="fa fa-chevron-right"></i></button>
  <?php 
      foreach ($categories['filters'] as $key => $cat) {
  ?>
      <?php if(is_array($cat)) { ?>
        <button class="btn btn-default text-dark margin-bottom-5 btn-select-category-1 elipsis" 
                style="margin-left:-5px;" data-keycat="<?php echo $key; ?>">
                <i class="fa fa-<?php echo @$cat["icon"]; ?> hidden-xs"></i> <?php echo Yii::t("category",$key); ?>
        </button><br>
        
        <?php foreach (@$cat["subcat"] as $key2 => $cat2) { 
                $lbl2 = (isset($cat2["label"])) ? $cat2["label"] : $cat2 ;
        ?>
          <button class="btn btn-default text-azure margin-bottom-5 margin-left-15 hidden elipsis keycat keycat-<?php echo $key; ?>"
                  data-categ="<?php echo $key; ?>" data-keycat="<?php echo $lbl2; ?>">
                  <i class="fa fa-angle-right"></i> <?php echo Yii::t("category",$key2); ?>
          </button>
        <?php } ?>
      <?php } ?>
  <?php } ?>
  <!-- <button onclick="dyFObj.openForm('ressources');" class="col-md-2 col-sm-4 col-xs-6 no-padding letter-vine btn btn-default margin-top-5">
      <i class="fa fa-plus-circle hidden-xs fa-2x "></i> 
    </button> -->
</div>
 
  

  