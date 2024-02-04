$(document).ready(function() {


    var userFeed = new Instafeed({
        get: 'user',
        userId: '4216638743',
        limit: 9,
        resolution: 'thumbnail',
        accessToken: '4216638743.1677ed0.e9eed11b2d994b0db7a2ec62df9e4d7a',
        sortBy: 'most-recent',
        template: '<div class="col-4 col-md-4 instapadding instaimg"><a href="{{link}}" title="{{caption}}" target="_blank"><img src="{{image}}" alt="{{caption}}" class=""/></a></div>',
    });


    userFeed.run();
});