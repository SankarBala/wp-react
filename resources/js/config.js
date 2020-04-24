import $ from "jquery";

// This defined to get from server.
// Because theme theme may be used in multi wordpress site.
// Or may be installed in a subdirectory.

export const siteUrl = $("meta[name='siteUrl']").attr("content");
export const render = $("meta[name='render']").attr("content");
export const id = $("meta[name='id']").attr("content");
export const published_day = $("meta[name='day']").attr("content");
export const published_month = $("meta[name='month']").attr("content");
export const published_year = $("meta[name='year']").attr("content");

export const restUrl = siteUrl + "/index.php?rest_route=/wp/v2/";
