pimcore.registerNS("pimcore.plugin.contactform");

pimcore.plugin.contactform = Class.create(pimcore.plugin.admin, {
    getClassName: function() {
        return "pimcore.plugin.contactform";
    },

    initialize: function() {
        pimcore.plugin.broker.registerPlugin(this);
    },
 
    pimcoreReady: function (params,broker){
    }
});

var contactformPlugin = new pimcore.plugin.contactform();

