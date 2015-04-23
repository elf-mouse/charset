var filename = 'new_file.txt';

var fs = require('fs');
var detectCharset = require('detect-charset');
var buffer = fs.readFileSync(filename);
var charset = detectCharset(buffer);

console.log(filename + ': ' + charset);
