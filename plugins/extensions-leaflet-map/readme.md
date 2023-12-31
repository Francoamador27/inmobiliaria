# Extensions for Leaflet Map

Contributors: hupe13    
Tags: leaflet, elevation, markercluster, Leaflet Plugins   
Tested up to: 6.3  
Stable tag: 3.5.3  
Requires at least: 5.5.3     
Requires PHP: 7.4     
License: GPLv2 or later  

## Description

Extends the WordPress Plugin <a href="https://wordpress.org/plugins/leaflet-map/">Leaflet Map</a> with Leaflet Plugins and other functions.

### Functions

* Create an elevation chart profile of a track. There are also acceleration, slope, speed and tempo chart profiles. You can also place multiple tracks on one map.

* By default Leaflet Map uses tiles from openstreetmap.org or from the tile servers you configured. You can use more and switch between them.

* Many markers on a map become confusing. You can cluster and shape them.

* You can use Awesome markers.

* You can group the elements on the map by criteria and show/hide them.

* Create an overview map with geo-locations provided in the pages and posts (idea from @codade).

* Get a tooltip when hovering over an element.

* You can design a choropleth map.

* You can display the map in fullscreen mode.

* Reset the map.

* Gesture handling

* Manage your files for Leaflet Map.

* Help to migrate from [WP GPX Maps](https://wordpress.org/plugins/wp-gpx-maps/).

* and more functions.

### Included Leaflet Plugins and fonts

#### Leaflet Plugins

* [leaflet-elevation](https://github.com/Raruto/leaflet-elevation): A Leaflet plugin that allows to add elevation profiles using d3js.
* [Leaflet.GeometryUtil](https://github.com/makinacorpus/Leaflet.GeometryUtil)
* [Leaflet.i18n](https://github.com/yohanboniface/Leaflet.i18n): Internationalisation module for Leaflet plugins.
* [leaflet-rotate](https://github.com/Raruto/leaflet-rotate): A Leaflet plugin that allows to add rotation functionality to map tiles
* [Leaflet.AlmostOver](https://github.com/makinacorpus/Leaflet.AlmostOver): This plugin allows to detect mouse click and overing events on lines, with a tolerance distance.
* [@tmcw/togeojson](https://www.npmjs.com/package/@tmcw/togeojson): Convert KML, GPX, and TCX to GeoJSON.
* [D3](https://github.com/d3/d3): Data-Driven Documents
* [Leaflet-providers](https://github.com/leaflet-extras/leaflet-providers): An extension that contains configurations for various tile providers.
* [Leaflet.Control.Opacity](https://github.com/dayjournal/Leaflet.Control.Opacity): Makes multiple tile layers transparent.
* [Leaflet.markercluster](https://github.com/Leaflet/Leaflet.markercluster): Provides Beautiful Animated Marker Clustering functionality.
* [Leaflet.MarkerCluster.PlacementStrategies](https://github.com/adammertel/Leaflet.MarkerCluster.PlacementStrategies): Styling Markerclusters.
* [Leaflet.ExtraMarkers](https://github.com/coryasilva/Leaflet.ExtraMarkers): Shameless copy of Awesome-Markers with more shapes and colors.
* [Leaflet.FeatureGroup.SubGroup](https://github.com/ghybs/Leaflet.FeatureGroup.SubGroup): Grouping of Leaflet elements by options and features.
* [Leaflet Control Search](https://github.com/stefanocudini/leaflet-search): Search Markers/Features location by option or custom property.
* [leaflet-choropleth](https://github.com/timwis/leaflet-choropleth): Choropleth plugin for Leaflet (color scale based on value).
* [leaflet.zoomhome](https://github.com/torfsen/leaflet.zoomhome): Provides a zoom control with a "Home" button to reset the view.
* [leaflet.fullscreen](https://github.com/brunob/leaflet.fullscreen): Simple plugin for Leaflet that adds fullscreen button to your maps.
* [Leaflet.GestureHandling](https://github.com/Raruto/leaflet-gesture-handling): A Leaflet plugin that allows to prevent default map scroll/touch behaviours.
* [turf](https://github.com/Turfjs/turf): Advanced geospatial analysis for browsers and Node.js

#### Font

* [Font Awesome 6](https://fontawesome.com/download)

## Screenshots

1. Track with elevation and other profiles and Switching tile layers<br>![Track with elevation profile](.wordpress-org/screenshot-1.png)
2. Hover a Geojson area <br>![Hover a Geojson area](.wordpress-org/screenshot-2.png)
3. Markercluster and Groups <br>![Markercluster](.wordpress-org/screenshot-3.png)
4. Markercluster PlacementStrategies <br>![PlacementStrategies](.wordpress-org/screenshot-4.png)
5. ExtraMarkers <br>![ExtraMarkers](.wordpress-org/screenshot-5.png)
6. Choropleth Map (data from Choropleth plugin example) <br>![Choropleth Map (data from Choropleth example)](.wordpress-org/screenshot-6.png)
7. Files for Leaflet Map <br>![Files for Leaflet Map](.wordpress-org/screenshot-7.png)

## Documentation

Detailed documentation and examples in <a href="https://leafext.de/">German</a> and <a href="https://leafext.de/en/">English</a>.

## Frequently Asked Questions ##

**Is there a widget or other support for the editor?**

* Unfortunately both plugins - Leaflet Map and Extensions for Leaflet Map - only work with shortcodes.
* If you have any questions please ask in the [forum](https://wordpress.org/support/plugin/extensions-leaflet-map/).

**My gpx file is not displayed!**

* Is the URL correct?
* Does the webserver return the correct mime type (application/gpx+xml)?
Put in your `.htaccess`:
<pre><code>AddType application/gpx+xml gpx
RewriteRule .*\.gpx$ - [L,T=application/gpx+xml]</code></pre>

**It doesn't work!**

* Are you using any caching plugin? Try to exclude the js files of both plugins from caching.
* Are you using any plugin to comply with the GDPR/DSGVO? There might be a problem with that.
* Please ask in the [forum](https://wordpress.org/support/plugin/extensions-leaflet-map/)!

**Apropos GDPR/DSGVO**

* If you need a plugin for this try [DSGVO/GDPR Snippet for Extensions for Leaflet Map](https://github.com/hupe13/extensions-leaflet-map-dsgvo).
* If you use [Complianz | GDPR/CCPA Cookie Consent](https://wordpress.org/plugins/complianz-gdpr/) see [here](https://complianz.io/leaflet-maps/).

## Installation

* First you need to install and configure the plugin <a href="https://wordpress.org/plugins/leaflet-map/">Leaflet Map</a>.
* Then install this plugin.
* Go to Settings - Leaflet Map - Extensions for Leaflet Map and get documentation and settings options.

## Changelog

### 3.5.3 / 2309xx

* new shortcode overviewmap: generates an overview map with geo positions provided in the pages and posts
* new options for hover: class (style the tooltip) and popupclose (keep the popup open or not)
* reduce inline Javascript for geojsonmarker
* multielevation accepts now also kml files (may work)

### Previous

[Changelog](CHANGELOG.md)
