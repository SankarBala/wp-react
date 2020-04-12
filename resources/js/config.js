import $ from "jquery";


// This defined to get from server. 
// Because theme theme may be used in multi wordpress site.
// Or may be installed in a subdirectory.
 
const siteUrl = $("meta[name='siteUrl']").attr("content");

const config = {
  siteUrl,
  jsonUrl: siteUrl + "/index.php?rest_route=/wp/v2/",
  domain: "",
  theme_directory: ""
};

export default config;
