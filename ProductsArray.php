<?php
/**
 * ----------
 * Products' arrays:
 * ---------
 * $rosor - roses' sorts with description.
 * $klematis - clematis' sorts with description.
 * $pioner - pions with description
 */
$rosor = [
  [
    "title" => "ROS A SHROPSHIRE LAD",
    "description" => 'En stor, kraftigt växande ros som med fördel placeras längre bak i rabatten. Den är besläktad med ’Leander’, en ros som klarar sig mycket bra i Sverige och från vilken den ärvt sitt kraftiga, friska växtsätt och stora, glänsande bladverk.',
    "price" => 280
  ],
  [
    "title" => "ROS A WHITER SHADE OF PALE",
    "description" => 'En mycket vacker tehybrid i vit och blekrosa nyanser. Stora, perfekt formade, fyllda blommor med stark fin doft. Blommar länge och har ett friskt bladverk.',
    "price" => 262
  ],
  [
    "title" => "ROS CARL NIELSEN",
    "description" => 'Blommar med stora gula, vackert formade blommor. Fin som snittros. Doften är ljuvlig och stark',
    "price" => 245
  ],
  [
    "title" => "ROS CHIPPENDALE",
    "description" => 'Rosen Chippendale har en speciell blanding av rosa och orangea blommor som ger ett häftigt intryck. Blommorna är stora, tätt fylda och har en stark och behaglig doft av persika och mango. Blommar långt ut på hösten.',
    "price" => 278
  ],
  [
    "title" => "ROS DROTTNINGHOLM",
    "description" => 'En rosa fin ros som är frisk och kraftig. Fin doft. Slottsros',
    "price" => 292
  ],
  [
    "title" => "ROS INGRID BERGMAN",
    "description" => 'Ingrid Bergman är en praktfull och odlingsvärd ros med stora, mörkröda blommor och spriralvända kronblad. Utnämd till årets ros år 2000 av världsförbundet.',
    "price" => 285
  ],
  [
    "title" => "ROS LADY OF SHALOTT",
    "description" => 'Denna austinros är mycket robust och härdig. Den har också mycket bra motståndskraft mot sjukdomar och remonterar ovanligt mycket under hela säsongen. Knopparna har en mörkt orange-röd ton.',
    "price" => 220
  ],
  [
    "title" => "ROS MUNSTEAD WOOD",
    "description" => 'En ny mörkt purpurröd sort från David Austin som är vår favorit i denna färgskala. Knopparna har en ljusare nyans, men när rosen slår ut blir den djupt purpurfärgad i mitten medan de yttre kronbladen behåller den ljusare nyansen.',
    "price" => 240
  ],
];

$klematis = [
  [
    "title" => "KLEMATIS BABY DOLL",
    "description" => 'Ljusblå blommor med gulla ståndare. Kompakt växtsätt som blir ca 1,5 m hög. Blomning juni-juli och remoneterar.',
    "price" => 210
  ],
  [
    "title" => "KLEMATIS BLUE TAPERS",
    "description" => 'Denna sort som även går under namnet Cyanea är fullständigt översållad med ca 5 cm stora blommor i maj och därefter med vackra fröställningar. Blommorna är enkla, klockformiga.',
    "price" => 200
  ],
  [
    "title" => "KLEMATIS PRINCESS KATE",
    "description" => 'Blommar med upprätta liljformade blommor som är ca 4-6 cm stora. Fin att plantera vid träd eller buskar. Beskärs på hösten eller tidig vår till ca 20 cm över marken.',
    "price" => 165
  ],
  [
    "title" => "KLEMATIS TANGUTICA LITTLE LEMONS",
    "description" => 'Denna ovanliga klematis blommar med ca 5 cm stora blommor i perioden juni-september. Fröställningarna är dekorativa och den är lättodlad, men trivs allra bäst i soliga lägen. Klarar trotta platser.',
    "price" => 210
  ],
  [
    "title" => "KLEMATIS SWEET SUMMER LOVE",
    "description" => 'Denna ovanliga sort blommar med ca 5 cm stora blommor som har en härlig doft av vanilj och körsbär. Den blommar mycket rikligt i perioden juli-september. Klättrar gärna i träd, klätterrosor, spaljéer och pergolor. Höjd 2,5-3 m.',
    "price" => 230
  ],
  [
    "title" => "KLEMATIS SUMMER SNOW",
    "description" => 'Helt täckt med 3-4 cm små, doftande blommor från slutet av juni till oktober. Lättodlad och trivs i alla lägen. Kan planteras vid murar, staket, träd, buskar o byggnader. Täcker snabbt stora ytor. Höjd 4-6 m.',
    "price" => 210
  ]
];

$pioner = [
  [
    "title" => "PION CORAL CHARM",
    "description" => "Coral Charm är en mycket vacker och rikblommande pion. Blommorna är halvfyllda och har en underbar doft.",
    "price" => 99
  ],
  [
    "title" => "PION KARL ROSENFIELD",
    "description" => "Mycket vacker och rikblommande perenn som blommar med fyllda, mörkröda, underbart doftande blommor.",
    "price" => 85
  ],
  [
    "title" => "PION CLAIRE DE LUNE",
    "description" => "En vacker enkelblommande sort som blommar med ljusgula nästan vita blommor. Bladverket får en vacker höstfärg.",
    "price" => 65
  ],
  [
    "title" => "PION ROU FU RONG",
    "description" => "Buskig pion med fyllda stora mörkrosa blommor. Ett pampigt inslag i rabatten.",
    "price" => 95
  ],
  [
    "title" => "PION SARA BERNHARDT",
    "description" => "Klassisk trädgårdsväxt av bästa sort som bör finnas i varje trädgård. 'Sarah Bernhardt' har stora, tätt fyllda, rosa blommor och doftar härligt. Lättodlad och bekymmersfri när den väl har fått fäste. Kan behöva stöd.",
    "price" => 110
  ],
  [
    "title" => "PION PETER BRAND",
    "description" => "Klassisk trädgårdsväxt med djupt röda fyllda blommor, svag behaglig doft. Bladverket får dekorativa orangea toner på hösten.",
    "price" => 90
  ]
];

/***
 * Names of all products' categories
 */
$categories = [
  "rosor",
  "klematis",
  "pioner"
];

/***
 * Supporting array of all products without categories key for each product
 */
$allProductsArray = [
  $rosor,
  $klematis,
  $pioner
];

/***
 * Add categories to each product
 */
function addCategory($allProductsArray, $categories)
{
  $array = [];
  for ($i = 0; $i < count($allProductsArray); $i++) {
    foreach ($allProductsArray[$i] as &$product) {
      $product["category"] = $categories[$i];
      array_push($array, $product);
    };
  }
  return $array;
};
/***
 * Add Id to each product
 */
function addId($array) {
  for ($i = 0; $i < count($array); $i++) {
    $array[$i]["id"] = ($i+1);
  };
  return $array;
};

/***
 * Array for all products with categories
 */
$productsArray = addId(addCategory($allProductsArray, $categories));
