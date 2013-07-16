var dataset = new recline.Model.Dataset({
  url: 'csv/' + url,
  backend: 'csv'
});

var $el  = $('#data-grid');
var grid = new recline.View.SlickGrid({
  model: dataset,
  el: $el
});
grid.visible = true;
grid.render();

dataset.fetch();
