// Create a dataset with a Google Docs backend and a url to the Google Doc
var dataset = new recline.Model.Dataset({
  url: 'csv/reporte-b',
  backend: 'csv'
});

var $el  = $('#data-grid');
var grid = new recline.View.SlickGrid({
  model: dataset,
  el: $el
});
grid.visible = true;
grid.render();

// Now do the query to the backend to load data
dataset.fetch().done(function(dataset) {
  if (console) {
    console.log(dataset.records);
  }
});
