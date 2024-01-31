// CONSTANTES :
const WIDTH = 750;                  // int : Taille du Canevas
const GRIDSIZE = 15;                 // int : nombre de Cell par ligne
const CELLSIZE = WIDTH / GRIDSIZE;  // int : Taille de chaque Cell
const TILES = [                     // Array[string] : nom de chacune des Tiles possibles
  "TR",
  "BR",
  "BL",
  "TL",
  "TOP",
  "RIGHT",
  "DOWN",
  "LEFT",
  "TUP",
  "TRIGHT",
  "TDOWN",
  "TLEFT",
  "VBAR",
  "HBAR",
  "CROSS",
  "VOID",
];

// VARIABLES :
let imageMap;           // Array[Object(image, l, r, u, d)] représentation de chacune des Tiles 
let grid = [];          // Array[Array[Object(x, y, tile, possible, fixed)]] : représentation de la grille, stockant chaque tuile comme un object
let modif = [];         // représentation d'une modif
/*
Array[Object(
  x, y,  => position
  index_choosed_tile, choosed_tile, other_possibles_tiles, => statuts de la tuile modifié
  up, down, left, right => état des tuiles voisines pré-modification
  )]
*/
let amount_done = 1;    // compte le nombre de tuiles fixées

// FONCTION USUEL :
function getRtile() {
  // renvoie une tuile au hasard
  return random(TILES);
}

function randint(a, b) {
  // renvoie un entier entre a et b (b exclu)
  return floor(random(a, b)) % b;
}

function wait(sec) {
  // met en pause le code (stop l'actualisation de draw)
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < sec * 1000);
}

// CREATION D'OBJECT :
function createModif(x, y, tiles, index_used) {
  // créé un object représentant 1 modification de la grille
  modif.push({
    x: x,
    y: y,
    index_choosed_tile: index_used,
    choosed_tile: tiles.splice(index_used, 1),
    other_possibles_tiles: tiles,
    up: (y > 0) ? createTile(
      x, y-1,
      grid[x][y-1].tile,
      grid[x][y-1].possibility,
      grid[x][y-1].fixed,
    ) : {tile: "OUT"},
    down: (y < GRIDSIZE-1) ? createTile(
      x, y+1,
      grid[x][y+1].tile,
      grid[x][y+1].possibility,
      grid[x][y+1].fixed,
    ) : {tile: "OUT"},
    left: (x > 0) ? createTile(
      x-1, y,
      grid[x-1][y].tile,
      grid[x-1][y].possibility,
      grid[x-1][y].fixed,
    ) : {tile: "OUT"},
    right: (x < GRIDSIZE-1) ? createTile(
      x+1, y,
      grid[x+1][y].tile,
      grid[x+1][y].possibility,
      grid[x+1][y].fixed,
    ) : {tile: "OUT"}
  });
}

function createTile(x, y, tile="EMPTY", possible=[...TILES], fixed=false){
  // créé un object Tile (si seul x et y sont précisé, alors créé une tuile totalement vide)
  return {
    x: x * CELLSIZE,
    y: y * CELLSIZE,
    tile: tile,
    possible: possible,
    fixed: fixed,
  }
}

function createTable(img, left, right, up, down) {
  // créé un Object Tuile représentant les connexion d'un type de Tuile et stockant son image
  tile_image = loadImage(img);
  return {
    image: tile_image,
    l: left,
    r: right,
    u: up,
    d: down,
  };
}

// STEP FUNCTION :
function initGrid() {
  // créé une grille de vide
  grid = [];
  for (let i = 0; i < GRIDSIZE; i++) {
    grid.push([]);
    for (let j = 0; j < GRIDSIZE; j++) {
      grid[i].push(
        createTile(i, j)
      );
    }
  }
}

function FindMinPossibilities() {
  // renvoie un Object avec la position de la tuile pris hasard parmi toutes celle à égalité pour le minimal de possibilité
  var x_min = [-1];
  var y_min = [-1];
  var minimal = TILES.length;
  for (let i = 0; i < GRIDSIZE; i++) {
    for (let j = 0; j < GRIDSIZE; j++) {
      if (!grid[i][j].fixed) {
        if (x_min == [-1]) {
          minimal = grid[i][j].possible.length;
          x_min = [i];
          y_min = [j];
        } else if (grid[i][j].possible.length == minimal) {
          x_min.push(i);
          y_min.push(j);
        } else if (grid[i][j].possible.length < minimal) {
          minimal = grid[i][j].possible.length;
          x_min = [i];
          y_min = [j];
        }
      }
    }
  }
  var i = randint(0, x_min.length);
  return { x: x_min[i], y: y_min[i] };
}

function PlaceOnGrid(x, y, value) {
  // Fixe sur la grille la tuile à la position (x, y) avec la tuile <value>
  var index_value = grid[x][y].possible.indexOf(value);
  var all_possibles = grid[x][y].possible;

  createModif(x, y, all_possibles, index_value); // enregistre la modif

  grid[x][y].tile = value;
  grid[x][y].possible = [value];
  grid[x][y].fixed = true;

  // UP
  if (y > 0) {
    for (let i = grid[x][y - 1].possible.length - 1; i >= 0; i--) {
      if (
        imageMap[grid[x][y - 1].possible[i]].d != imageMap[grid[x][y].tile].u
      ) {
        grid[x][y - 1].possible.splice(i, 1);
      }
    }
  }

  // RIGHT
  if (x < GRIDSIZE - 1) {
    for (let i = grid[x + 1][y].possible.length - 1; i >= 0; i--) {
      if (
        imageMap[grid[x + 1][y].possible[i]].l != imageMap[grid[x][y].tile].r
      ) {
        grid[x + 1][y].possible.splice(i, 1);
      }
    }
  }

  // DOWN
  if (y < GRIDSIZE - 1) {
    for (let i = grid[x][y + 1].possible.length - 1; i >= 0; i--) {
      if (
        imageMap[grid[x][y + 1].possible[i]].u != imageMap[grid[x][y].tile].d
      ) {
        grid[x][y + 1].possible.splice(i, 1);
      }
    }
  }

  // Left
  if (x > 0) {
    for (let i = grid[x - 1][y].possible.length - 1; i >= 0; i--) {
      if (
        imageMap[grid[x - 1][y].possible[i]].r != imageMap[grid[x][y].tile].l
      ) {
        grid[x - 1][y].possible.splice(i, 1);
      }
    }
  }
}

function revert() {
  // Annule une modification pour revenir à l'état précédent en supprimant la possibilite qui avait été fixé
  if(amount_done > 0){
    var lastmodif = modif.pop();
    grid[lastmodif.x][lastmodif.y].fixed = false;
    grid[lastmodif.x][lastmodif.y].tile = "EMPTY";
    grid[lastmodif.x][lastmodif.y].possible = lastmodif.other_possibles_tiles;

    if(lastmodif.up.tile != "OUT"){
      grid[lastmodif.x][lastmodif.y-1] = lastmodif.up;
    }
    if(lastmodif.down.tile != "OUT"){
      grid[lastmodif.x][lastmodif.y+1] = lastmodif.down;
    }
    if(lastmodif.left.tile != "OUT"){
      grid[lastmodif.x-1][lastmodif.y] = lastmodif.left;
    }
    if(lastmodif.right.tile != "OUT"){
      grid[lastmodif.x+1][lastmodif.y] = lastmodif.right;
    }
    amount_done -= 1;
  }
}

function step() {
  // une étape de création de l'image
  if (amount_done < GRIDSIZE ** 2) {
    console.log("New Loop :")
    var minim = FindMinPossibilities();
    if(grid[minim.x][minim.y].possible.length == 0){
      revert();
      console.error("Tile Reverted !")
      return
    }
    var choice = random(grid[minim.x][minim.y].possible);
    PlaceOnGrid(minim.x, minim.y, choice);
    console.warn("Tile Fixed at (" + minim.x + ", " + minim.y + ") : " + choice + "!")
    
    console.log("New modif Array :")
    console.log(modif);
    amount_done += 1;
  }
}

/*
// INPUT :
function mouseWheel() {
  step();
}

function mouseClicked() {
  revert();
}
*/

// PRELOAD :
function preload() {
  imageMap = {
    TR: createTable("tile/tr.png", 0, 1, 1, 0),
    BR: createTable("tile/br.png", 0, 1, 0, 1),
    BL: createTable("tile/bl.png", 1, 0, 0, 1),
    TL: createTable("tile/tl.png", 1, 0, 1, 0),
    TOP: createTable("tile/top.png", 0, 0, 1, 0),
    RIGHT: createTable("tile/right.png", 0, 1, 0, 0),
    DOWN: createTable("tile/down.png", 0, 0, 0, 1),
    LEFT: createTable("tile/left.png", 1, 0, 0, 0),
    TUP: createTable("tile/tup.png", 1, 1, 1, 0),
    TRIGHT: createTable("tile/tright.png", 0, 1, 1, 1),
    TDOWN: createTable("tile/tdown.png", 1, 1, 0, 1),
    TLEFT: createTable("tile/tleft.png", 1, 0, 1, 1),
    VBAR: createTable("tile/vbar.png", 0, 0, 1, 1),
    HBAR: createTable("tile/hbar.png", 1, 1, 0, 0),
    CROSS: createTable("tile/cross.png", 1, 1, 1, 1),
    VOID: createTable("tile/void.png", 0, 0, 0, 0),
  };

  initGrid();
}

// SETUP :
function setup() {
  noStroke();
  createCanvas(750, 750);
  TILES.forEach((tile) => {
    imageMap[tile].image.resize(CELLSIZE, CELLSIZE);
  });

  var choice = getRtile();
  var start_x = randint(0, grid.length);
  var start_y = randint(0, grid.length);
  PlaceOnGrid(start_x, start_y, choice);
  console.warn("Start Tile : at (" + start_x + ", " + start_y + ") !")

  setInterval(step, 2500/GRIDSIZE**2); // AUTO-DRAW
}

// MAINLOOP :
function draw() {
  background(0);

  for (let i = 0; i < GRIDSIZE; i++) {
    for (let j = 0; j < GRIDSIZE; j++) {
      if (grid[i][j].tile != "EMPTY") {
        image(imageMap[grid[i][j].tile].image, grid[i][j].x, grid[i][j].y);
      }
    }
  }
}
