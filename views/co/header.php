<style>
	#filter-thematic-menu{
		max-width: 50%!important;
	}
    @media (max-width: 768px) {
		#filter-thematic-menu{
			max-width: 80% !important;
		}
    }
</style>
<?php 

$ressources = CO2::getModuleContextList("ressources","categories");
$currentSection = 1;

foreach ($ressources["sections"] as $key => $section) 
{ ?>

  <div class="col-md-6 col-sm-6 col-xs-6 no-padding">
    <button class="btn btn-default col-xs-12 padding-10 bold text-dark elipsis btn-select-type-anc btn-select-filliaire" 
            data-type-anc="<?php echo @$section["label"]; ?>" data-key="<?php echo @$section["key"]; ?>" 
            data-type="classified"
            style="border-radius:0px; border-color: transparent; text-transform: uppercase;">
      <i class="fa fa-<?php echo $section["icon"]; ?> fa-2x"></i><br><?php echo Yii::t("category",$section["label"]); ?>
    </button>
  </div>

<?php 
} ?>