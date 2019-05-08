import $ from 'jquery';

class Search {
    //describe object
    constructor() {
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $("#search-term");
        this.resultsDiv = $('#search-overlay_results');
        this.previousValue;
        this.events();
        this.isOverLayOpen = false;
        this.typingTimer;
        this.isSpinnerVisible = false;
    }

    // Events

    events() {
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
        this.searchField.on("keyup", this.typingLogic.bind(this));
    }


    // methods
    typingLogic() {
        if (this.searchField.val() != this.previousValue) {
            clearTimeout(this.typingTimer);
            if (this.searchField.val()) {
                if (!this.isSpinnerVisible) {
                    this.resultsDiv.html('<div class="spinner-loader"></div>');
                    this.isSpinnerVisible = true;
                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 1000);

            } else {
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            }

            this.previousValue = this.searchField.val();

        }
    }
    getResults() {
        this.resultsDiv.html("Fake search resluts");
        this.isSpinnerVisible = false;
    }
    keyPressDispatcher(e) {

        if (e.keyCode == 83 && this.isOverLayOpen == false && !$("input, textarea").is(':focus')) {
            this.openOverlay();
        } else if (e.keyCode == 27 && this.isOverLayOpen == true) {
            this.closeOverlay();
        }
    }
    openOverlay() {

        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll");
        this.isOverLayOpen = true;
    }

    closeOverlay() {
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
        this.isOverLayOpen = false;

    }
}

export default Search;