const path = require('path');
const express = require('express');
const ejs = require('ejs');

var app = express();
var port = process.env.PORT || 3000;

app.set('views', path.join(__dirname, '/dist/'));
app.engine('html', ejs.renderFile);
app.set('view engine', 'html');
app.use(express.static(__dirname + '/dist/'));

app.get('/', function(req, res) {
	res.render('index');
});

app.listen(port, function() {
	console.log('App running at http://localhost:' + port);
});
