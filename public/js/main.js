$(document).ready(function () {
    $("#open-menum").click(function () {
        $(".sidebar-mobile").removeClass("hidden");
    });

    $("#open-menud").click(function () {
        $(".sidebar-mobile").removeClass("hidden");
    });

    $("#close-menu").click(function () {
        $(".sidebar-mobile").addClass("hidden");
    });

    /* bouton recherche mobile */
    $(".header-top-searhmobile").click(function () {
        $(".header-top-center").toggleClass("show");
    });

    /* bouton recherche mobile */
    $("#showSearchBar").click(function () {
        $(".searhbar").removeClass("hidden");
    });

    /* bouton recherche mobile */
    $("#hideSearchBar").click(function () {
        $(".searhbar").addClass("hidden");
    });

});