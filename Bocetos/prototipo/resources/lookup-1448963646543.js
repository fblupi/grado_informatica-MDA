(function(window, undefined) {
  var dictionary = {
    "d7189069-b9a1-42cb-9f83-22c1029ba0fa": "Introducir donación",
    "8cf920ed-d7d4-4bff-80bc-7d0bc894f693": "Home (id)",
    "3fb6d49e-73ce-4dbc-a9f9-76021460ce01": "Evento",
    "847c7cd7-f588-474f-8316-3138836ac3a7": "Crear evento",
    "ce9eeb41-f00c-44f8-bb0d-0cca7be87f58": "Registrar",
    "c7a5b364-9c60-4326-8821-c7cd941af75c": "Balance",
    "b4b7a0de-e0fc-47ce-bafd-b17d7072856f": "Identificar",
    "50d22f60-21d8-4771-9cea-5cd85d8c2547": "Introducir inversión",
    "d12245cc-1680-458d-89dd-4f0d7fb22724": "Home",
    "87fdc060-e88a-409c-b3af-7c0ae68f9fa9": "Gestionar organizadores",
    "7dbeefcc-6cfb-4f86-9a8b-da4949822155": "Balance detallado",
    "073ecb88-18f2-4ab1-b2e7-921529fc663d": "Introducir gasto",
    "4d225cc0-48c8-47dd-9665-a4b913f57657": "Evento Administrar",
    "87db3cf7-6bd4-40c3-b29c-45680fb11462": "960 grid - 16 columns",
    "e5f958a4-53ae-426e-8c05-2f7d8e00b762": "960 grid - 12 columns",
    "f39803f7-df02-4169-93eb-7547fb8c961a": "Template 1"
  };

  var uriRE = /^(\/#)?(screens|templates|masters)\/(.*)(\.html)?/;
  window.lookUpURL = function(fragment) {
    var matches = uriRE.exec(fragment || "") || [],
        folder = matches[2] || "",
        canvas = matches[3] || "",
        name, url;
    if(dictionary.hasOwnProperty(canvas)) { /* search by name */
      url = folder + "/" + canvas;
    }
    return url;
  };

  window.lookUpName = function(fragment) {
    var matches = uriRE.exec(fragment || "") || [],
        folder = matches[2] || "",
        canvas = matches[3] || "",
        name, canvasName;
    if(dictionary.hasOwnProperty(canvas)) { /* search by name */
      canvasName = dictionary[canvas];
    }
    return canvasName;
  };
})(window);