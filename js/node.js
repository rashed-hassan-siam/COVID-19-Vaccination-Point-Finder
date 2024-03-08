function Node(name, lat, lng) {
  this.number = name;
  this.lat = lat;
  this.lng = lng;
  this.edges = [];
  this.edgeCost = [];
  this.h = [];
  this.g = [];
  this.f = 0;
  this.searched = false;
  this.parent = null;
}
