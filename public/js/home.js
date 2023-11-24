

var HomeViewModel = function () {
    var self = this;

    this.title = ko.observable('Foci');

    $.ajax({
        type: 'GET',
        url: './config',
        success: function(response) {
            console.log(response);


        },
        error: function() {

        }
    });

}