//<script src="ammap/ammap.js" type="text/javascript"></script>
//<script src="ammap/maps/js/worldLow.js" type="text/javascript"></script>
//<link rel="stylesheet" href="http://www.dreamlineworld.com/map/ammap/ammap.css" type="text/css">

			AmCharts.ready(function() {
			// create AmMap object
			var map = new AmCharts.AmMap();
			// set path to images
			map.pathToImages = "ammap/images/";
			
			// sets onHover for description 
			map.showDescriptionOnHover = true;

			/* create data provider object
			 map property is usually the same as the name of the map file.

			 getAreasFromMap indicates that amMap should read all the areas available
			 in the map data and treat them as they are included in your data provider.
			 in case you don't set it to true, all the areas except listed in data
			 provider will be treated as unlisted.
			*/
			
			var icon= "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";       

			var dataProvider = {
				map: "worldLow",
				areas:[{id:"GB"},{id:"TR"},{id:"CN"},{id:"IT"},{id:"CZ"}],
				images:[{latitude:41.0136, longitude:28.9550, svgPath:icon, color:"#B70000", scale:0.6, label:"Istanbul", labelShiftY:2, zoomLevel:5,  
					zoomLevel: 2.3, zoomLongitude: 60, zoomLatitude: 39.1712, 
					lines: [{latitudes: [41.0136, 50.0833],longitudes: [28.9550, 14.4167]},
					{latitudes: [41.0136, 41.9000],longitudes: [28.9550, 12.5000]},
					{latitudes: [41.0136, 39.9139],longitudes: [28.9550, 116.3917]},
					{latitudes: [41.0136, 51.5072],longitudes: [28.9550, 0.1275]}],
						title:"Istanbul", description:"Istanbul is the largest city in Turkey, constituting the country's economic, cultural, and historical heart. Istanbul is a transcontinental city in Eurasia, with its commercial and historical centre lying on the European side and about a third of its population living on the Asian side of Eurasia. Istanbul's strategic position along the historic Silk Road, rail networks to Europe and the Middle East, and the only sea route between the Black Sea and the Mediterranean have helped foster an eclectic populace"},
					
					{latitude:41.9000, longitude:12.5000, svgPath:icon, color:"#B70000", scale:0.6, label:"Rome", labelShiftY:2, zoomLevel:5,  
					zoomLevel: 2.3, zoomLongitude: 60, zoomLatitude: 39.1712, 
					lines: [{latitudes: [41.9000, 50.0833],longitudes: [12.5000, 14.4167]},
					{latitudes: [41.9000, 41.0136],longitudes: [12.5000, 28.9550]},
					{latitudes: [41.9000, 39.9139],longitudes: [12.5000, 116.3917]},
					{latitudes: [41.9000, 51.5072],longitudes: [12.5000, 0.1275]}],
						title:"Rome", description:"Rome is the capital of Italy and region of Lazio. With 2.9 million residents in 1,285 km2, it is also the country's largest and most populated comune and fourth-most populous city in the European Union by population within city limits. Rome's history spans more than two and a half thousand years. Although Roman tradition states the founding of Rome around 753 BC, the site has been inhabited much earlier, being one of the oldest continuously occupied cities in Europe."},
					
					{latitude:39.9139, longitude:116.3917, svgPath:icon, color:"#B70000", scale:0.6, label:"Beijing", labelShiftY:2, zoomLevel:5,  
					zoomLevel: 2.3, zoomLongitude: 60, zoomLatitude: 39.1712, 
					lines: [{latitudes: [39.9139, 50.0833],longitudes: [116.3917, 14.4167]},
					{latitudes: [39.9139, 41.0136],longitudes: [116.3917, 28.9550]},
					{latitudes: [39.9139, 41.9000],longitudes: [116.3917, 12.5000]},
					{latitudes: [39.9139, 51.5072],longitudes: [116.3917, 0.1275]}],
						title:"Beijing", description:"Beijing is the capital of the People's Republic of China and one of the most populous cities in the world. The population as of 2013 was 21,150,000. The city proper is the 3rd largest in the world. Beijing is the second largest Chinese city by urban population after Shanghai and is the nation's political, cultural, and educational center."},
					
					{latitude:51.5072, longitude:0.1275, svgPath:icon, color:"#B70000", scale:0.9, label:"London", labelShiftY:2, zoomLevel:5,  
					zoomLevel: 2.3, zoomLongitude: 60, zoomLatitude: 39.1712, 
					lines: [{latitudes: [51.5072, 50.0833],longitudes: [0.1275, 14.4167]},
					{latitudes: [51.5072, 41.0136],longitudes: [0.1275, 28.9550]},
					{latitudes: [51.5072, 41.9000],longitudes: [0.1275, 12.5000]},
					{latitudes: [51.5072, 39.9139],longitudes: [0.1275, 116.3917]}],
						title:"London", description:"London is the capital city of England and the United Kingdom. It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants. Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans."},
					
					{latitude:50.0833, longitude:14.4167, svgPath:icon, color:"#B70000", scale:0.6, label:"Prague", labelShiftY:2 , zoomLevel:5,  
					zoomLevel: 2.3, zoomLongitude: 60, zoomLatitude: 39.1712, 
					lines: [{latitudes: [50.0833, 51.5072],longitudes: [14.4167, 0.1275]},
					{latitudes: [50.0833, 41.0136],longitudes: [14.4167, 28.9550]},
					{latitudes: [50.0833, 41.9000],longitudes: [14.4167, 12.5000]},
					{latitudes: [50.0833, 39.9139],longitudes: [14.4167, 116.3917]}],
						title:"Prague", description:"Prague is the capital and largest city of the Czech Republic. It is the fourteenth-largest city in the European Union. It is also the historical capital of Bohemia. Situated in the north-west of the country on the Vltava River, the city is home to about 1.24 million people, while its larger urban zone is estimated to have a population of nearly 2 million. The city has a temperate climate, with warm summers and chilly winters."}
			]};
			// pass data provider to the map object
			map.dataProvider = dataProvider;

			/* create areas settings
			 * autoZoom set to true means that the map will zoom-in when clicked on the area
			 * selectedColor indicates color of the clicked area.
			 */
			map.areasSettings = {
				autoZoom: true,
				selectedColor: "#EFB2B2"
			};

			// write the map to container div
			map.write("mapdiv");
		});