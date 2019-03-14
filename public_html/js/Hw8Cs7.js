
__k("GetHotelListWithDetails", ["ObjectUtils", "$", "CSS", "Parent", "AsycnRequest"], (function(a, b, c, d) {
    'use strict';
    function a(a) {
        this.data = {};
        this.response_data;
        return this;
    }
    a.prototype.init = function() {
        this.request = new (b("AsycnRequest"))("ajax/get_hotel_list")
            .setRequestBuilder(b("XHRCrossOriginTransportBuilder"))
            .setMethod("GET")
            .setData("client=chrome&viewer_uid=0&dpr=1&l=es&token=0")
            .setRequestHeader("x-auth", "0")
            .setResponseHandler(function(data) {
                console.log(data);
            })

        this.request.send();
    };
    a.prototype.getDetails = function() {};

    if (b("$").getFromIDorElement("j_y_0")) {
        new a('j_y_0').init();
    }
    c.exports = a;
}), 3);