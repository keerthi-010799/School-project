/*!
 DataTables Foundation integration
 ©2011-2015 SpryMedia Ltd - datatables.net/license
*/
(function(d){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(a){return d(a,window,document)}):"object"===typeof exports?module.exports=function(a,b){a||(a=window);if(!b||!b.fn.dataTable)b=require("datatables.net")(a,b).$;return d(b,a,a.document)}:d(jQuery,window,document)})(function(d){var a=d.fn.dataTable,b=d('<meta class="foundation-mq"/>').appendTo("head");a.ext.foundationVersion=b.css("font-family").match(/small|medium|large/)?6:5;b.remove();d.extend(a.ext.classes,
{sWrapper:"dataTables_wrapper dt-foundation",sProcessing:"dataTables_processing panel callout"});d.extend(!0,a.defaults,{dom:"<'row'<'small-6 columns'l><'small-6 columns'f>r>t<'row'<'small-6 columns'i><'small-6 columns'p>>",renderer:"foundation"});a.ext.renderer.pageButton.foundation=function(b,l,r,s,e,i){var m=new a.Api(b),t=b.oClasses,j=b.oLanguage.oPaginate,u=b.oLanguage.oAria.paginate||{},f,h,g,v=5===a.ext.foundationVersion,q=function(a,n){var k,o,p,c,l=function(a){a.preventDefault();!d(a.currentTarget).hasClass("unavailable")&&
m.page()!=a.data.action&&m.page(a.data.action).draw("page")};k=0;for(o=n.length;k<o;k++)if(c=n[k],d.isArray(c))q(a,c);else{h=f="";g=null;switch(c){case "ellipsis":f="&#x2026;";h="unavailable disabled";g=null;break;case "first":f=j.sFirst;h=c+(0<e?"":" unavailable disabled");g=0<e?"a":null;break;case "previous":f=j.sPrevious;h=c+(0<e?"":" unavailable disabled");g=0<e?"a":null;break;case "next":f=j.sNext;h=c+(e<i-1?"":" unavailable disabled");g=e<i-1?"a":null;break;case "last":f=j.sLast;h=c+(e<i-1?
"":" unavailable disabled");g=e<i-1?"a":null;break;default:f=c+1,h=e===c?"current":"",g=e===c?null:"a"}v&&(g="a");f&&(p=d("<li>",{"class":t.sPageButton+" "+h,"aria-controls":b.sTableId,"aria-label":u[c],tabindex:b.iTabIndex,id:0===r&&"string"===typeof c?b.sTableId+"_"+c:null}).append(g?d("<"+g+"/>",{href:"#"}).html(f):f).appendTo(a),b.oApi._fnBindAction(p,{action:c},l))}};q(d(l).empty().html('<ul class="pagination"/>').children("ul"),s)};return a});
