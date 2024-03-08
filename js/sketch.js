var graph;
var dropdown;

function setup() {
  graph = new Graph();
  noCanvas();

  var rupatoli = new Node(1, 22.67016458683337, 90.34844287079471); // (indice, latitude, longitude)
  var nathullabad = new Node(2, 22.714519081827728, 90.34860202569887);
  var sadarroad = new Node(3, 22.700716362050905, 90.3698318730559);
  var notunbazar = new Node(4, 22.711683645077287, 90.36093949686234);
  var choumatha = new Node(5, 22.70210408979856, 90.35298867966159);
  var sherebangla = new Node(6, 22.686618951005087, 90.36137003733413);
  var sadar = new Node(7, 22.70844178258688, 90.37042750947853);
  var policeline = new Node(8, 22.695318345342805, 90.36492628151635);
  var nogor = new Node(9, 22.713838704316654, 90.36145179681186);
  var zillaschool = new Node(10, 22.69856854253188, 90.3690593968621);

  graph.addNode(rupatoli);
  graph.addNode(nathullabad);
  graph.addNode(sadarroad);
  graph.addNode(notunbazar);
  graph.addNode(choumatha);
  graph.addNode(sherebangla);
  graph.addNode(sadar);
  graph.addNode(policeline);
  graph.addNode(nogor);
  graph.addNode(zillaschool);
}
function bfs(a, b) {
  graph.reset();
  var start = graph.setStart(a);
  var end = graph.setEnd(b);

  //console.log(graph);

  var queue = [];

  start.searched = true;
  queue.push(start);

  while (queue.length > 0) {
    var current = queue.shift(); //current =1
    if (current == end) {
      //console.log("Found " + current.number);
      break;
    }
    for (var i = 0; i < current.edges.length; i++) {
      var neighbor = current.edges[i];
      //console.log(neighbor)
      if (!neighbor.searched) {
        neighbor.searched = true;
        neighbor.parent = current;
        queue.push(neighbor);
      }
    }
  }

  var path = [];
  path.push(end);
  var next = end.parent;
  while (next != null) {
    path.push(next);
    next = next.parent;
  }
  return path;
}
function dfs(a, b) {
  graph.reset();
  var start = graph.setStart(a);
  var end = graph.setEnd(b);

  //console.log(graph);

  var stack = [];

  start.searched = true;
  stack.push(start);

  while (stack.length > 0) {
    var current = stack.pop();
    if (current == end) {
      //console.log("Found " + current.number);
      break;
    }
    //console.log('dfs: ');
    for (var i = 0; i < current.edges.length; i++) {
      var neighbor = current.edges[i];
      //console.log(neighbor)
      if (!neighbor.searched) {
        neighbor.searched = true;
        neighbor.parent = current;
        stack.push(neighbor);
      }
    }
  }

  var path = [];
  path.push(end);
  var next = end.parent;
  while (next != null) {
    path.push(next);
    next = next.parent;
  }
  return path;
}
