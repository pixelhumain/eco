/* ******************
CO.js
RESSOURCES
********************* */
//var/www/dev/modules/co2/config/CO2/params.json:
urlCtrl.loadableUrls[ "#classifieds" ] = {
	inMenu : true, 
    useHeader : true, 
    open : true, 
    subdomain : "classified", 
    subdomainName : "Classifeds",
    hash : "#classifieds.co.classifieds",
    icon : "bullhorn", 
    mainTitle : "Moteur de Ressource <span class='text-red'>territoriales</span>",
    placeholderMainSearch : "Rechercher un ressource ...",
    lblBtnCreate : "Ajouter une ressource",
    colorBtnCreate : "purple",
    module:"ressources"
};

// MODULES
urlCtrl.loadableUrls["#ressources.co"] = {title:'RESSOURCES', icon : 'puzzle-piece',useHeader : true, module:"ressources"};
urlCtrl.loadableUrls["#rsc"] = {"alias":"#ressources"};

//co.js object types
typeObj.classified = {  col:"classifieds",ctrl:"classified",color:"azure", icon:"bullhorn", titleClass : "bg-azure", bgClass : "bgPerson"};
typeObj.classifieds = { sameAs:"classified" };

typeObj.ressource = {  col:"classifieds",ctrl:"classified",color:"vine", icon:"cube", titleClass : "bg-vine", bgClass : "bgPerson"};
typeObj.ressources = { sameAs:"ressource" };
typeObj.job = {  col:"classifieds",ctrl:"classified",color:"yellow-k", icon:"briefcase", titleClass : "bg-yellow-k", bgClass : "bgPerson"};
typeObj.jobs = { sameAs:"job" };

//CO LANG
co.rsc = {
    form : function() { dyFObj.openForm("ressource") },
    i : function () { co.ctrl.lbh("#"+userConnected.username+".view.directory.dir.ressources");},
};
co.shop = {
    form : function() { dyFObj.openForm("classified") },
    i : function () { co.ctrl.lbh("#"+userConnected.username+".view.directory.dir.classifieds");},
};
co.job = {
    form : function() { dyFObj.openForm("jobs") },
    i : function () { co.ctrl.lbh("#"+userConnected.username+".view.directory.dir.jobs");},
};
/* ******************
CLASSIFIEDS
********************* */
//var/www/dev/modules/co2/config/CO2/params.json:
/*urlCtrl.loadableUrls[ "#annonces"] = {
            inMenu : true, 
            useHeader : true, 
            open : true, 
            subdomain : "annonces", 
            subdomainName : "Classifieds",
            hash : "#classifieds.co.market",
            icon : "bullhorn", 
            mainTitle : "Classified ads",
            placeholderMainSearch : "search among classifieds ...",
            lblBtnCreate : "Create a classified ad",
            colorBtnCreate : "azure",
            module:"classifieds"
};*/

//co.js object types
/*typeObj.classified = { col:"classified",ctrl:"classified", titleClass : "bg-azure", color:"azure",    icon:"bullhorn",
                   subTypes : [
                       //FR
                       "Technologie","Immobilier","Véhicules","Maison","Loisirs","Mode",
                       //EN
                       "Technology","Property","Vehicles","Home","Leisure","Fashion"
                       ]    
};
typeObj.classifieds = { sameAs:"classified"};*/

//CO LANG

function bindEcoSource(){
    

    $("#btn-select-source").click(function(){

        alert("HELLO THERE");
    });
}

bindEcoSource();
