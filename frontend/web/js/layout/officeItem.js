jQuery(function ($) {
    $(".connect-office-item").click(function () {
        clickOnOfficeInList(this.id, this.dataset.lat, this.dataset.lng, this.office);
    });
});


