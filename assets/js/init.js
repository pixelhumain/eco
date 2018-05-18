/* ******************
CO.js
RESSOURCE
********************* */
//var/www/dev/modules/co2/config/CO2/params.json:
urlCtrl.loadableUrls[ "#ressources" ] = {
	inMenu : true, 
    useHeader : true, 
    open : true, 
    subdomain : "ressource", 
    subdomainName : "Ressources",
    hash : "#ressources.co.ressources",
    icon : "cubes", 
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
typeObj.ressource = {  col:"ressources",ctrl:"ressources",color:"vine", icon:"cube", titleClass : "bg-vine", bgClass : "bgPerson"};
typeObj.ressources = { sameAs:"ressource" };

//CO LANG
co.rsc = {
    form : function() { dyFObj.openForm("ressource") },
    i : function () { co.ctrl.lbh("#"+userConnected.username+".view.directory.dir.ressources");},
};

/* ******************
CLASSIFIEDS
********************* */
//var/www/dev/modules/co2/config/CO2/params.json:
urlCtrl.loadableUrls[ "#annonces"] = {
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
};

//co.js object types
typeObj.classified = { col:"classified",ctrl:"classified", titleClass : "bg-azure", color:"azure",    icon:"bullhorn",
                   subTypes : [
                       //FR
                       "Technologie","Immobilier","Véhicules","Maison","Loisirs","Mode",
                       //EN
                       "Technology","Property","Vehicles","Home","Leisure","Fashion"
                       ]    
};
typeObj.classifieds = { sameAs:"classified"};

//CO LANG
co.shop = {
    form : function() { dyFObj.openForm("classified") },
    i : function () { co.ctrl.lbh("#"+userConnected.username+".view.directory.dir.classifieds");},
};
