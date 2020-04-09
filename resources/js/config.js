import $ from 'jquery';

const config = {
  siteUrl: $("meta[name='siteUrl']").attr('content'),
  domain: "localhost",
  theme_directory: "wp_react"
};


export default config;
